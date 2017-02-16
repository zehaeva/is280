<!DOCTYPE html>
<html>
	<head>
		<title>View Invoices</title>
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
			if else (is_readable("Open\\". $_REQUEST['invoicenum'] .".txt")) {
				
			}
		?>
	</body>
</html>