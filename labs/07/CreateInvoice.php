<!DOCTYPE html>
<html>
	<head>
		<title>Create Invoice</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
		<script type="text/javascript">
      function calcTotal() {
        var myform = document.form[0];
        var firstItem = myform.quantity1.value * myform.rate1.value;
        var secondItem = myform.quantity2.value * myform.rate2.value;
        var thirdItem = myform.quantity3.value * myform.rate3.value;
        
      }
		</script>
	</head>
	<body>
		<h1>Create Invoice</h1>
		
	</body>
</html>
