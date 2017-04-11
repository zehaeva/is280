<!DOCTYPE html>
<html>
	<head>
		<title>Review Schedule</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Seaside Shelly's Scuba School</h1>
		<h2>This is your current schedule</h2>
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
			
			$sql = 'SELECT * FROM '. $table_name .' WHERE diverid = ?';
			
			$params = array($diver_id);
			
			//	passes back an array, not a mysqli resource!!
			$results = mysqli_prepared_query($conn, $sql, "s", $params);
			
			if (count($results) == 0) {
				die("<p>You have not registered for any clases! Click your browser's back button to return to the previous page.</p>");
			}
			else {
				echo "<table width='100%' border=1><tr><th>Class</th><th>Days</th><th>Time</th></tr>";
				foreach($results as $row) {
					echo "<tr><td>{$row['class']}</td><td>{$row['days']}</td><td>{$row['time']}</td></tr>";
				}
			}
			
			mysqli_close($conn);
		?>
	</body>
</html>