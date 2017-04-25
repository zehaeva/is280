<?php
class ShoppingCart {
	private $conn;
	private $db_name = "";
	private $table_name = "";
	private $orders = array();
	private $order_table = array();
	
	function __construct() {
		$this->conn = @new mysqli('localhost', 'root', '');
		if (mysqli_connect_errno()) {
			die($this->getDBError());
		}
	}
	
	function __destruct() {
		$this->conn->close();
	}
	
	private function getDBError() {
		return "<p>Unable to connect to the database.</p><p>Error Code: ". 
				mysqli_connect_errno($this->conn) .": ". mysqli_connect_error($this->conn) ."</p>";
	}
	
	public function setDatabase($database) {
		$this->db_name = $database;
		@$this->conn->select_db($this->db_name) or die($this->getDBError());
	}
	
	public function setTable($table) {
		$this->table_name = $table;
	}
	
	public function getProductList() {
		$sql = 'SELECT * FROM '. $this->table_name;
		
		$result = $this->conn->query($sql) or die($this->getDBError());
		
		echo '<table width="100%" border=1>';
		echo '<tr><th>Product</th><th>Description</th><th>Price</th><th>Select Item</th></tr>';
		
		while ($row = $result->fetch_row()) {
			echo '<tr><td>'. $row[1] .'</td><td>'. $row[2] .'</td>';
			printf('<td align="center">$ %.2f</td>', $row[3]);
			echo '<td align="center"><a href="viewcart.php?PHPSESSID='. session_id() .'&operation=additem&productid='. $row[0] .'">Add</a></td></tr>'; 
		}
		
		echo '</table>';
	}
	
	public function addItem() {
		$product_id = @$_REQUEST['productid'];
		if (array_key_exists($product_id, $this->orders)) {
			exit("<p>You've already selected this item, Go back and change the quantity to add more of this product</p>");
		}
		$this->orders[$product_id] = 1;
		$this->order_table[$product_id] = $this->table_name;
	}
	
	function __wakeup() {
		$this->conn = @new mysqli('localhost', 'root', '');
		if (mysqli_connect_errno()) {
			die($this->getDBError());
		}
		@$this->conn->select_db($this->db_name) or die($this->getDBError());
	}
	
	private function getviewcarturl($operation, $productid) {
		return 'viewcart.php?PHPSESSID='. session_id() .'&operation='. $operation .'&productid='. $productid;
	}
	
	public function viewcart() {
		if (empty($this->orders)) {
			echo "<p>Your Shopping Cart is empty</p>";
		}
		else {
			echo '<table width="100%" border=1>';
			echo '<tr><th>Remove Item</th><th>Product</th><th>Quantity</th><th>Price</th></tr>';
			$total = 0;
			foreach($this->orders as $key=>$order) {
				$sql = 'SELECT * FROM '. $this->order_table[$key] 
					  ." WHERE productid = '". $key ."'";
				
				$result = mysqli_query($this->conn, $sql) or die($this->getDBError());
				
				while($row = mysqli_fetch_row($result)) {
					$total += $row[3] * $order;
					echo '<tr>';
					echo '<td align="center"><a href="'. $this->getviewcarturl('remove', $row[0]) .'">Remove</a></td>';
					echo '<td>'. $row[1] .'</td>';
					echo '<td align="center">'. $order .' ';
					echo '<a href="'. $this->getviewcarturl('addone', $row[0]) .'">Add One</a> ';
					echo '<a href="'. $this->getviewcarturl('removeone', $row[0]) .'">Remove One</a></td>';
					printf('<td align="center">$%.02f</td>', $row[3]);
					echo '</tr>';
				}
			}
			echo '<tr><td align="center"><a href="'. $this->getviewcarturl('emptycart', 0) .'"><strong>Empty Cart</strong></a></td>';
			echo '<td colspan=2><strong>Your shopping cart contains '. count($this->orders) .' products</strong></td>';
			printf('<td align="center"><strong>Total: $%.02f</strong></td></tr>', $total);
			echo '</table>';
		}
	}
	
	public function removeItem() {
	//	removes the specified item from the cart
		$productid = $_REQUEST['productid'];
		unset ($this->orders[$productid]);
		unset ($this->order_table[$productid]);
	}
	
	public function emptyCart() {
	//	empties the cart
		$this->orders = array();
		$this->orders_table = array();
	}
	
	public function addOne() {
		$productid = $_REQUEST['productid'];
		$this->orders[$productid] += 1;
	}
	
	public function removeOne() {
		$productid = $_REQUEST['productid'];
		$this->orders[$productid] -=1;
		if ($this->orders[$productid] <= 0) {
			$this->removeItem();
		}
	}
	
	public function checkOut() {
		$productid = $_REQUEST['productid'];
		foreach($this->orders as $order) {
			$sql = 'INSERT INTO '. $this->table_name . " VALUES ('". session_id() ."', '". key($this->orders) ."', ". $this->orders[key($this->orders)] .", '". $order ."')";
			$result = @mysqli_query($this->conn, $sql) or die($this->getDBError());
		}
		
		echo 'Your order has been submitted!';
	}
}
/*
$val = new ShoppingCart();

$val->addItem();
$val->viewcart();
*/
?>
