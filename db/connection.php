<?php
	require_once "config.php";

	class DB {
		public $conn;
		private $servername = DB_HOST;
		private $username = DB_USERNAME;
		private $password = DB_PASSWORD;
		private $dbname = DB_NAME;

		function __construct(){
			try{
				$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
  				echo "Connection failed: " . $e->getMessage() . "<br>Try to configure again your personal database with correct values.";
			}
		}

		/*function select($items, $table){
			$sql = "SELECT ";

			for($i=1; $i<count($items); $i++) $items[$i] = ", " . $items[$i];
			if(count($items)>1){
				foreach ($items as $item) {
					$sql .= $item;
				}
			}			

			$sql .= " FROM " . $table;

			return $this->conn->query($sql);
		}*/
	}
?>