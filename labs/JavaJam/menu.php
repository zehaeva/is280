<?php
	include_once('functions.php');

	print('<!DOCTYPE html><html lang="en">'. get_head('JavaJam Coffe House Menu') .'<body>');
	
	include("header.php");
	
	$products = array("Just Java"=>array("Regular house blend, decaffeinated coffe, or flavor of the day.", "Endless Cup $2.00"), 
					  "Cafe au Lait"=>array("House blended coffe infused into a smooth, steamed milk.", "Single $2.00 &nbsp;Double $3.00"), 
					  "Iced Cappuccino"=>array("Sweetened espresso blended with icy-cold milk and served in a chilled glass.", "Single $4.75 &nbsp;Double $5.75"));
	
	print('<div id="content"><table>');
	foreach ($products as $product=>$desc) {
		print("<th>". $product ."</th><td>");
		foreach($desc as $d) {
			print($d ."<br />");
		}
		print("</td>");
	}
	print("</table></div>");
	
	include("footer.php");
	print("</body></html>");
?>