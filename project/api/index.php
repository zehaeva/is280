<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Games</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('../bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
  include('../menu.php');
  print(menu(5));
?>
		<div class="container">
			<div id="title">MV Go Club API</div>
			<div><p>Here at the MV Go Club we believe in the openess of data, so we have implimented an API with which you can interact with the data that is on this site directly.</p></div>
			<div>
				<ul>
				<li>
					<dl>
						<dt><a href="/api/games/"><?php echo $_SERVER['SERVER_NAME']; ?>/api/games/</a></dt>
						<dd>This endpoint returns all the games in the database, you can ask for a specific game by adding the id of the game at the end of the endpoint. e.g. <a href="/api/games/1"><?php echo $_SERVER['SERVER_NAME']; ?>/api/games/1</a></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt><a href="/api/members/"><?php echo $_SERVER['SERVER_NAME']; ?>/api/members/</a></dt>
						<dd>This endpoint returns all the memebers in the database, you can ask for a specific member by adding the id of the game at the end of the endpoint. e.g. <a href="/api/members/1"><?php echo $_SERVER['SERVER_NAME']; ?>/api/members/1</a></dd>
					</dl>
				</li>
				</ul>
			</div>
			
			<script src="http://<?php echo $_SERVER['SERVER_NAME'] .'/js/mvgoclub.js'; ?>" type="text/javascript"></script>
		</div>
	</body>
</html>
