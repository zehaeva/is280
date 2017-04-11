<!DOCTYPE html>
<html>
	<head>
		<title>Register Diver</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Seaside Shelly's Scuba School</h1>
		<h2>Registration Confirmation</h2>
		<?php
			$diver_id = @$_REQUEST['diverid'];
			
			if (empty($diver_id)) {
				exit('<p>You must enter a valid DiverID in the proper field, please return to the page and enter your DiverID</p>');
			}
			
			include('functions.php');
			$conn = @mysqli_connect("localhost", "root", "") or die(dbconnerror($conn));
			
			$dbname = 'scubaschool';
			
			if(!@mysqli_select_db($conn, $dbname)) {
				initialize_db($conn, $dbname);
				@mysqli_select_db($conn, $dbname);
			}
			
			$table_name = 'registration';
			
			$class = @$_REQUEST['class'];
			$days = @$_REQUEST['days'];
			$time = @$_REQUEST['time'];
			
			$sql = 'INSERT INTO '. $table_name .' (diverid, class, days, time) VALUES (?, ?, ?, ?)';
			
			$params = array($diver_id, $class, $days, $time);
				
			$results = mysqli_prepared_query($conn, $sql, "ssss", $params);
			
			mysqli_close($conn);
		?>
		<p>You are registered for <?php echo $class .' on '. $days .', '. $time; ?>. Click your browser's back button to register for another course or review your schedule.</p>
	</body>
</html>