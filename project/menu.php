<?php
function menu($active) {
	$pages = array(array('', 'Home'), 
			 array("members", "Members"), 
			 array("games", "Games"), 
			 array("learn", "Learn to Play"), 
			 array('schedule', "Club Events"),
			 array('api', "API")
		 );

	$return = "<nav class='navbar navbar-default' role='navigation'>
<div class='navbar-header navbar-brand'>MV Go Club</div><div><ul class='nav navbar-nav'>";

	foreach ($pages as $key=>$page) {
		if ($key == $active) {
			$class = 'active'; 
		}
		else {
			$class = '';
		}
		$return .= '<li class="'. $class .'"><a href="http://'. $_SERVER['SERVER_NAME'] .'/'. $page[0] .'">'. $page[1] .'</a></li>';
	}

	$return .= "</ul></div></nav>";

	return $return;
}

?>
