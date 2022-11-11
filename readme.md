# PHP

## Variables

```php
$x = 0;
```

names must be

- made of  _ or a letter
- data type defined automatically when assigned a value

scopes

- local
- global
- static
    - creates variable but doesn't destroy it when function ends
    - next time the function is called, the static value is remembered

```php
<?php

function displayAge()
{
	static $age = 21; //creates variable but doesn't destroy it when function ends
	echo("<p>age is: $age</p>"); // GLOBALS needed to access age
	$age +=1;
}
displayAge();
?>
```

## outputs

```php
<?php
	echo("Hello Class!")
	print("Hi there")
?>
```

both output but echo is usually faster

## Functions

```php
<?php
$age = 21;// global scope variable

function displayAge($name = "default name here")
{
	echo("<p>$name is: $GLOBALS['age']</p>"); // GLOBALS needed to access age
	$GLOBALS['age']+=1;
}

function inch_to_cm($inch=0){
	return $inch*2.54;
}

function inch_to_cm_ref(&$inch=0){ // call by referance
	$inch*=2.54;
}

displayAge("Alan");
displayAge();

echo("<p>4 inches is" . inch_to_cm(4) . "cm</p><br/><p>6 inches is" . inch_to_cm(6) . "cm</p>");

$anotherinch = 4;
inch_to_cm_ref($anotherinch);

echo("<p>4 inches is $anotherinch cm</p>");
?>
```

## User input

Captured in HTML form → sent to server → sent to php module

```html
<form action="processing.php" method="POST">
	<p>Enter string:</p>
	<input type="text" name="myString"/>
	<p>action</p>
	<!-- same name for radio buttons - toggle between options-->
	<input type="radio" name="action" value="rount"/>count
	<input type="radio" name="action" value="reverse"/>Reverse
	<input type="radio" name="action" value="uppercase"/>Convert to uppercase
	<input type="submit" value="GO">
</form>
```

Parameters are passed using global associative array $_POST[] or _$GET[]

- Contains KEY:VALUE pair
    - myString = “hello”
    - option = “count”

```php
<?php
		$str = $_POST['myString'];
		$opt = $_POST['option'];

		if($opt == "count"){
			echo("There are ". strlen($str) ." charcters.");
		}
		if($opt == "reverse"){
			echo("There are ". strrev($str) ." charcters.");
		}
		if($opt == "uppercase"){
			echo("There are ". strtoupper($str) ." charcters.");
		}
?>
```

## String manipulation

```php
<?php
$str = "hello"
strlen($str) //length of string
ord($str) // returns ascii number for 1st chararcter
sha1($str) // hash of the string
rtrim($str) // trim rhs
explode($str) // breaks a string into array using a limiter 
strrev($str) // reverse string
strtoupper($str) // convert to upper
?>
```

## Arrays

to send an array in user input:

```html
<form action="processing.php" method="POST">
	<p>Enter name:</p>
	<input type="text" name="myName"/>
	<p>what biscuits do you like?</p>
	<select name="biscuits[]" multiple> <!--use biscuits[] to send array-->
		<option value="CC">Custard Cream</option>
		<option value="D">Digestices</option>
		<option value="JD">Jammy dogers</option>
	</select>
	<input type="submit" value="GO">
</form>
```

biscuits[] needed as name in HTML to send more than 1 value

```php
<?php
		$name= $_POST['myName'];
		$bis= $_POST['biscuits'];

		echo("$name</br>")
		foreach($bis as $item)
		{
			echo(" - $item")
		}
		}
?>
```