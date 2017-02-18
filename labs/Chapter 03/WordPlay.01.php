<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Word Play</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      $starting_text = "mAdAm, i'M aDaM.";
      
      $uppercase_text = strtoupper($starting_text);
      $lowercase_text = strtolower($starting_text);
      
      echo "<p>$uppercase_text</p>\n";
      echo "<p>$lowercase_text</p>\n";

      echo "<p>" . ucfirst($lowercase_text) . "</p>\n";
      echo "<p>" . lcfirst($uppercase_text) . "</p>\n";
      $working_text = ucwords($lowercase_text);
      echo "<p>$working_text</p>\n";
    ?>
  </body>
</html>
