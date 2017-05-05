<?php
	include_once("../inc/db.php");

	function get_game($game_id) {
		$sql = "SELECT g.game_id, to_char(g.date_played, 'YYYY-MM-DD') as date_played, to_char(g.date_uploaded, 'YYYY-MM-DD') as date_uploaded, getusername(g.white_player) as white_player_name, getusername(g.black_player) as black_player_name, g.file_url FROM games g ";
		
		if (isset($game_id) && $game_id >= 1) {
			$sql .= ' WHERE "game_id" = $1 limit 1';
			$results = pg_query_params($sql, array($game_id));
		}
		else {
			$results = pg_query($sql);
		}
		
		return $results;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_REQUEST['method'] == 'GET') {
		$results = get_game($_REQUEST['id']);
	}	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_REQUEST['method'] == 'POST') {
		$sql = 'INSERT INTO games (date_played, white_player, black_player, file_url) VALUES ($1, $2, $3, $4);';

		$results = pg_query_params($sql, array($_REQUEST['date_played'], $_REQUEST['white_player'], $_REQUEST['black_player'], $_REQUEST['file_url']));
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
