<?php
	session_start();
	unset($_SESSION['user_name']);
	unset($_SESSION['username']);
	header('Location: '. $_SERVER['HTTP_REFERER']);
?>
