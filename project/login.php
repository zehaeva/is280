<?php

include_once('inc/db.php');
include_once('menu.php');
include_once('bootstrap-cdn.php');

function login_error_page() {
	return '<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Register</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		'. get_scripts() .'
	</head>
	<body>
'. menu(-1) .'
		<div class="container">
		<div class="panel">
			<div class="panel-title"><h2>Login Error</h2></div>
			<div class="panel-body">
				An error occured during your login. Please try again later.
			</div>
		</div>
	</body>
</html>';
}


// if we're not logged in and we're trying to log in
if (isset($_REQUEST['login']) && !isset($_SESSION['user_name'])) {
	$sql = 'SELECT * FROM users WHERE user_name = $1 AND password = md5($2 || salt);';
	$values = array($_REQUEST['user'], $_REQUEST['pass']);
	$results = pg_query_params($sql, $values);
	if (pg_num_rows($results) == 1) {
		$row = pg_fetch_assoc($results);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_name'];
		$_SESSION['given_name'] = $row['given_name'];
		$_SESSION['sur_name'] = $row['sur_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['pandanet_profile_name'] = $row['pandanet_profile_name'];
		$_SESSION['aga_id'] = $row['aga_id'];
		$_SESSION['ogs_id'] = $row['ogs_id'];
		$_SESSION['kgs_id'] = $row['kgs_id'];

		header('Location: '. $_SERVER['HTTP_REFERER']);
		exit();
	}	
	else {
		print(login_error_page());
	}
}
else {
	print(login_error_page());
}
?>
