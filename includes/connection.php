<?php
	class DB {
		public $conn;
		private $servername = "localhost";
		private $username = "root";
		private $password = "admin";
		private $dbname = "db_todo_list";

		function __construct(){
			try{
				$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password) or die('problem');
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
  				echo "Connection failed: " . $e->getMessage();
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