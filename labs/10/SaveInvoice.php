<!DOCTYPE html>
<html>
    <head>
        <title>Save Invoice</title>
        <link rel="stylesheet" href="php_styles.css" type="text/css" />
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <?php
            $bill_to = addslashes($_REQUEST['billto']);
            $date = addslashes($_REQUEST['date']);
            $terms = addslashes($_REQUEST['terms']);
            $description1 = addslashes($_REQUEST['description1']);
            $description2 = addslashes($_REQUEST['description2']);
            $description3 = addslashes($_REQUEST['description3']);
            $invoice_num = $_REQUEST['invoicenum'];
            $quantity1 = $_REQUEST['quantity1'];
            $quantity2 = $_REQUEST['quantity2'];
            $quantity3 = $_REQUEST['quantity3'];
            $rate1 = $_REQUEST['rate1'];
            $rate2 = $_REQUEST['rate2'];
            $rate3 = $_REQUEST['rate3'];
            $amount1 = $_REQUEST['amount1'];
            $amount2 = $_REQUEST['amount2'];
            $amount3 = $_REQUEST['amount3'];
            $total = $_REQUEST['total'];
            
            if (empty($bill_to) || empty($date) || empty($terms) || empty($description1) || empty($description2) || empty($description3) ) {
                echo "<hr /><p>You must enter a value in each field. Click your browser's back button to return to the invoice</p><hr />";
            }
            elseif (!is_numeric($invoice_num) || 
            !is_numeric($quantity1) || !is_numeric($quantity2) || !is_numeric($quantity3) || 
            !is_numeric($rate1) || !is_numeric($rate2) || !is_numeric($rate3) || 
            !is_numeric($amount1) || !is_numeric($amount2) || !is_numeric($amount3) || 
            !is_numeric($total) ) {
                echo "<p>The Invoice #, Quantity, Rate, Amount, and Total fields must contain numeric values! Click your browser's back button to return to the invoice.</p>";
            }
            else {
                $fix_bill_to = explode("\n", $bill_to);
                $fix_bill_to = implode("~", $fix_bill_to);
                $invoice = $fix_bill_to ."\n". $invoice_num ."\n". $date ."\n". $terms ."\n". 
                            $description1 ."\n". $description2 ."\n". $description3 ."\n". 
                            $quantity1 ."\n". $quantity2 ."\n". $quantity3 ."\n". 
                            $rate1 ."\n". $rate2 ."\n". $rate3 ."\n". 
                            $amount1 ."\n". $amount2 ."\n". $amount3 ."\n". 
                            $total ."\n";
                
                if (!file_exists("open")) {
                    mkdir("open");
                }
                $invoice_file = fopen("open\\". $invoice_num ."txt", 'w');
                
                if(flock($invoice_file, LOCK_EX)) {
                    if (fwrite($invoice_file, $invoice) > 0) {
                        echo "<h1>Invoice Saved</h1><hr /><br /><table frame='border' rules='rows'><tr><td><strong>Bill To</strong><pre>$bill_to</pre></td>";
                        echo "<td style='text-align: right' colspan=3><br /><strong>Invoice #</strong>: $invoice_num<br />";
                        echo "<strong>Date</strong>: $date<br />";
                        echo "<strong>Terms</strong>: $terms</td></tr>";
                        echo "<tr>";
                        echo "<td><strong>Description</strong><br />$description1<br />$description2<br />$description3</td>";
                        echo "<td style='text-align: right'><strong>Quantity</strong><br />$quantity1<br />$quantity2<br />$quantity3</td>";
                        echo "<td style='text-align: right'><strong>Rate</strong><br />$rate1<br />$rate2<br />$rate3</td>";
                        echo "<td style='text-align: right'><strong>Amount</strong><br />$amount1<br />$amount2<br />$amount3</td></tr>";
                        echo "<tr><td colspan=4  style='text-align: right'><strong>Total</strong>: $$total</td></tr></table>";
                        flock($invoice_file, LOCK_UN);
                        fclose($invoice_file);
                    }
                    else {
                        echo "<p>The Invoice could not be saved!</p>";
                    }
                }
                else {
                    echo "<p>The Invoice could not be saved!</p>";
                }
            }
        ?>
        <p><a href="Invoices.php">Return to Main Invoices Page</a></p>
    </body>
</html>
