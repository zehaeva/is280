<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Title Information</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      $books = array("The Adventures of Huckleberry Finn",
                     "Nineteen Eighty-Four",
                     "Alice's Adventures in Wonderland",
                     "The Cat in the Hat");
 
      for ($i = 0; $i < count($books); ++$i) { 
        echo "<p>The title \"{$Books[$i]}\" contains " .
             strlen($Books[$i]) . " characters and " .
             str_word_count($Books[$i]) . " words.</p>";
      }
    ?>
  </body>
</html>
