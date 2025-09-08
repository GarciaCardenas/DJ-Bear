<?php
	session_start();
	$_SESSION["user"] = $_POST["user"];
	$_SESSION["password"] = $_POST["password"];
	
	header("Location: admin_menu.php");
	exit;

?>




