<?php
	include_once("../inc/db.php");

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
			$members[] = array('user_id'=>$rows['user_id'], 
							   'given_name'=>$rows['given_name'], 
							   'sur_name'=>$rows['sur_name'], 
							   'aga_id'=>$rows['aga_id'],
							   'pandanet'=>$rows['pandanet_profile_name']);
		}
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sql = 'INSERT INTO users (given_name, sur_name, aga_id, pandanet_profile_name) VALUES ($1, $2, $3, $4);';

		$results = pg_query_params($sql, array($_REQUEST['given_name'], $_REQUEST['sur_name'], $_REQUEST['aga_id'], $_REQUEST['pandanet_profile_name']));
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	}

	echo json_encode($members); 
?>
