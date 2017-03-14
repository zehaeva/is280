<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Schedule</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('../bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
	include('../menu.php');
	print(menu(4));
?>
		<div class="container">
			<div id="title">MV Go Club Schedule</div>
			<div id="content">
				<iframe src="https://calendar.google.com/calendar/embed?src=f2ga2dtf3rh3lrc27t3kskn2r4%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>	
			</div>
		</div>
	</body>
</html>
