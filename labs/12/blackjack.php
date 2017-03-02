<!DOCTYPE html>
<html>
	<head>
		<title>Blackjack</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Blackjack</h1><hr />
		<p>Click Deal to start a new game</p>
		<p>
			<a href="hitme.php">Hit Me</a>&nbsp;
			<a href="deal.php">Deal</a>&nbsp;
		</p>
		<?php
			$file = "hand.txt";
		
			if (file_exists($file) && filesize($file) > 0) {
				$current_hand = file($file);
				$hand = explode("~", $current_hand[1]);
				
				foreach ($hand as $card) {
					echo "<p>". $card ."</p>";
				}
				
				if (isset($current_hand[2])) {
					echo $current_hand[2];
					
					$card_store = fopen($file, "w");
					
					fclose($card_store);
				}
			}
			else {
				echo "<p>You haven't started playing yet!</p>";
			}
		?>
	</body>
</html>