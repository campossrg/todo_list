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
					echo "<form class='form-horizontal' method='POST' action='todo_list_index.php'>
						  	<div class='form-group'>
						  		<div class='row-md'>
									<h2 class='txt_title' col-sm-4>". $row['notesTitle'] . "<small>  ". $row['notesTag'] ."</small></h2>
						  		</div>
						  		<div class='row-md'>
									<input type='submit' class='btn-warning btn-xs' name='btn_edit_note_submit' value='Edit'>
									<input type='submit' class='btn-danger btn-xs' name='btn_delete_note_submit' value='Delete'>
						  		</div><br>
						  	</div>
						  	<span><i>". $row['notesContent'] ."</i></span><br>
						  </form>";
				}
			}
		}		
	}

	function newNotes(){
		global $conn;

		$sql = $conn->prepare("INSERT INTO table_notes (notesTitle, notesTag, notesContent) 
						   VALUES (:n1, :n2, :n3)");

		$title = $_POST['txt_title'];
		$tag = $_POST['txt_tag'];
		$content = $_POST['txt_content'];

		try{
			if(!$_POST['txt_title']) $error[] = "The title is not completed!";
			if(!$_POST['txt_tag']) $error[] = "The tag is not completed!";
			if(!$_POST['txt_content']) $error[] = "The content is not completed!";
			if(isset($error)){
				require "templates\\newNoteForm.php";
				foreach ($error as $e) echo "<p>" . $e . "</p>";
			}

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
		
	}

	function editNotes(){
		/*global $conn;

		$sql = $conn->prepare("INSERT INTO table_notes (notesTitle, notesTag, notesContent) 
						   VALUES (:n1, :n2, :n3)");

		$title = $_POST['txt_title'];
		$tag = $_POST['txt_tag'];
		$content = $_POST['txt_content'];

		try{
			if(!$_POST['txt_title']) $error[] = "The title is not completed!";
			if(!$_POST['txt_tag']) $error[] = "The tag is not completed!";
			if(!$_POST['txt_content']) $error[] = "The content is not completed!";
			if(isset($error)){
				require "templates\\newNoteForm.php";
				foreach ($error as $e) echo "<p>" . $e . "</p>";
			}

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
			echo "Edit failed: " . $e->getMessage();
		}*/
		
	}

	function deleteNotes(){
		/*global $conn;

		$sql = $conn->prepare("DELETE FROM table_notes WHERE notesIndex = :n1");

		//$id = last selected value

		try{
			$sql->execute("n1" => $id);

			echo "Data deleted!!";
		}
		catch(PDOException $e){
			echo "Delete failed: " . $e->getMessage();
		}*/
	}
?>