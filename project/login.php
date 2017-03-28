<?php

include_once('inc/db.php');

// if we're not logged in and we're trying to log in
if (isset($_REQUEST['login']) && !isset($_SESSION['username'])) {
	$sql = 'SELECT * FROM users WHERE user_name = $1 AND password = md5($2 || salt);';
	$values = array($_REQUEST['user'], $_REQUEST['pass']);
	$results = pg_query_params($sql, $values);
	if (pg_num_rows($results) == 1) {
		$row = pg_fetch_assoc($results);
		$_SESSION['username'] = $row['user_name'];
		$_SESSION['given_name'] = $row['given_name'];
		$_SESSION['sur_name'] = $row['sur_name'];
		$_SESSION['pandanet_profile_name'] = $row['pandanet_profile_name'];
		$_SESSION['aga_id'] = $row['aga_id'];
		$_SESSION['ogs_id'] = $row['ogs_id'];
		$_SESSION['kgs_id'] = $row['kgs_id'];
	}	
}
else {
}

?>
