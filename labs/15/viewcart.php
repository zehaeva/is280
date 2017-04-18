<?php
	require_once('shoppingcart.php');
	
	session_start();
	if (!isset($_SESSION['curcart'])) {
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
		<h2>Shop by Category</h2>
		<p>
			<a href= "<?php echo 'gourmetcoffees.php?PHPSESSID='. session_id(); ?>">Gourmet Coffees</a>
			<a href= "<?php echo 'gourmetolives.php?PHPSESSID='. session_id(); ?>">Gourmet Olives</a>
			<a href= "<?php echo 'gourmetspices.php?PHPSESSID='. session_id(); ?>">Gourmet Spices</a>
		</p>
		<h2>Your Shopping Cart</h2>
		<?php
			$cart = unserialize($_SESSION['curcart']);
			if (isset($_REQUEST['operation'])) {
				if ($_REQUEST['operation'] == 'additem') {
					$cart->additem();
				}
				elseif ($_REQUEST['operation'] == 'removeitem') {
					$cart->removeitem();
				}
				elseif ($_REQUEST['operation'] == 'emptycart') {
					$cart->emptycart();
				}
				elseif ($_REQUEST['operation'] == 'addone') {
					$cart->addone();
				}
				elseif ($_REQUEST['operation'] == 'removeone') {
					$cart->removeone();
				}
			}
			
			$cart->viewcart();
			
			$_SESSION['curcart'] = serialize($cart);
		?>
		<p>
			<a href="<?php echo "checkout.php?operation=checkout&PHPSESSID=". session_id() ."&productid=" . $_REQUEST['productid']; ?>">Checkout</a>
			<a href="index.php">Cancel Order</a>
		</p>
	</body>
</html>