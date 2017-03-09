<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Scholarship Form</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
        function redisplayForm($first_name, $last_name) {
    ?>
        <h2 style = "text-align:center">Scholarship Form</h2>

        <form name="scholarship" action="process_Scholarship.04.php" method="post">
        <p>First Name: <input type="text" name="fName"value="<?php echo $first_name; ?>" /></p>
        <p>Last Name: <input type="text" name="lName" value="<?php echo $last_name; ?>" /></p>
        <p><input type="reset" value="Clear Form" />&nbsp;&nbsp;<input type="submit" name="Submit" value="Send Form" />

        </form>
    <?php
        }
        
        function displayRequired($field_name) {
            echo "The field \"$field_name\" is required.<br />n";
        }
        
        function validateInput($data, $field_name) {
            global $error_count;

            if (empty($data)) {
                displayRequired($field_name);
                $error_count++;
                $retval = "";
            } 
            else { // Only clean up the input if it isn't empty
                $retval = trim($data);
                $retval = stripslashes($retval);
            }
            return($retval);
        }
        
        $error_count = 0;
        
        $first_name = validateInput($_POST['fName'], "First Name");
        $last_name = validateInput($_POST['lName'], "Last Name");

        if ($error_count > 0) {
            echo "Please re-enter the information below.<br />\n"; redisplayForm($first_name, $last_name);
        }
        else {
            echo "Thank you for filling out the scholarship form,". $first_name. " ". $last_name .".";
        }
    ?>
  </body>
</html>
