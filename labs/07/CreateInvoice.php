<!DOCTYPE html>
<html>
	<head>
		<title>Create Invoice</title>
		<link rel="stylesheet" href="php_styles.css" type="text/css" />
		<script type="text/javascript">
      function calcTotal() {
        var firstItem = document.form[0].quantity1.value * document.form[0].rate1.value;
        var secondItem = document.form[0].quantity2.value * document.form[0].rate2.value;
        var thirdItem = document.form[0].quantity3.value * document.form[0].rate3.value;
        if (isNaN(firstItem) || isNaN(secondItem) || isNaN(thirdItem)) {
          alert("You can only enter numbers in the Quantity and Rate fields!");
          return false;
        }
        else {
          document.form[0].amount1.value = firstItem;
          document.form[0].amount2.value = secondItem;
          document.form[0].amount3.value = thirdItem;
        }
      }
		</script>
	</head>
	<body>
		<h1>Create Invoice</h1>
		
	</body>
</html>
