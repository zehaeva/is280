<?php


function get_http() {
	return ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http');
}

function set_user_session_data($row) {
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['user_name'] = $row['user_name'];
	$_SESSION['given_name'] = $row['given_name'];
	$_SESSION['sur_name'] = $row['sur_name'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['pandanet_profile_name'] = $row['pandanet_profile_name'];
	$_SESSION['aga_id'] = $row['aga_id'];
	$_SESSION['ogs_id'] = $row['ogs_id'];
	$_SESSION['kgs_id'] = $row['kgs_id'];
}	


?>
