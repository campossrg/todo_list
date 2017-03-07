<?php
	require_once "includes\\common.php";

	if(isset($_POST['btnRegisterSubmit'])){
		$user = $_POST['txtRegisterName'];
		$pass = $_POST['txtRegisterPassword'];
		$conPass = $_POST['txtconfirmRegisterPassword'];
		$email = $_POST['txtRegisterEmail'];


		$error;
		if(empty($user)) $error[] = "User is empty!!";
		if(empty($pass)) $error[] = "Password is empty!!";
		if(empty($conPass)) $error[] = "Confirmation of password is empty!!";
		if(empty($email)) $error[] = "Email is empty!!";
		if(isset($error)){
			foreach ($error as $e) {
				echo "<p>". $e ."</p>";
			}
			echo "Register couldn´t be completed.<br>Please try to register again: <a href='index.php'>LOGIN</a>";
			exit();
		}

		else{
			if($pass !== $conPass){
				echo "Please check out the password. They don´t match.<br>Please try to register again: <a href='index.php'>LOGIN</a>"; 
				exit();
			}

			$hash = md5(MD5_SALT.$pass);
			$query = "INSERT INTO table_login (loginUserName, loginPassword, loginEmail) VALUES ('". $user ."', '". $hash ."', '". $email ."')";

			try{
				$sql = $db->conn->query($query);

				if(!$sql){
					throw new PDOException("Error Processing the query", 1);
				}
				else{
					echo "Registration was succesfull.<br>Please try tologin now: <a href='index.php'>LOGIN</a>";
					exit();
				}
			}
			catch(PDOException $e){
				echo "REgister couldn´t be completed due to: ". $e;
			}
		}
	} 
?>