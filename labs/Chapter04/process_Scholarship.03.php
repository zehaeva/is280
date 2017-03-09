<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Scholarship Form</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
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
            echo "Please use the \"Back\" button to re-enter the data.<br />\n";
        }
        else {
            echo "Thank you for filling out the scholarship form,". $first_name. " ". $last_name .".";
        }
    ?>
  </body>
</html>
