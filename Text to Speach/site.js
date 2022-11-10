function validateInput(){
    let storyText = document.getElementById("storyText").value;
    let storyFile = document.getElementById("storyFile").value;

    if (storyText == "" && storyFile == "")
    {
        alert("No text or file selected");
        return false;
    }

    return true;

}