<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>E-Mail Validator</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      function validateAddress($address) {
        if (strpos($address, '@') !== FALSE && strpos($address, '.') !== FALSE) {
          return TRUE;
        }
        else {
          return FALSE;
        }
      }
      
      $email_addresses = array(
         "john.smith@php.test",
         "mary.smith.mail.php.example",
         "john.jones@php.invalid",
         "alan.smithee@test",
         "jsmith456@example.com",
         "jsmith456@test",
         "mjones@example",
         "mjones@example.net",
         "jane.a.doe@example.org");
         
       foreach ($email_addresses as $address) {
         if (validateAddress($address) == FALSE) {
           echo "<p>The e-mail address <em>$address</em> does not appear to be valid.</p>\n";
         }
       }
    ?>
  </body>
</html>
