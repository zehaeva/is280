<!DOCTYPE HTML>
<html>
	<head>
		<title>MySQL Server Information</title>
		<link rel="stylesheet" src="php_styles.css" type="text/css" />
	<head>
	<body>
		<h1>MySQL DB Server Information</h1>	
<?php
$connect = mysqli_connect('localhost', 'root', '');
echo "<p>MySQL Client Version: ". mysqli_get_client_info() .'</p>';
echo "<p>MySQL Connection: ". mysqli_get_host_info($connect) .'</p>';
echo "<p>MySQL Protocol Version: ". mysqli_get_proto_info($connect) .'</p>';
echo "<p>MySQL Server Version: ". mysqli_get_server_info($connect) .'</p>';
mysqli_close($connect);
?>
	</body>
</html>