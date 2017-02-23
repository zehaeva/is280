<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Books and Authors</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      $books = array("The Adventures of Huckleberry Finn",
                     "Nineteen Eighty-Four",
                     "Alice's Adventures in Wonderland",
                     "The Cat in the Hat");
                     
       $authors = array("Mark Twain", "George Orwell", "Lewis Carroll", "Dr. Seuss");
       
       $real_names = array("Samuel Clemens", "Eric Blair", "Charles Dodson", "Theodor Geisel");
 
       for ($i = 0; $i < count($books); ++$i) { 
         echo "<p>The real name of {$authors[$i]}, ".
              "the author of \"{$books[$i]}\", ".
              "is {$real_names[$i]}.</p>";
       }
    ?>
  </body>
</html>
