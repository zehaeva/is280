<?php
//include datahbase connection
include_once('inc/db.php');
include_once('menu.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
print(menu(0));
?>
		<div class="container">
			<div class='header'>Welcome to the Mohawk Valley Go Club!</div>
			<div class='content'><p>We're a group of local Go enthusiasts who love to get together in person and share our passion for the ancient game of Go.</p></div>
 		</div> 
	</body>
</html>
