<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>E-Mail Validator</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
      function validateAddress($address) {
        if (preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.[[A-Za-z]{2,})$/i", $address) == 1) {
          return TRUE;
        }
        else {
          return FALSE;
        }
      }
      
      function sortAddresses($addresses) {
        $sorted_addresses = array();
        $i_limit = count($addresses) - 1; /* Set the upper limit for the outer loop */
        $j_limit = count($addresses); /* Set the upper limit for the inner loop */
        for ($i = 0; $i < $i_limit; $i++) {
            $current_address = $addresses[$i];
            for ($j = $i + 1; $j < $j_limit; $j++) {
                if (strcasecmp($current_address, $addresses[$j]) > 0) {
                    $tempval = $addresses[$j];
                    $addresses[$j] = $current_address;
                    $current_address = $tempval;
                }
            }
            $sorted_addresses[] = $current_address;
        }
        return($sorted_addresses);
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
        
      $sorted_addresses = sortAddresses($email_addresses);
      $sorted_address_list = implode(", ", $sorted_addresses);
      echo "<p>Sorted Addresses: $sorted_address_list</p>\n";
        
      foreach ($sorted_addresses as $address) {
        if (validateAddress($address) == FALSE) {
          echo "<p>The e-mail address <em>$address</em> does not appear to be valid.</p>\n";
        }
      }
    ?>
  </body>
</html>
