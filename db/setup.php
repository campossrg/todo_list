<?php 
	require_once "..\\includes\\common.php"; 

	if(INSTALLED_DB == true){
		echo "works";
		header("Location: ..\\index.php");
	}

	if(!isset($_POST)) header("Location: install.php");

	$servername = $_POST['txtHostname'];
	$username = $_POST['txtUsername'];
	$password = $_POST['txtPassword'];
	$dbname = $_POST['txtDbName'];

	try{
		if(empty($_POST['txtHostname'])) $error[] = "The servername is not completed";
		if(empty($_POST['txtUsername'])) $error[] = "The username is not completed";
		if(empty($_POST['txtPassword'])) $error[] = "The password is not completed";
		if(empty($_POST['txtDbName'])) $error[] = "The database name is not completed";
		if(isset($error)){
			foreach ($$error as $e) echo "<p>". $e ."</p>";
			header("refresh:10; url:install.php");
		}

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
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage() . "<br>Try to configure again your personal database with correct values.";
		header("refresh:3; Location: ". DIR_ROOT ."db\\install.php");
	} 
	
	

	//start configuring the database connection (connection.php)
?>