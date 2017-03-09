<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>View Files</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php 
      $dir = "files";
      $diropen = opendir($dir);

      while ($curfile = readdir($diropen)) {
        if ((strcmp($curfile, '.') != 0) && (strcmp($curfile, '..') != 0)) {
          echo "<a href=\"files/" . $curfile . "\">" . $curfile . "</a><br />\n";
        }
      }

      closedir($diropen); 
    ?>
  </body>
</html>
