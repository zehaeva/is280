<?php
	include_once('functions.php');

	print('<!DOCTYPE html><html lang="en">'. get_head('JavaJam Coffe House Music') .'<body>');

	include("header.php");
	
	$products = array("January"=>array('<a href="melanie.jpg"><img src="melaniethumb.jpg" height=80 width=80 alt="Melanie Morris" class="floatleft"></a>Melanie Morris entertains with her melodic folk style. check out the podcast! CDs are now available.'), 
					  "February"=>array('<a href="greg.jpg"><img src="gregthumb.jpg" height=80 width=80 alt="Tahoe Greg" class="floatleft"></a>Tahoe Greg&rsquo;s back from this tour. <a href="grep.mp3">New Songs</a>. New Stories. CDs are now available.'));
			
	print('<div id="content"><p>The first Friday night each month at JavaJam is a special night. Join us from 8pm to 11pm for some music you won&rsquo;t want to miss!</p>');
	foreach ($products as $product=>$desc) {
		print("<h2>". $product ."</h2>");
		foreach($desc as $d) {
			print('<p class="details">'. $d ."</p>");
		}
	}
	print('<br class="clear"></div>');
	
	include("footer.php");
	print("</body></html>");
?>