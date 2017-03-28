<!DOCTYPE html>
<html>
	<head>
		<title>Register Diver</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Seaside Shelly's Scuba School</h1>
		<?php 
			include_once('functions.php');
			
			if(	empty($_REQUEST['first_name']) || 
				empty($_REQUEST['last_name']) || 
				empty($_REQUEST['phone']) ||  
				empty($_REQUEST['address']) ||  
				empty($_REQUEST['city']) ||  
				empty($_REQUEST['state']) ||  
				empty($_REQUEST['zip']) ||  
				empty($_REQUEST['email'])) {
					
				exit("<p>You must fill out all of the fields in the diver registration form.</p>
					  <p>Please return to the form on the previous page.</p>");
			}
			else {
				$connection = @mysqli_connect("localhost", "root", "") or die(dbconnerror($connection));
				$dbname = 'scubaschool';
				
				if (!@mysqli_select_db($connection, $dbname)) {
					$sql = 'create database `'. $dbname .'`;';
					@mysqli_query($connection, $sql) or die(dbconnerror($connection));
					echo '<p>Database successfully created</p>';
					
					@mysqli_select_db($connection, $dbname);
				}
								
				$table_name = 'divers';
				$sql = 'SELECT * FROM '. $table_name .';'; 
				$results = @mysqli_query($connection, $sql);
				if (!$results) {
					$sql_create = 'create table '. $table_name . ' (diverid int auto_increment primary key, firstname varchar(40), lastname varchar(40), phone varchar(20), address varchar(80), city varchar(40), state varchar(40), zip varchar(10), email varchar(80));';
					@mysqli_query($connection, $sql_create) or die(dbconnerror($connection));
					
					echo '<p>Table Created</p>';
					$results = @mysqli_query($connection, $sql);
				}
				
				$first = addslashes($_REQUEST['first_name']);
				$last = addslashes($_REQUEST['last_name']) ; 
				$phone = addslashes($_REQUEST['phone']) ;  
				$address = addslashes($_REQUEST['address']) ;  
				$city = addslashes($_REQUEST['city']) ;  
				$state = addslashes($_REQUEST['state']) ;  
				$zip = addslashes($_REQUEST['zip']) ;  
				$email = addslashes($_REQUEST['email']);
				
				$sql = "INSERT INTO $table_name VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?);";
				
				$params = array($first, $last, $phone, $address, $city, $state, $zip, $email);
				
				$results = mysqli_prepared_query($connection, $sql, "ssssssss", $params);
				
				
				$diverid = mysqli_insert_id($connection);
				
				mysqli_close($connection);
			}
		?>
		<p>Thanks <?php echo $first; ?>! Your new Diver ID is <strong><?php echo $diverid; ?></strong></p>
		
		<form action="courselistings.php method="get>
			<p>
				<input type=submit name=submit value="Register for Classes">
				<input type=hidden value="<?php $diverid ?>" name="diverid" />
			</p>
		</form>
	</body>
</html>