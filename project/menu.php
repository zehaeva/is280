<?php
	$pages = array(array('/', 'Home'), array("members", "Members"), array("games", "Games"));
	print("<div class=menu><ul>");
	foreach ($pages as $page) {

		print('<li><a href="https://'. $_SERVER['SERVER_NAME'] .'/'. $page[0] .'">'. $page[1] .'</a></li>');
	}
	print("</ul></div>");
?>
