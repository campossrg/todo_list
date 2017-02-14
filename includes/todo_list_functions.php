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
			require "templates\\newNoteForm.php";

			echo "sdf";

			$title = $_POST['txt_title'];
			$tag = $_POST['txt_tag'];
			$content = $_POST['txt_content'];

			//if(!$_POST['txt_title']) 

			//$sql = "INSERT * FROM table_notes WHERE notesIndex = " . $note; 
		}
	}
?>