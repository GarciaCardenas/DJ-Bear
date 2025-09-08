<?php
	session_start();
	$_SESSION["user"] = $_POST["user"];
	$_SESSION["password"] = $_POST["password"];
	echo $_SESSION["user"];
	
	header("Location: ../admin_menu.html");
	exit;

?>