<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict-dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Die Roll</title>
<meta http-equiv="content-type" content="text/html; charset=iso-885901" />
</head>
<body>
<?php
$FaceNamesSingular = array("one", "two", "three", "four", "five", "six");
$FaceNamesPlural = array("ones", "twos", "threes", "fours", "fives", "sixes");

function CheckForDoubles($Die1, $Die2) {
	global $FaceNamesSingular;
	global $FaceNamesPlural;
	
	if ($Die1 == $Die2) {
		echo "The roll was double ", $FaceNamesPlural[$Die1 - 1], ".<br />";
	}
	else {
		echo "The roll was ", $FaceNamesSingular[$Die1 - 1], "and a ", $FaceNamesSingular[$Die2 - 1] ,".<br />";
	}
}

function DisplayScoreText($Score) {
	$value = '';
	if ($Score == 2) {
		$value = "snake eyes";
	}
	else if ($Score == 3) {
		$value = "a loose duce";
	}
	else if ($Score == 5) {
		$value = "a fever five";
	}
	else if ($Score == 7) {
		$value = "a natural";
	}
	else if ($Score == 9) {
		$value = "a nina";
	}
	else if ($Score == 11) {
		$value = "a yo";
	}
	else if ($Score == 12) {
		$value = "boxcars";
	}
	if ($value != '') {
		echo "You rolled ", $value, "!<br />";
	}
}

$Dice = array();
$Dice[0] = rand(1, 6);
$Dice[1] = rand(1, 6);
$Score = $Dice[0] + $Dice[1];
echo "<p>";
echo "The total score for the roll as $Score<br />";

CheckForDoubles($Dice[0], $Dice[1]);
DisplayScoreText($Score);
echo "</p>";
?>
</body>
</html>
