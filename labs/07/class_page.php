 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict-dtd">
 <html>
	 <head>
		<title>Invoices</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
	 </head>
	 <body>
		<h1>Invoices</h1>
		<form method="get" action="CreateInvoice.php" enctype="application/x-www-form-urlencoded">
			<p>
				<input type="submit" value="Create Invoice" />
			</p>
		</form>
		<form method="get" action="ViewOpenInvoices.php" enctype="application/x-www-form-urlencoded"> 
			<p>
				<input type="submit" value="View Open Invoices" />
			</p>
		</form>
		<form method="get" action="ViewInvoices.php" enctype="application/x-www-form-urlencoded"> 
			<p>
				<input type="submit" value="View Invoice #" />
				<input type="text" name="invoicenum" />
			</p>
		</form>
	 </body>
 </html>
