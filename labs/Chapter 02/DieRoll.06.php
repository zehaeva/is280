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
	$returnValue = false;
	
	if ($Die1 == $Die2) {
		echo "The roll was double ", $FaceNamesPlural[$Die1 - 1], ".<br />";
		$returnValue = true;
	}
	else {
		echo "The roll was ", $FaceNamesSingular[$Die1 - 1], "and a ", $FaceNamesSingular[$Die2 - 1] ,".<br />";
	}
	
	return $returnValue;
}

function DisplayScoreText($Score, $Doubles) {
	echo "You rolled ";
	switch ($Score) {
		case 2:
			echo "snake eyes";
			break;
		case 3:
			echo "a loose duce";
			break;
		case 5:
			echo "a fever five";
			break;
		case 7:
			echo "a natural";
			break;
		case 9:
			echo "a nina";
			break;
		case 11:
			echo "a yo";
			break;
		case 12:
			echo "boxcars";
			break;
		default:
			if ($Score % 2 == 0) {
				if ($Doubles) {
					echo "a hard $Score";
				}
				else {
					echo "an easy $Score";
				}
			}
	}
	echo "!<br />";
}

$DoublesCount = 0;
$RollNumber = 1;

$Dice = array();

do {
	$RollNumber++;
	$Dice[0] = rand(1, 6);
	$Dice[1] = rand(1, 6);
	$Score = $Dice[0] + $Dice[1];
	echo "<p>";
	echo "The total score for roll $RollNumber was $Score<br />";

	$Doubles = CheckForDoubles($Dice[0], $Dice[1]);
	DisplayScoreText($Score, $Doubles);
	echo "</p>";
	if ($Doubles) {
		++$DoublesCount;
	}
} while ($RollNumber <= 5);

echo "<p>Doubles occurred on $DoublesCount of the five rolls.</p>";
?>
</body>
</html>
