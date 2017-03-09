<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Presidential Terms</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php
    $Presidents = array(
        "George Washington",
        "John Adams",
        "Thomas Jefferson",
        "James Madison",
        "James Monroe");
        
    $YearsInOffice = array(
        "1789 to 1797",
        "1797 to 1801",
        "1801 to 1809",
        "1809 to 1817",
        "1817 to 1825");
        
    $OutputTemplate = "<p>President [NAME] served from [TERM]</p>\n";
    
    foreach ($Presidents as $Sequence => $Name) {
        $TempString = str_replace("[NAME]", $Name, $OutputTemplate);
        $OutputString = str_replace("[TERM]", $YearsInOffice[$Sequence], $TempString);
        echo $OutputString;
    }
    
    ?>
  </body>
</html>
