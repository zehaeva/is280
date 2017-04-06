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
			echo '<td align="center"><a href="showcart.php?PHPSESSID='. session_id() .'&operation=additem&productid='. $row[0] .'">Add</a></td></tr>'; 
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
	
	public function showCart() {
		
	}
}

$val = new ShoppingCart();

$val->addItem();

?>