<?php
	session_start();
	$_SESSION = array();
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gretchen's Gourmet Goods</title>
		<link rel="stylesheet" href="php_style.css" type="text/css" />
	</head>
	<body>
		<h1>Gretchen's Gourmet Goods</h1>
		<h2>Shop by Category</h2>
		<p>
			<a href= "<?php echo 'gourmetcoffees.php?PHPSESSID='. session_id(); ?>">Gourmet Coffees</a>
			<a href= "<?php echo 'gourmetolives.php?PHPSESSID='. session_id(); ?>">Gourmet Olives</a>
			<a href= "<?php echo 'gourmetspices.php?PHPSESSID='. session_id(); ?>">Gourmet Spices</a>
		</p>
	</body>
</html>