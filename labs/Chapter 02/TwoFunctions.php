<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict-dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Two Functions</title>
<meta http-equiv="content-type" content="text/html; charset=iso-885901" />
</head>
<body>
<h1>Central Valley Civic Center</h1>
<h2>Summer Concert Season</h2>
<?php
function displayMessage($FirstMessage) {
		echo "<p>$FirstMessage</p>";
}

function returnMessage() {
	return "<p>This message was returned from a function</p>";
}

displayMessage("This message was displayed from a function. ");

$returnValue = returnMessage();
echo $returnValue;
?>
</body>
</html>
