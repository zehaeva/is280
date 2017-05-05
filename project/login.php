<?php
include_once('inc/db.php');
include_once('inc/functions.php');
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
		set_user_session_data($row);
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

