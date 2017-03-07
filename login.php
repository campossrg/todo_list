<?php
	require_once "includes\\common.php";

	if(LOGGED_IN == true) header("Location: index.php");

	if(isset($_POST['btnLoginSubmit'])){
		$user = $_POST['txtLoginName'];
		$pass = $_POST['txtLoginPass'];

		$error;
		if(empty($user)) $error[] = "User is empty!!";
		if(empty($pass)) $error[] = "Password is empty!!";
		if(isset($error)){
			foreach ($error as $e) {
				echo "<p>". $e ."</p>";
			}
			echo "Login couldn´t be completed.<br>Please try to login again: <a href='index.php'>LOGIN</a>";
			exit();
		}

		else{
			$query = "SELECT * from table_login WHERE loginUserName = '". $user ."'";
			$hash = md5(MD5_SALT.$pass);

			echo "<br>". MD5_SALT ."<br>";
			echo "<br>". $hash ."<br>";

			try{
				$sql = $db->conn->query($query);

				if(!$sql){
					throw new PDOException("Error Processing the query", 1);
				}
				else{
					$_SESSION['login_failed'] = true;		//We assume that login failed

					foreach ($sql as $row) {
						echo $row['loginPassword'];
						if($row['loginPassword'] === $hash){
							$_SESSION['user_id'] = $user;
							$_SESSION['login_failed'] = false;
						}
					}
					// header("Location: index.php");
				}
			}
			catch(PDOException $e){
				echo "Login couldn´t be completed due to: ". $e;
			}
		}
	}
?>