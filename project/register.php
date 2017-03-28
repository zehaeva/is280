<?php
include_once('../inc/db.php');
include('../menu.php');

//  if we're logged in we should never come here
if ($_SESSION['loggedin']) {
	header( 'Location: '. $_SERVER['SERVER_NAME'] .'/');
}
elseif ($_REQUEST['submit'] == 'Register' && $_REQUEST['terms']) {
	
}
else {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MV Go Club Register</title>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<?php include_once('../bootstrap-cdn.php'); ?>
	</head>
	<body>
<?php
print(menu(-1));
?>
		<div class="container">
            <form class="form-horizontal" role="form">
                <h2>Registration Form</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                    </div>
					<label for="lastName" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                    </div>

                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
               <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">I accept <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
	</body>
</html>
<?php
}
?>
