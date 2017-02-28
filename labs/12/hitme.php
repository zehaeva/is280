<?php
//	check to see that file exists
	if (file_exists("hand.txt") && filesize("hand.txt") > 0) {
		$current_hand = file("hand.txt");
		$deck = explode(",", $current_hand[0]);
		$hit = array_shift($deck);
		$cards = implode(",", $deck);
		
		if (isset($current_hand[1)) {
			$player_hand = explode("~", $current_hand[1]);
			$player_hand = $hit;
			$card_count = 0;
			$aces = 0;
			
			for ($i=0; $i < count($player_hand); $i++) {
				if (strpos($player_hand[$i], "Ace") !== False) {
					$aces++;
				}
				else if (strpos($player_hand[$i], "King") !== False) {
					
				}
				else if (strpos($player_hand[$i], "Queen") !== False) {
					
				}
				else if (strpos($player_hand[$i], "Jack") !== False) {
					
				}
				else {
					
				}
			}
		}
	}
?>