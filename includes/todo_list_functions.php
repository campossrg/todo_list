<?php
	function showHeadNotes(){

		global $conn;

		$sql = "SELECT * FROM table_notes ORDER BY notesIndex";
		foreach ($conn->query($sql) as $row) {
			echo "<h3 class='txt_title'>
			<input type='submit' class='list-group-item' name='btn". $row['notesIndex'] ."' value=". strtoupper($row['notesTitle']) ."></input>
			</h3><br>";
		}
	}

	function showNotes(){
		global $conn;
		$notes_list = [];

		$sql = "SELECT notesIndex FROM table_notes ORDER BY notesIndex"; 
		foreach ($conn->query($sql) as $row) {
			$notes_list[] = $row['notesIndex'];
		}

		foreach($notes_list as $note){
			if(isset($_POST['btn' . $note])){
				$sql = "SELECT * FROM table_notes WHERE notesIndex = " . $note; 
				foreach ($conn->query($sql) as $row) {
					echo "<h2 class='txt_title'>". $row['notesTitle'] . "<small>  ". $row['notesTag'] ."</small></h2><br>";
					echo "<span><i>". $row['notesContent'] ."</i></span><br>";
				}
			}
		}		
	}

	function newNotes(){
		require "templates\\newNoteForm.php";

		if(isset($_POST['btnNewNoteSubmit'])){
			$sql = $conn->prepare("INSERT INTO db_todo_list (notesTitle, notesTag, notesContent) 
							   VALUES (:n1, :n2, :n3)");

			$title = $_POST['txt_title'];
			$tag = $_POST['txt_tag'];
			$content = $_POST['txt_content'];

			try{
				if(!$_POST['txt_title']) $error[] = "The title is not completed!";
				if(!$_POST['txt_tag']) $error[] = "The tag is not completed!";
				if(!$_POST['txt_content']) $error[] = "The content is not completed!";
				if(isset($error)) foreach ($error as $e) echo "<p>" . $e . "</p>";

				else{
					$sql->execute(array(
						"n1" => $title,
						"n2" => $tag,
						"n3" => $content
					));

					echo "Data submitted!!";
				}
			}
			catch(PDOException $e){
				echo "Insert failed: " . $e->getMessage();
			}   

			//$sql = "INSERT * FROM table_notes WHERE notesIndex = " . $note; 
		}
	}
?>