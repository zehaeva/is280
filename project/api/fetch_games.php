<?php
	include_once("../inc/db.php");

	$sql = 'SELECT g.*, (select u.given_name || \' \' || u.sur_name from users u where u.user_id = g.white_player) as white_player_name, (select u.given_name || \' \' || u.sur_name from users u where u.user_id = g.black_player) as black_player_name FROM "games" g ';

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
