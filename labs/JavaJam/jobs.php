<?php
	include_once('functions.php');

	print('<!DOCTYPE html><html lang="en">'. get_head('JavaJam Coffe House Jobs') .'<body>');

	include("header.php");
	
	print('<div id="content"><p> Want to work at JavaJam? Fill out the form below to start your application.</p>
			<form method="post" action="http://webdevbasics.net/scripts/javajam.php">
				<label for="myName">Name: </label>
				<input type="text" name="myName" id="myName">
				<label for="myEmail">E-mail: </label>
				<input type="text" name="myEmail" id="myEmail">
				<label for="myExperience">Experience: </label>
				<textarea name="myExperience" id="myExperience" rows=2 cols=20></textarea>
				<input type="submit" value="Apply Now"></div>');
	
	include("footer.php");
	print("</body></html>");
?>