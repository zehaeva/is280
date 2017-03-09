<?php
	include_once("../inc/db.php");

	$sql = 'SELECT * FROM "users" ';

	if (isset($_REQUEST["id"]) && $_REQUEST['id'] >= 1) {
		$sql .= ' WHERE "user_id" = $1 limit 1';
		$results = pg_query_params($sql, array($_REQUEST["id"]));
	}
	else {
		$results = pg_query($sql);
	}

	$members = array();
	while ($rows = pg_fetch_assoc($results)) {
		$members[] = array('given_name'=>$rows['given_name'], 'sur_name'=>$rows['sur_name']);
	}

	echo json_encode($members); 
?>