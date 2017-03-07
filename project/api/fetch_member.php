<?php
	include_once("../inc/db.php");

	$sql = 'SELECT * FROM "users" WHERE "user_id" = $1 limit 1';

	$results = pg_query_params($sql, array($_REQUEST["id"]));
	$rows = pg_fetch_assoc($results);
	echo $rows['given_name'] .' '. $rows['sur_name'];
?>
