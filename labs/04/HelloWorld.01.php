<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict-dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hello World</title>
<meta http-equiv="content-type" content="text/html; charset=iso-885901" />
</head>
<body>
<?php
$WorldVar = "World";
$SunVar = "Sun";
$MoonVar = "Moon";
$WorldInfo = 92897000;
$SunInfo = 72000000;
$MoonInfo = 3456;

echo "<p>Hello $WorldVar!<br />";
echo "The $WorldVar is $WorldInfo miles from the $SunVar.<br />";
echo "The $SunVar's core temperature is approximately $SunInfo degrees Fahrenheit.<br />";
echo "Hello ". $MoonVar ."!<br />";
echo "The $MoonVar is $MoonInfo miles in diameter.</p>";
?>
</body>
</html>