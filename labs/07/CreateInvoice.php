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
        
        if (isNaN(firstItem)) {//} || isNaN(secondItem) || isNaN(thirdItem)) {
          alert("You can only enter numbers in the Quantity and Rate fields!");
          return false;
        }
        else {
          document.form[0].amount1.value = firstItem;
          document.form[0].amount2.value = secondItem;
          document.form[0].amount3.value = thirdItem;
          
          var grandTotal = firstItem + secondItem + thirdItem;
          
          return true;
        }
      }
		</script>
	</head>
	<body>
		<h1>Create Invoice</h1>
		<form action="" method=""> 
      <p>
        <label for="quantity1">Quantity</label>
        <input type="text" name="quantity1" onchange="calcTotal"/>
        <label for="rate1">Rate</label>
        <input type="text" name="rate1" onchange="calcTotal" />
        <label for="amount1">Amount</label>
        <input type="text" name="amount1" />
      </p>
      <p>
        <label for="quantity2">Quantity</label>
        <input type="text" name="quantity2" />
        <label for="rate2">Rate</label>
        <input type="text" name="rate2" />
        <label for="amount2">Amount</label>
        <input type="text" name="amount2" />
      </p>
      <p>
        <label for="quantity2">Quantity</label>
        <input type="text" name="quantity3" />
        <label for="rate1">Rate</label>
        <input type="text" name="rate3" />
        <label for="amount2">Amount</label>
        <input type="text" name="amount3" />
      </p>
    </form>
	</body>
</html>
