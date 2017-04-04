<?php
	require_once('shoppingcart.php');
	
	session_start();
	if (!isset($_SESSION['curcart']) && $_REQUEST['operation'] != 'checkout') {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gretchen's Gourmet Goods</title>
		<link rel="stylesheet" href="php_style.css" type="text/css" />
	</head>
	<body>
		<h1>Gretchen's Gourmet Goods</h1>
		<?php
			$cart = unserialize($_SESSION['curcart']);
			$cart->setTable("orders");
			$cart->checkout();
		?>
		<p><a href="index.php">Gourmet Goods</a></p>
	</body>
</html>