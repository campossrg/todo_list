<?php
	require_once "includes\\common.php";

	if(LOGGED_IN == true) header("Location: index.php");

	require_once "templates\\header.php";
?>

<!-- LOGIN -->

<?php require_once "templates\\footer.php"; ?>
