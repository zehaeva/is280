<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Scholarship Form</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
        $first_name = stripslashes($_POST['fName']);
        $last_name = stripslashes($_POST['lName']);

        echo "Thank you for filling out the scholarship form,". $first_name. " ". $last_name .".";
    ?>
  </body>
</html>
