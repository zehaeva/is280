<?php
//include datahbase connection
include_once('inc/db.php');
include_once('menu.php');
include_once('bootstrap-cdn.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php echo get_scripts(); ?>
	</head>
	<body>
<?php
print(menu(0));
?>
		<div class="container">
			<div class="panel">
				<div class='panel-title'><h3>Welcome to the Mohawk Valley Go Club!</h3></div>
				<div class='content panel-body'>We're a group of local Go enthusiasts who love to get together in person and share our passion for the ancient game of Go.</div>
			</div>
 		</div> 
	</body>
</html>
