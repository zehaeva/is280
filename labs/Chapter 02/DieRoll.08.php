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
$FaceValues = array(1,2,3,4,5,6);

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

$RollCount = 0;
$ScoreCount = array();

for ($PossibleRolls = 2;$PossibleRolls <= 12; $PossibleRolls++) {
	$ScoreCount[$PossibleRolls] = 0;
}

foreach ($FaceValues as $Die1) {
	foreach ($FaceValues as $Die2) {
		++$RollCount;
		$Score = $Die1 + $Die2;
		++$ScoreCount[$Score];
		
		echo "<p>";
		echo "The total score for roll $RollNumber was $Score<br />";

		$Doubles = CheckForDoubles($Die1, $Die2);
		DisplayScoreText($Score, $Doubles);
		echo "</p>";
		if ($Doubles) {
			++$DoublesCount;
		}
	}
}

echo "<p>Doubles occurred on $DoublesCount of the $RollCount rolls.</p>";
?>
</body>
</html>
