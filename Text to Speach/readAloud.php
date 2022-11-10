<?php
    if (!empty($_FILES['storyFile']))
        $text = file_get_contents($_FILES['storyFile']['tmp_name']);
    elseif (!empty($_POST['storyText']))
        $text = $_POST['storyText'];
    else
        exit("bad data");
    

    //echo($text);

    //break into parts for API max string length

    $offset = 0;

    while( $offset < strlen($text))
    {
        $parts[] = substr($text, $offset, 150);
        $offset+=150;
    }

    $audioData = "";


    foreach($parts as $part)
    {
        $part = rawurlencode($part);
        $audioFile = file_get_contents("https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=$part&tl=en-GB");
        $audioData =$audioData. base64_encode($audioFile);
    }

    echo("<audio controls = 'controls'>
        <source src='data:audio/mpeg;base64,$audioData'>    
    </audio>");

?>