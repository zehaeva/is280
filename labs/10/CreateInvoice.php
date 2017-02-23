<!DOCTYPE html>
<html>
	<head>
		<title>Create Invoice</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
		<script type="text/javascript">
		  function calcTotal() {
			var firstItem = document.forms[0].quantity1.value * document.forms[0].rate1.value;
			var secondItem = document.forms[0].quantity2.value * document.forms[0].rate2.value;
			var thirdItem = document.forms[0].quantity3.value * document.forms[0].rate3.value;
			
			if (isNaN(firstItem)) {//} || isNaN(secondItem) || isNaN(thirdItem)) {
			  alert("You can only enter numbers in the Quantity and Rate fields!");
			  return false;
			}
			else {
			  document.forms[0].amount1.value = firstItem;
			  document.forms[0].amount2.value = secondItem;
			  document.forms[0].amount3.value = thirdItem;
			  
			  var grandTotal = firstItem + secondItem + thirdItem;
			  
			  return true;
			}
		  }
		  function getTotal() {
			  return grandTotal;
		  }
		</script>
	</head>
	<body>
		<h1>Create Invoice</h1>
		<form action="SaveInvoices.php" method="post" enctype="application/x-www-form-urlencoded"> 
			<table frame="border" rules="rows">
				<tr>
					<td>Bill To<br />
						<textarea name="billto" rows=4 cols=25 tabindex=1></textarea>
					</td>
					<td style="text-align: right" colspan=3>
						<p>Invoice # <input type="text" name="invoicenum" size=28 tabindex=2 /></p>
						<p>Date # <input type="text" name="date" size=28 tabindex=3 /></p>
						<p>Terms # <input type="text" name="terms" size=28 tabindex=4 /></p>
					</td>
				</tr>
				<tr>
					<td>In-House Training<br />
						<p><input type="text" name="description1" value="Description 1" size=34 tabindex=5 /></p>
						<p><input type="text" name="description2" value="Description 2" size=34 tabindex=8 /></p>
						<p><input type="text" name="description3" value="Description 3" size=34 tabindex=11 /></p>
					</td>
					<td>Quantity<br />
						<p><input type="text" name="quantity1" size=10 tabindex=6 onchange="return calcTotal()"/></p>
						<p><input type="text" name="quantity2" size=10 tabindex=9 onchange="return calcTotal()"/></p>
						<p><input type="text" name="quantity3" size=10 tabindex=12 onchange="return calcTotal()"/></p>
					</td>
					<td>Rate<br />
						<p><input type="text" name="rate1" size=10 tabindex=7 onchange="return calcTotal()"/></p>
						<p><input type="text" name="rate2" size=10 tabindex=10 onchange="return calcTotal()"/></p>
						<p><input type="text" name="rate3" size=10 tabindex=13 onchange="return calcTotal()"/></p>
					</td>
					<td>Amount<br />
						<p><input type="text" name="amount1" size=10 tabindex=0 onfocus="this.blur()" /></p>
						<p><input type="text" name="amount2" size=10 tabindex=0 onfocus="this.blur()" /></p>
						<p><input type="text" name="amount3" size=10 tabindex=0 onfocus="this.blur()" /></p>
					</td>
				</tr>
				<tr>
					<td colspan=4 style="text-align: right">
						TOTAL: <input type="text" name="total1" size=10 value=0 tabindex=0 onfocus="this.blur()" />
					</td>
				</tr>
			</table>
			<p>
				<input type="submit" value="Reset" tabindex=15 />
				<input type="submit" value="Save New Invoice" tabindex=14 />
			</p>
		</form>
		<a href="Invoices.php" />Return to Main Invoices Page</a>
	</body>
</html>
