
<?php
include_once('../inc/db.php');
include_once('../menu.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Learn to Play Go!</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('../bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
  print(menu(3));
?>
		<div class="container">
			<div id="title"><h3>Learn to Play Go!</h3></div>
			<div><p>Go is an ancient game which, from its forgotten origins in China, spread first to the rest of East Asia, and then to the entire world. How ancient? Historians aren't sure; it has a definite history of over 3000 years, but according to tradition Go was invented more than 4000 years ago. The English name comes from the Japanese name Igo, which means "surrounding boardgame".</p></div>
			<div>Resources
				<ul class='list-group'>
					<li class='list-group-item'><a href="http://senseis.xmp.net/?BasicRulesOfGo">How to Play</a></li>
					<li class='list-group-item'>
						Training:
						<ul>
							<li><a href="http://goproblems.com/">Go Problems</a>: Problems help train your instincts and your reading ability</li>
							<li><a href="http://www.brugo.be/joseki2.php">Joseki</a>: Joseki are common patterns that happen at the start of the game, if you're just starting out don't pay too much attention to them, they're an advanced topic of study.</li>
						</ul>
					</li>
					<li class='list-group-item'>
						Play Online:
						<ul>
							<li><a href="https://online-go.com/">Online Go Server</a>: a newer server with a growing community and a lot of awesome features like play by email and tournement ladders.</li>
							<li><a href="http://www.gokgs.com/">KGS</a>: an older server with a thriving community and some good tools, their client hasn't been updated in a long while.</li>
							<li><a href="http://pandanet-igs.com/communities/pandanet">IGS Pandanet</a>: a server based in Japan, the oppponents here will be slightly stronger than KGS or OGS. The new client they have is very good looking.</li>
							<li><a href="http://www.tygembaduk.com/">Tygem Baduk</a>: a Korean based go server, basic features, a lot of players, and a very strong community make this the place to play once you get pretty strong and are looking to grow.</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>
 
