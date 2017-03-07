<?php
	$file = "hand.txt";

	function ofsuit(&$str1, $key, $str2) {
		$str1 = $str1 . " of ". $str2;
	}
	$cards = array("Ace", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Jack", "Queen", "King");
	
	$diamonds = $cards;
	array_walk($diamonds, 'ofsuit', 'Diamonds');
	
	$hearts = $cards;
	array_walk($hearts, 'ofsuit', 'Hearts');
	
	$spades = $cards;
	array_walk($spades, 'ofsuit', 'Spades');
	
	$clubs = $cards;
	array_walk($clubs, 'ofsuit', 'Clubs');
	
	$cards = array_merge($diamonds, $clubs);
	$cards = array_merge($cards, $spades);
	$cards = array_merge($cards, $clubs);
	
	shuffle($cards);
	
	$cardstring = implode(',', $cards);
	
	$deal = fopen($file, 'w');
	
	fwrite($deal, $cardstring ."\n");
	
	fclose($deal);
	
	header("location:hitme.php");
?>
