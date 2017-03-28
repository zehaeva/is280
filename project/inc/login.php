<?php
include_once('../inc/db.php');

function get_login_button() {
	$return = '<div>';

	if (isset($_SESSION['username'])) {
		$return .= '';
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
			<form>
				<input type="text" name="user" placeholder="Username">
				<input type="password" name="pass" placeholder="Password">
				<input type="submit" name="login" class="login loginmodal-submit" value="Login">
			</form>

			<div class="login-help">
				<a href="#">Register</a> - <a href="#">Forgot Password</a>
			</div>
		</div>
	</div>
</div>';

}

?>
