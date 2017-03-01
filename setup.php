<?php 
	require_once "includes\\common.php"; 

	if(INSTALLED_DB == true) header("Location: index.php");

	if(!isset($_POST)) header("Location: install.php");

	//start configuring the database connection (connection.php)
?>