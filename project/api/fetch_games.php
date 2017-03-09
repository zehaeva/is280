<?php
	include_once("../inc/db.php");

	$sql = 'SELECT * FROM "games" ';

	if (isset($_REQUEST["id"]) && $_REQUEST['id'] >= 1) {
		$sql .= ' WHERE "game_id" = $1 limit 1';
		$results = pg_query_params($sql, array($_REQUEST["id"]));
	}
	else {
		$results = pg_query($sql);
	}

	$games = array();
	while ($rows = pg_fetch_assoc($results)) {
		$temp = array();
		foreach ($rows as $col=>$game) {
			$temp[$col] = $game;
		}
		$games[] = $temp;
	}

	echo json_encode($games); 
?>
