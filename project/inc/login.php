<?php
include_once('db.php');

function get_login_button() {
	$return = '<div>';

	if (isset($_SESSION['user_name'])) {
		$return .= '<div class="navbar-form navbar-right"><a class="btn btn-link " href="/profile">Welcome '. $_SESSION['given_name'] .' '. $_SESSION['sur_name'] .'</a> <a class="btn btn-link" href="/logout">logout</a></div>';
	}
	else {
		$return .= '<div class="navbar-form navbar-right" role="login"><a class="btn btn-link " data-toggle="modal" data-target="#login-modal">Login</a></div>'. get_login_form();
	}

	return $return .'</div>';
}

function get_login_form() {

return '<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="loginmodal-container">
			<h1>Login to Your Account</h1><br>
			<form action="/login.php" method="post">
				<input type="text" name="user" placeholder="Username">
				<input type="password" name="pass" placeholder="Password">
				<input type="submit" name="login" class="login loginmodal-submit" value="Login">
			</form>

			<div class="login-help">
				<a href="/register">Register</a> - <a href="/forgotpassword">Forgot Password</a>
			</div>
		</div>
	</div>
</div>';

}

?>
