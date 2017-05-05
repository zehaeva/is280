<?php
	include_once("../inc/db.php");
	include_once("../inc/functions.php");

	function get_user($userid) {
		$sql = 'SELECT * FROM "users" ';

		if (isset($userid) && $userid >= 1) {
			$sql .= ' WHERE "user_id" = $1 limit 1';
			$results = pg_query_params($sql, array($userid));
		}
		else {
			$results = pg_query($sql);
		}

		return $results;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_REQUEST['method'] == 'GET') {
		$results = get_user($_REQUEST['id']);
	}	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['method'] == 'POST') {
		$sql = 'INSERT INTO users (given_name, sur_name, aga_id, pandanet_profile_name) VALUES ($1, $2, $3, $4);';

		$results = pg_query_params($sql, array($_REQUEST['given_name'], $_REQUEST['sur_name'], $_REQUEST['aga_id'], $_REQUEST['pandanet_profile_name']));
	}
	//	only an admin or the person themselves should be able to edit themselves
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['method'] == 'PUT' && $_SESSION['user_id'] == $_REQUEST['id']) {
		$fields = array('given_name', 'sur_name', 'aga_id', 'kgs_id', 'ogs_id', 'pandanet_profile_name', 'email');
		$sql = 'UPDATE users SET ';

		$count = 0;
		$update_fields = array();
		$values = array();

		foreach($fields as $field) {
			if (!empty($_REQUEST[$field])) {
				$count++;
				$update_fields[] = $field .' = $'. $count .' ';
				$values[] = $_REQUEST[$field];
			}
		}

		$sql .= join(', ', $update_fields);

		$count++;
		$sql .= ' WHERE user_id = $'. $count;

		$values[] = $_REQUEST['id'];

		$results = pg_query_params($sql, $values);
		$results = get_user($_REQUEST['id']);
		$row = pg_fetch_assoc($results);
		set_user_session_data($row);
	}
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	}

	

// output the records we found!
	if (isset($results)) {
		$members = array();
		while ($rows = pg_fetch_assoc($results)) {
			$members[] = array('user_id'=>$rows['user_id'], 
							   'given_name'=>$rows['given_name'], 
							   'sur_name'=>$rows['sur_name'], 
							   'email'=>$rows['email'], 
							   'aga_id'=>$rows['aga_id'],
							   'ogs_id'=>$rows['ogs_id'],
							   'kgs_id'=>$rows['kgs_id'],
							   'pandanet'=>$rows['pandanet_profile_name']);
		}
		echo json_encode($members); 
	}
?>
