<!DOCTYPE html>
<html>
	<head>
		<title>Register Diver</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Seaside Shelly's Scuba School</h1>
		<?php 
			if(	empty($_REQUEST['first_name']) || 
				empty($_REQUEST['last_name']) || 
				empty($_REQUEST['address']) ||  
				empty($_REQUEST['city']) ||  
				empty($_REQUEST['state']) ||  
				empty($_REQUEST['zip']) ||  
				empty($_REQUEST['email'])) {
					
				exit("<p>You must fill out all of the fields in the diver registration form.</p>
					  <p>Please return to the form on the previous page.</p>");
			}
			else {
				
			}
		?>
	</body>
</html>