<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Members</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
	</head>
	<body>
<?php
  include('../menu.php');
?>
		<div id="title">MVGo Club Members!</div>
		<div id="member-app"><ul><members v-for="details in memberList" v-bind:member="details"></ul></div>
		<script src="http://<?php echo $_SERVER['SERVER_NAME'] .'/js/mvgoclub.js'; ?>" type="text/javascript"></script>
	</body>
</html>