<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	</head>
	<body>
		<h1>Seaside Shelly's Scuba School</h1>
		<h2>Learn to scuba dive!</h2>
		<p>Welcome to Seaside Shelly's Scuba School. 
		We offer a variety of scuba diving classes for all ages and levels of experience. 
		Please fill out the new diver registration for and click Get Diver ID button to obtain your Diver ID.
		If you are a current student, enter your Diver ID number and click the 
		Class Registration button to register for a new classes or to review your schedule.
		</p>
		<h2>New Diver Registration</h2>
		<form method="get" action="getdiverid.php" >
			<table frame="border" rules="cols">
				<tr>
					<td align=right valign=top>
						<p>First Name<input type="text" size=30 name="first_name"></p>
						<p>Last Name<input type="text" size=30 name="last_name"></p>
					</td>
				</tr>
				<tr>
					<td></td><td align=right valign=top></td>
				</tr>
			</table>
		</form>
	</body>
</html>