<?php
	include_once('functions.php');

	print('<!DOCTYPE html><html lang="en">'. get_head('JavaJam Coffe House') .'<body>');

	include("header.php");
	
	$services = array("Specialty Coffee and Tea", "Bagels, Muffins, and Organic Snacks", "Music and Poetry Readings", "Open Mic Night");
	
	print('<div id="content"><img src="windingroad.jpg" alt="winding road" width="333" height="156" class="floatright"><ul>');
	foreach ($services as $service) {
		print("<li>". $service ."</li>");
	}
	print("</ul>");
	print("<div>12312 Main Street<br />Mountain Home, CA 93923<br />1-888-555-5555<br /><br /></div></div>");
	include("footer.php");
	print("</body></html>");
?>