<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Password Fields</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
    $record = "jdoe:8W4dS03a39Yk2:1463:24:JohnDoe:/home/jdoe:/bin/bash";

    $passwordfields = array(
        "login name",
        "optional encrypted password",
        "numerical user ID",
        "numerical group ID",
        "user name or comment field",
        "user home directory",
        "optional user command interpreter");
    
    $fieldindex = 0;
    $extrafields = 0;
    $fields = explode(":",$record);

    foreach ($fields as $fieldindex => $fieldvalue) {

        if ($fieldindex < count($passwordfields)) {
            echo "<p>The {$passwordfields[$fieldindex]} is <em>$fieldvalue</em></p>\n";
        }
        else {
            ++$extrafields;
            echo "<p>Extra field # $extrafields is <em>$fieldvalue</em></p>\n";
        }
    }
    
    ?>
  </body>
</html>
