<?php 
	require_once "..\\includes\\common.php"; 
	require_once "..\\templates\\header.php";

	if(INSTALLED_DB == true){
		header("Location: ..\\index.php");
	}

	if(!isset($_POST)) header("Location: install.php");

	$servername = $_POST['txtHostname'];
	$username = $_POST['txtUsername'];
	$password = $_POST['txtPassword'];
	$dbname = $_POST['txtDbName'];

	try{
		$error;
		if(empty($_POST['txtHostname'])) $error[] = "The servername is not completed";
		if(empty($_POST['txtUsername'])) $error[] = "The username is not completed";
		if(empty($_POST['txtPassword'])) $error[] = "The password is not completed";
		if(empty($_POST['txtDbName'])) $error[] = "The database name is not completed";
		if(isset($error)){
			foreach ($error as $e) echo "<p>". $e ."</p>";
			echo "<h3>REDIRECT TO THE <a href='install.php'>INSTALLATION PAGE</a></h3>";
			exit;
		}

		else{
			$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

			if(!$connect) throw new PDOException("Error Processing database connection", 1);
			else{
				if(!file_exists("config.php")){
					try{
						$configFile = fopen("config.php", 'w');

						fwrite($configFile, "<?php\n\n");

						$line = "\tdefine('DB_HOST', '". $servername ."'); \n";
						fwrite($configFile, $line);

						$line = "\tdefine('DB_USERNAME', '". $username ."'); \n";
						fwrite($configFile, $line);

						$line = "\tdefine('DB_PASSWORD', '". $password ."'); \n";
						fwrite($configFile, $line);

						$line = "\tdefine('DB_NAME', '". $dbname ."'); \n";
						fwrite($configFile, $line);

						//urlname to write

						fwrite($configFile, "\n?>");
						fclose($configFile);

						header("Location: install.php");
					}
					catch(Exception $e){
						echo "Unable to create the file: ". $e->getMessage();
					}
				}
			}
		}
	} 
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage() . "<br>Try to configure again your personal database with correct values.";
		echo "<h3>REDIRECT TO THE <a href='install.php'>INSTALLATION PAGE</a></h3>";
	} 
?>