<!DOCTYPE html>
<html>
	<head>
		<title>View Invoice</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
		<script type="text/javascript">
		</script>
	</head>
	<body>
		<?php
			if (empty($_REQUEST['invoicenum'])) {
				echo '<hr /><p>You must enter an existing Invoice Number. 
				Click your brower back button to return to the Invoices page.</p><hr />';
			}
			else if (is_readable("Open\\". $_REQUEST['invoicenum'] .".txt")) {
			//	open the file
				$invoice_fields = $fopen("Open\\". $_REQUEST['invoicenum'] .".txt", 'r');
				$bill_to = fgets($invoice_fields);
				
			//	now we're going to get the raw data of the first line into a more useful format
				$fix_bill_to = explode('~', $bill_to);
				$bill_to = implode('\n', $fix_bill_to);
				$bill_to = stripslashes($bill_to);
				
			//	now we're going down each line and putting it into a variable
				$invoice_num = stripslashes(fgets($invoice_fields));
				$date = stripslashes(fgets($invoice_fields));
				$terms = stripslashes(fgets($invoice_fields));
				
				$items = array(array());
				
			//	gets the data for each line item
				for($i=0; $i<=3; $i++) {
					for($j=0; $j<=3; $j++) {
						$items[$j][$i] = stripslashes(fgets($invoice_fields));
					}
				}
				
				$total = stripslashes(fgets($invoice_fields));
				
				fclose($invoice_fields);
			}
		?>
	</body>
</html>