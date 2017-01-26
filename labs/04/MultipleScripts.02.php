<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict-dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHP Environment Info</title>
<meta http-equiv="content-type" content="text/html; charset=iso-885901" />
</head>
<body>
<h1>PHP Environment Info</h1>
<p>This page was rendered with PHP version <?php 
/*
PHP code for Chapter 1.
The purpose of this code is to demonstrate how toadd multiple PHP code blocks to a Web page.
*/
// Howard Canaway
# 2017-01-26
echo phpversion(); ?>.</p>
<p>This PHP code was rendered with Zend Engine version <?php echo zend_version(); ?>.</p>
<p>PHP's default MIME type is <?php echo ini_get("default_mimetype"); ?>.</p>
<p>The maximum allowed execution time of PHP script is <?php echo ini_get("max_execution_time"); ?> seconds.</p>
</body>
</html>