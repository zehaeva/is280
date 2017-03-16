<?php
include_once('../inc/db.php');
include('../menu.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Members</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('../bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
print(menu(1));
?>
		<div class="container">
			<div id="title">Members</div>
			<div id="member-app"><ul class='list-group'><members v-for="details in memberList" v-bind:member="details"></ul></div>
			<script src="http://<?php echo $_SERVER['SERVER_NAME'] .'/js/mvgoclub.js'; ?>" type="text/javascript"></script>
		</div>
	</body>
</html>
