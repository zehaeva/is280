<?php
	session_start();
	//$_SESSION = array();
	//session_destroy();
	
	include_once('shoppingcart.php');
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
		<h2>Shop Olives</h2>
		<?php
			$database = 'gretchengourmet';
			$table = 'olives';
			if (isset($_SESSION['curcart'])) {
				$cart = unserialize($_SESSION['curcart']);
			}
			else {
				if (class_exists("ShoppingCart")) {
					$cart = new ShoppingCart();
					$cart->setDatabase($database);
				}
				else {
					exit('<p>The Shopping Cart is unavailable. Please try again later</p>');
				}
			}
			
			$cart->setTable($table);
			$cart->getProductList();
			
			$_SESSION['curcart'] = serialize($cart);
		?>
		<p><a href="<?php echo 'viewcart.php?PHPSESSID='. session_id(); ?>">Show Cart</a></p>
	</body>
</html>
