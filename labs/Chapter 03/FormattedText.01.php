<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Formatted Text</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      $display_value=9.876;
      
      echo "<pre>\n";
      echo "Unformatted text line 1. ";
      echo "Unformatted text line 2. ";
      echo "$display_value = $display_value";
      echo "</pre>\n";

      echo "<pre>\n";
      echo "Formatted text line 1. \r\n";
      echo "\tFormatted text line 2. \r\n";
      echo "\$display_value = $display_value";
      echo "</pre>\n";
    ?>
  </body>
</html>
