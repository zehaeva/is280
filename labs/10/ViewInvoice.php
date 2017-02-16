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
				
			//	descriptions
				$items[0][0] = stripslashes(fgets($invoice_fields));
				$items[1][0] = stripslashes(fgets($invoice_fields));
				$items[2][0] = stripslashes(fgets($invoice_fields));
				
			//	quantities
				$items[0][1] = stripslashes(fgets($invoice_fields));
				$items[1][1] = stripslashes(fgets($invoice_fields));
				$items[2][1] = stripslashes(fgets($invoice_fields));
				
			//	rates
				$items[0][2] = stripslashes(fgets($invoice_fields));
				$items[1][2] = stripslashes(fgets($invoice_fields));
				$items[2][2] = stripslashes(fgets($invoice_fields));
				
			//	amounts
				$items[0][3] = stripslashes(fgets($invoice_fields));
				$items[1][3] = stripslashes(fgets($invoice_fields));
				$items[2][3] = stripslashes(fgets($invoice_fields));
				
				$total = stripslashes(fgets($invoice_fields));
				
				fclose($invoice_fields);
			}
		?>
	</body>
</html>