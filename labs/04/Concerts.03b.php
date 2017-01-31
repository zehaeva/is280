<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict-dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Central Valley Civic Center</title>
<meta http-equiv="content-type" content="text/html; charset=iso-885901" />
</head>
<body>
<h1>Central Valley Civic Center</h1>
<h2>Summer Concert Season</h2>
<?php
$Concerts = array("Jimmy Buffett", "Chris Isaak", "Bonnie Raitt", "James Taylor", "Alicia Keys");
$Concerts[] = "Bob Dylan";
$Concerts[] = "Ryan Cabrera";

echo "<p>The colloring ", count($Concerts), " concerts are schedules:</p><p>";
foreach ($Concerts as $values) {
	echo "$values<br />";
}
echo "</p>";
?>
</body>
</html>
