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
					<?php
						function textfield($name, $value, $size, $tabindex, $onchange) {
							return '<input type="text" name="'. $name .'" value="'. $value .'" size='. $size .' tabindex='. $tabindex .' onchange="'. $onchange .'" />';
						}
						$count = 3;
						echo '<td>In-House Training<br />';
						for ($i=0;$i<$count;$i++) {
							echo "\n".'<p>'. textfield('description'. $i, 'Description '. $i, 34, 5 + $i, '') .'</p>';
						}
						echo '</td>';
						echo '<td>Quantity<br />';
						for ($i=1;$i<=$count;$i++) {
							echo "\n".'<p>'. textfield('quantity'. $i, '', 5, 4 + $i * 2, 'return calcTotal()') .'</p>';
						}
						echo '</td>';
						echo '<td>Rate<br />';
						for ($i=1;$i<=$count;$i++) {
							echo "\n".'<p>'. textfield('rate'. $i, '', 5, 6 + $i * 2, 'return calcTotal()') .'</p>';
						}
						echo '</td>';
						echo '<td>Amount<br />';
						for ($i=1;$i<=$count;$i++) {
							echo "\n".'<p>'. textfield('amount'. $i, '', 5, 0, '') .'</p>';
						}
						echo '</td>';
						
					?>
				</tr>
			</table>
		</form>
	</body>
</html>
