<?php
include_once('inc/db.php');
include_once('inc/functions.php');
include('menu.php');
include_once('bootstrap-cdn.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Members</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php echo get_scripts(); ?>
	</head>
	<body>
<?php
print(menu(1));
?>
		<div class="container">
			<div class="panel">
				<div class="panel-title"><h3>Member Directory</h3></div>
				<div class="panel-body" id="member-app"><ul class='list-group'><members v-for="details in memberList" v-bind:member="details"></ul></div>
				<script src="<?php echo get_http(); ?>://<?php echo $_SERVER['SERVER_NAME'] .'/js/mvgoclub.js'; ?>" type="text/javascript"></script>
			</div>
		</div>
	</body>
</html>
