<?php
	require_once "includes\\common.php";

	if(LOGGED_IN == true) header("Location: home.php");

	if(INSTALLED_DB == false) header("Location: db\\install.php");

	require_once "templates\\header.php";

	require_once "templates\\loginForm.php";

	require_once "templates\\footer.php"; 
?>
