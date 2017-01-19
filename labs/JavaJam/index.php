<?php

	print("<!DOCTYPE html><html lang="en"><head><title>JavaJam Coffe House</title><meta charset="utf-8"></head><body>");

	include("header.php");
	
	$services = array("Specialty Coffee and Tea", "Bagels, Muffins, and Organic Snacks", "Music and Poetry Readings", "Open Mic Night");
	
	print("<ul>");
	foreach ($services as $service) {
		print("<li>". $service ."</li>");
	}
	print("</ul>");
	
	include("footer.php");
	print("</body></html>");
?>