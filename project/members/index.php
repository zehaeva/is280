<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Members</title>
	</head>
	<body>
<?php
  include('../menu.php');
?>
		<div id="title">MVGo Club Members!</div>
		<div id="content">
			<div id="member-app"><ul><members v-for="details in memberList" v-bind:member="details"></ul></div>
		</div>
		<script type="text/javascript">
			Vue.component('members', {props: ['member'], template: '<li>{{member.name}}</li>'});
			var memberapp = new Vue({el: '#member-app', data: {memberList: [{name:'Howard'}, {name:'Andrew'}, {name:'Michael'}, {name: 'Ryan'}]}})
		</script>

	</body>
</html>
