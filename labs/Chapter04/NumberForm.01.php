<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Number Form</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      $displayform = TRUE;
      $number = "";
      
      if (isset($_POST['Submit'])) {
        $number = $_POST['Number'];

        if (is_numeric($number)) {
          $displayform = FALSE;
        } 
        else {
          echo "<p>You need to enter a numeric value.</p>\n";
          $displayform = TRUE;
        }
      }
      
      if ($displayform) {
    ?>
      <form name="NumberForm" action="NumberForm.01.php" method="post">
        <p>Enter a number: <input type="text" name="Number" value="<?php echo $number; ?>" /></p>
        <p><input type="reset" value="Clear Form" />&nbsp;&nbsp;<input type="submit" name="Submit" value="Send Form" /></p>
      </form>
    <?php
      }
      else {
        echo "<p>Thank you for entering a number.</p>\n";
        echo "<p>Your number, $number, squared is ". ($number*$number) .".</p>\n ";
        echo "<p><a href=\"NumberForm.php\">Try again?</a></p>\n";
      }
    ?>
  </body>
</html>
