<?php
include_once('inc/db.php');
include('menu.php');
include_once('bootstrap-cdn.php');

function refill($value) {
	$return = '';
	if ($_REQUEST['submit'] == 'Register') {
		if (!empty($_REQUEST[$value])) { 
			$return = ' value="'. $_REQUEST[$value] .'" ';
		}
	}

	return $return;
}

function get_status($value) {
	$return = '';
	if ($_REQUEST['submit'] == 'Register') {
		if (!isset($_REQUEST[$value]) || empty($_REQUEST[$value])) { 
			$return = ' has-error ';
		}
	}
	return $return;
}

function generateRandomString($length = 10) {
	    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$error = '';

//  if we're logged in we should never come here
if (isset($_SESSION['user_name'])) {
	$_REQUEST['login'] = true;
	include_once('login.php');
}

if ($_REQUEST['submit'] == 'Register' && $_REQUEST['terms']) {
	$salt = generateRandomString();
	$sql = 'INSERT INTO users (user_name, given_name, sur_name, email, password, salt) VALUES ($1, $2, $3, $4, md5($5 || $6), $6);';
	$values = array($_REQUEST['user_name'], $_REQUEST['given_name'], $_REQUEST['sur_name'], $_REQUEST['email'], $_REQUEST['password'], $salt);
	$results = pg_query_params($sql, $values);
	if (pg_affected_rows($results) > 0) {
		header('Location: '. $_SERVER['SERVER_NAME'] .'/profile');
	}
	else {
		$error = '<div class="col-sm-12 text-center">'. pg_last_error() . pg_last_notice() . pg_result_error($results).'<br/>'. print_r($values, true) .'<br/><span class="help is-danger">Sorry, something went wrong with registering, please try again</span></div>';
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Register</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php echo get_scripts(); ?>
	</head>
	<body>
<?php
print(menu(-1));
?>
	<div class="container">
	<div class="panel">
		<div class="panel-title"><h2>Registration Form</h2></div>
		<div class="panel-body" id="registerForm">
			<?php echo $error; ?>
			<form class="form-horizontal" role="form" action="/register" method="post">

				<?php //print_r($_REQUEST); ?>
				<div class="form-group" :class="{'has-error': errors.has('user_name')}">
					<label for="user_name" class="col-sm-3 control-label">User Name</label>

					<div class="col-sm-9 <?php echo get_status('user_name') ?>">
						<input type="text" name="user_name" placeholder="User Name" class="form-control" autofocus <?php refill('user_name') ?>  v-validate="'required'">
					</div>
				</div>
				<div class="form-group">
					<label for="given_name" class="col-sm-3 control-label">First Name</label>

					<div class="col-sm-9 <?php get_status('given_name') ?>">
						<input type="text" name="given_name" placeholder="First Name" class="form-control" <?php refill('given_name') ?> >
					</div>
					<label for="sur_name" class="col-sm-3 control-label">Last Name</label>

					<div class="col-sm-9 <?php get_status('sur_name') ?>">
						<input type="text" name="sur_name" placeholder="Last Name" class="form-control" <?php refill('sur_name') ?> >
					</div>

				</div>
				<div class="form-group" :class="{'has-error': errors.has('email')}">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-9 <?php get_status('email')?>">
						<input type="email" name="email" placeholder="Email" class="form-control" <?php refill('email')?> v-validate="'required|email'" >
						<span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9 <?php get_status('password')?>">
						<input type="password" name="password" placeholder="Password" class="form-control" v-validate="'required|min: 16'">
						<span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
					</div>
				</div>
			   <div class="form-group">
					<div class="col-sm-9 col-sm-offset-3 <?php get_status('terms') ?>">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="terms">I accept <a href="#">terms</a>
							</label>
						</div>
					</div>
				</div> <!-- /.form-group -->
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" name="submit" class="btn btn-primary btn-block" value="Register">Register</button>
					</div>
				</div>
			</form> <!-- /form -->
		</div>
	</div> <!-- /panel -->
<?php
	echo '<script src="https://cdn.jsdelivr.net/vee-validate/2.0.0-beta.25/vee-validate.min.js"></script>
<script>Vue.use(VeeValidate);new Vue({el: "#registerForm"});</script>';
?>
		</div> <!-- ./container -->
	</body>
</html>
<?php
?>
