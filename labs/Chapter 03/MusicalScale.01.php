<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Musical Scale</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      $musical_scale = array("do", "re", "mi", "fa", "so", "la", "ti");
      $output_string = "The notes of the musical scale are: ";
    
      foreach ($musical_scale as $current_note) {
        $output_string .= " " . $current_note;
      }
    
      echo "<p>$output_string</p>";
    ?>
  </body>
</html>
