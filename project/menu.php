<?php

include_once('inc/login.php');

function menu($active) {
	$pages = array(array('', 'Home'), 
			 array("member", "Members"), 
			 array("games", "Games"), 
			 array("learn", "Learn to Play"), 
			 array('schedule', "Club Events"),
			 array('api', "API")
		 );

	$return = "<div class='container-fluid'><nav class='navbar navbar-default' role='navigation'>
<div class='navbar-header navbar-brand'>MV Go Club</div><div class=''><ul class='nav navbar-nav'>";

	foreach ($pages as $key=>$page) {
		if ($key == $active) {
			$class = 'active'; 
		}
		else {
			$class = '';
		}
		$return .= '<li class="'. $class .'"><a href="https://'. $_SERVER['SERVER_NAME'] .'/'. $page[0] .'">'. $page[1] .'</a></li>';
	}

	$return .= "</ul>";

	$return .= get_login_button();	

	return $return ."</div></nav></div>";
}

?>
