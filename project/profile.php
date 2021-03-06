<?php
//include datahbase connection
include_once('inc/db.php');
include_once('menu.php');
include_once('bootstrap-cdn.php'); 

function form_field($label, $field, $value) {
	return '
<div class="form-group">
	<label class="col-sm-2 control-label" for="'. $field .'">'. $label .'</label>
	<div class="col-sm-10"><input type="text" class="form-control " name="'. $field .'" placeholder="'. $label .'" value="'. $value .'" /></div>
</div>
';
}

if (!isset($_SESSION['user_name'])) {
	header('Location: /');
	exit();
}
else {
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
				<div class='panel-title'><h3>Profile</h3></div>
				<div class='content panel-body'>
					<form id=profile class="form-horizontal" action="api/member/<?php echo $_SESSION['user_id']; ?>" method="post">
						<input type=hidden name="method" value="PUT" />
					<?php echo form_field('User Name', 'user_name', $_SESSION['user_name']); ?>
					<?php echo form_field('First Name', 'given_name', $_SESSION['given_name']); ?>
					<?php echo form_field('Last Name', 'sur_name', $_SESSION['sur_name']); ?>
					<?php echo form_field('Email', 'email', $_SESSION['email']); ?>
					<?php echo form_field('Pandanet Name', 'pandanet_profile_name', $_SESSION['pandanet_profile_name']); ?>
					<?php echo form_field('AGA ID', 'aga_id', $_SESSION['aga_id']); ?>
					<?php echo form_field('OGS ID', 'ogs_id', $_SESSION['ogs_id']); ?>
					<?php echo form_field('KGS ID', 'kgs_id', $_SESSION['kgs_id']); ?>

						<div class="form-group"><div class="col-sm-offset-2 col-sm-10">
							<button type="button" id="post-btn" class="btn btn-default">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div> 
		<script>
		$("#post-btn").click(function(){        
			$.post("api/member/<?php echo $_SESSION['user_id']; ?>", $("#profile").serialize(), function(data) {
				// don't really need to do anything here
			});
		});
		</script>
	</body>
</html>
<?php
}
?>
