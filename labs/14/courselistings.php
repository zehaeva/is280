<!DOCTYPE html>
<html>
	<head>
		<title>Course Listings</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Seaside Shelly's Scuba School</h1>
		<h2>Class Registration Form</h2>
		<?php
			include('functions.php');
			$conn = @mysqli_connect("localhost", "root", "") or die(dbconnerror($conn));
			
			$dbname = 'scubaschool';
			
			if(!@mysqli_select_db($conn, $dbname)) {
				initialize_db($conn, $dbname);
				@mysqli_select_db($conn, $dbname);
			}
			
			$diver_id = $_REQUEST['diverid'];
			
			if (empty($diver_id)) {
				exit('<p>You must enter a Diver ID. Please go back and fill in the correct field</p>');
			}
			else {
				$table_name = 'divers';
				$sql = 'SELECT * FROM '. $table_name .' WHERE diverid = ?;';
									
				$params = array($diver_id);
				$results = mysqli_prepared_query($conn, $sql, "s", $params);
				
				if (count($results) == 0) {
					die('<p>Enter a valid Diver ID, if you are a new diver please fill out the registration form.</p>');
				}
				
				mysqli_close($conn);
			}
		?>
		<form method="get" action="reviewschedule.php">
			<p><strong>Student ID: <?php echo $diver_id; ?></strong>
				<input type="submit" value= "Review Current Schedule" /><input type=hidden name=diverid value="<?php echo $diver_id; ?>" />
			</p>
		</form>
		<form method="get" action="registerdiver.php">
			<p><strong>Select the class you would like to take:</strong></p>
			<p>
				<input type=radio name="class" value="Beginning Open Water" />Beginning Open Water<br />
				<input type=radio name="class" value="Advanced Open Water" />Advanced Open Water<br />
				<input type=radio name="class" value="Rescue Diving" />Rescue Diving<br />
				<input type=radio name="class" value="Divemaster Certification" />Divemaster Certification<br />
				<input type=radio name="class" value="Instructor Certification" />Instructor Certification<br />
			</p>
			<p>
				<strong>Available Days and Times</strong><br />
				<select name="days">
					<option selected=selected value="Mondays and Wednesdays">Mondays and Wednesdays</option>
					<option value="Tuesdays and Thursdays">Tuesdays and Thursdays</option>
					<option value="Wednesdays and Fridays">Wednesdays and Fridays</option>
				</select>
				<select name="time">
					<option selected=selected value="9 a.m. - 11 a.m.">9 a.m. - 11 a.m.</option>
					<option value="1 p.m. - 3 p.m.">1 p.m. - 3 p.m.</option>
					<option value="6 p.m. - 8 p.m.">6 p.m. - 8 p.m.</option>
				</select>
			</p>
			<input type=hidden name=diverid value="<?php echo $diver_id; ?>" />
			<p>
				<input type=submit name="submit" value="Register" />
				<input type=reset />
			</p>
		</form>
	</body>
</html>