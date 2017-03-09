<?php
$pages = array(array('', 'Home'), 
		 array("members", "Members"), 
		 array("games", "Games"), 
		 array("learn", "Learn to Play"), 
	 	 array('schedule', "Club Events"));

	print("<div class=menu><ul>");

	foreach ($pages as $page) {
		print('<li><a href="http://'. $_SERVER['SERVER_NAME'] .'/'. $page[0] .'">'. $page[1] .'</a></li>');
	}

	print("</ul></div>");
?>
