<?php
include_once('inc/db.php');
include_once('menu.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Schedule</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
	print(menu(4));
?>
		<div class="container">
			<div class="panel" id="content">
				<iframe src="https://calendar.google.com/calendar/embed?src=f2ga2dtf3rh3lrc27t3kskn2r4%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>	
			</div>
		</div>
	</body>
</html>
