<?php
$pages = array(array('', 'Home'), 
		 array("members", "Members"), 
		 array("games", "Games"), 
		 array("learn", "Learn to Play"), 
	 	 array('schedule', "Club Events"));

	print("<nav class='navbar navbar-default' role='navigation'>
<div class='navbar-header navbar-brand'>MV Go Club</div><div><ul class='nav navbar-nav'>");

	foreach ($pages as $page) {
		print('<li><a href="http://'. $_SERVER['SERVER_NAME'] .'/'. $page[0] .'">'. $page[1] .'</a></li>');
	}

	print("</ul></div></nav>");
?>
