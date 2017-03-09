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
      
      function sortAddresses($addresses) {
        $sortedaddresses = array();
        $ilimit = count($addresses) - 1; /* Set the upper limit for the outer loop */
        $jlimit = count($addresses); /* Set the upper limit for the inner loop */
        for ($i = 0; $i < $ilimit; $i++) {
            $currentaddress = $addresses[$i];
            for ($j = $i + 1; $j < $jlimit; $j++) {
                if ($currentaddress > $addresses[$j]) {
                    $tempval = $addresses[$j];
                    $addresses[$j] = $currentaddress;
                    $currentaddress = $tempval;
                }
            }
            $sortedaddresses[] = $currentaddress;
        }
        return($sortedaddresses);
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
