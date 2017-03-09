<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Web Template</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-885901" />
  </head>
  <body>
    <?php include ("inc_header.01.html"); ?>
    <div style = "width:20%; text-align:center; float:left">
    
    <?php include ("inc_buttonnav.01.html"); ?>
    </div>
    
    <!-- Start of Dynamic Content section -->
    <?php
      if (isset($_GET['content'])) {
        switch ($_GET['content']) {
          case 'About Me':
            include('inc_about.01.html');
            break;

          case 'Contact Me':
            include('inc_contact.01.html');
            break;
          case 'Home': // A value of 'Home' means to

          // display the default page
          default:
            include('inc_home.01.html');
            break;
        }
      }
      else { // No button has been selected
        include('inc_home.01.html');
      }
    ?>

    <!-- End of Dynamic Content section -->
    <?php include ("inc_footer.01.php"); ?>
  </body>
</html>
