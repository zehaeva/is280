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
						<p>First Name <input type="text" size=30 name="first_name" /></p>
						<p>Last Name <input type="text" size=30 name="last_name" /></p>
						<p>Phone <input type="text" size=30 name="phone" /></p>
					</td>
					<td align=right valign=top>
						<p>Address <input type="text" size=40 name="address" /></p>
						<p>City <input type="text" size=10 name="city" />
						State <input type="text" size=2 name="state" maxlength=2 />
						Zip <input type="text" size=10 name="zip" maxlength=10 /></p>
						<p>E-Mail <input type="text" size=40 name="email" /></p>
					</td>
				</tr>
			</table>
			<p>
				<input type="submit" name="submit" value="Get Diver ID" />
				<input type="reset" name="reset" value="Reset" />
			</p>
		</form>
		<form method="get" action="courselistings.php" >
			<p>
				<input type="text" size="30" name="diverid" />
				<input type="submit" name="submit" value="Class Registration" />
			</p>
		</form>
	</body>
</html>