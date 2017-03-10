<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>View Files</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php 
      $dir = "files";
      $direntries = scandir($dir);

      foreach ($direntries as $entry) {
        if ((strcmp($entry, '.') != 0) && (strcmp($entry, '..') != 0)) {
          echo "<a href=\"files/" . $entry . "\">" . $entry ."</a><br />\n";
        }
      } 
    ?>
  </body>
</html>
