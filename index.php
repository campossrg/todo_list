<?php
	require_once "includes\\common.php";

	if(LOGGED_IN == true) header("Location: home.php");

	if(INSTALLED_DB == false) header("location: install.php");

	require_once "templates\\header.php";
?>

LOGIN SECTION

<!-- LOGIN -->

<?php require_once "templates\\footer.php"; ?>
