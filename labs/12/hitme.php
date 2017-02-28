<?php
//	check to see that file exists
	if (file_exists("hand.txt") && filesize("hand.txt") > 0) {
		$current_hand = file("hand.txt");
		$deck = explode(",", $current_hand[0]);
		$hit = array_shift($deck);
		$cards = implode(",", $deck);
		
		if (isset($current_hand[1])) {
			$player_hand = explode("~", $current_hand[1]);
			$player_hand = $hit;
			$card_count = 0;
			$aces = 0;
			
			for ($i=0; $i < count($player_hand); $i++) {
				if (strpos($player_hand[$i], "Ace") !== False) {
					$aces++;
				}
				else if (strpos($player_hand[$i], "Two") !== False) {
					$card_count += 2;
				}
				else if (strpos($player_hand[$i], "Three") !== False) {
					$card_count += 3;
				}
				else if (strpos($player_hand[$i], "Four") !== False) {
					$card_count += 4;
				}
				else if (strpos($player_hand[$i], "Five") !== False) {
					$card_count += 5;
				}
				else if (strpos($player_hand[$i], "Six") !== False) {
					$card_count += 6;
				}
				else if (strpos($player_hand[$i], "Seven") !== False) {
					$card_count += 7;
				}
				else if (strpos($player_hand[$i], "Eight") !== False) {
					$card_count += 8;
				}
				else if (strpos($player_hand[$i], "Nine") !== False) {
					$card_count += 9;
				}
				// I refuse to specify King, Queen, or Jack when they're 
				// all going to be the same value
				else {
					$card_count += 10;
				}
			}
			
			$cards = $cards . implode("~", $player_hand);
			
			if ($aces > 0) {
				for ($i=1; $i <= $aces; $i++) {
					if ($card_count + 11 <= 21) {
						$card_count += 11;
					}
					else {
						$card_count += 1;
					}
				}
			}
			
			if ($card_count == 21) {
				$cards = $cards ." You win!";
			}
		}
	}
?>