<?php
	/*CONSTANT VARIABLES*/

	session_start();
	define('LOGGED_IN', true);

	/*FUNCTIONS*/

	function allNotesIndex(){
		global $conn;

		$sql = "SELECT notesIndex FROM table_notes ORDER BY notesIndex"; 
		foreach ($conn->query($sql) as $row) {
			$notes_list[] = $row['notesIndex'];
		}
		return $notes_list;
	}

	function showHeadNotes(){
		global $conn;

		$sql = "SELECT notesIndex, notesTitle FROM table_notes ORDER BY notesIndex";
		foreach ($conn->query($sql) as $row) {
			echo "<button type='submit' class='list-group-item' name='btn". $row['notesIndex'] ."'>". strtoupper($row['notesTitle']) ."</button>";
		}
	}

	function showNotes(){
		global $conn;
		$notes_list = allNotesIndex();	

		foreach($notes_list as $note){
			if(isset($_POST['btn' . $note])){
				$_SESSION["last_selected_id"] = $note;
				$sql = "SELECT * FROM table_notes WHERE notesIndex = " . $note; 
				foreach ($conn->query($sql) as $row) {
					echo "<form class='form-horizontal' method='POST' action='index.php'>
						  	<div class='form-group'>
						  		<div class='row-md'>
									<h2 class='txt_title' col-sm-4>". $row['notesTitle'] . "
									<small>  ". $row['notesTag'] ."</small>
									<small>  ". $row['notesNotebook'] ."</small></h2>
						  		</div>
						  		<div class='row-md'>
									<input type='submit' class='btn-warning btn-xs' name='btnEditNote' value='Edit'>
									<input type='submit' class='btn-danger btn-xs' name='btnDeleteNote' value='Delete'>
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

		$sql = $conn->prepare("INSERT INTO table_notes (notesTitle, notesTag, notesContent, notesNotebook) 
						   VALUES (:n1, :n2, :n3, :n4)");

		$title = $_POST['txt_title'];
		$tag = $_POST['txt_tag'];
		$content = $_POST['txt_content'];
		$notebook = $_POST['txt_notebook'];

		try{
			if(!$_POST['txt_title']) $error[] = "The title is not completed!";
			if(!$_POST['txt_tag']) $error[] = "The tag is not completed!";
			if(!$_POST['txt_content']) $error[] = "The content is not completed!";
			if(!$_POST['txt_notebook']) $error[] = "The notebook is not chosen!";
			if(isset($error)){
				require "templates\\newNoteForm.php";
				foreach ($error as $e) echo "<p>" . $e . "</p>";
			}

			else{
				$sql->execute(array(
					"n1" => $title,
					"n2" => $tag,
					"n3" => $content,
					"n4" => $notebook
				));

				echo "Data submitted!!";
				header("refresh:1;url=index.php");
			}
		}
		catch(PDOException $e){
			echo "Insert failed: " . $e->getMessage();
		}
		
	}

	function editNotes(){
		global $conn;

		$title = $_POST['txt_title'];
		$tag = $_POST['txt_tag'];
		$content = $_POST['txt_content'];
		$notebook = $_POST['txt_notebook'];

		$sql = "UPDATE table_notes SET notesTitle = '". $title ."', notesTag = '". $tag ."', notesContent = '". $content ."', notesNotebook = '". $notebook ."'
			WHERE notesIndex = " . $_SESSION['last_selected_id'];

		try{
			if(!$_POST['txt_title']) $error[] = "The title is not completed!";
			if(!$_POST['txt_tag']) $error[] = "The tag is not completed!";
			if(!$_POST['txt_content']) $error[] = "The content is not completed!";
			if(!$_POST['txt_notebook']) $error[] = "The notebook is not chosen!";
			if(isset($error)){
				require "templates\\editNoteForm.php";
				foreach ($error as $e) echo "<p>" . $e . "</p>";
			}

			else{
				$conn->query($sql);

				echo "Data submitted!!";
				header("refresh:2;url=index.php");
			}
		}
		catch(PDOException $e){
			echo "Edit failed: " . $e->getMessage();
		}
		
	}

	function deleteNotes(){
		global $conn;
		$notes_list = allNotesIndex();	
		$sql = "";	

		$sql = "DELETE FROM table_notes WHERE notesIndex = " . $_SESSION["last_selected_id"];

		try{
			$conn->query($sql);

			echo "Data deleted!!";
			header("refresh:2;url=index.php");
		}

		catch(PDOException $e){
			echo "Delete failed: " . $e->getMessage();
			header("refresh:1;url=index.php");
		}
	}

	function searchNotes(){
		global $conn;

		if($_POST['txtSearch']){ 	//CONTROL THAT IS SET
			$sql = "SELECT * FROM table_notes WHERE notesTitle LIKE '%" . $_POST['txtSearch'] . "%'"; 

			try {
				foreach ($conn->query($sql) as $row) {
					echo "<form class='form-horizontal' method='POST' action='index.php'>
						  	<div class='form-group'>
						  		<div class='row-md'>
									<h2 class='txt_title' col-sm-4>". $row['notesTitle'] . "
									<small>  ". $row['notesTag'] ."</small>
									<small>  ". $row['notesNotebook'] ."</small></h2>
						  		</div>
						  		<div class='row-md'>
									<input type='submit' class='btn-warning btn-xs' name='btnEditNote' value='Edit'>
									<input type='submit' class='btn-danger btn-xs' name='btnDeleteNote' value='Delete'>
						  		</div><br>
						  	</div>
						  	<span><i>". $row['notesContent'] ."</i></span><br>
						  </form>";
				}	
			} 

			catch(PDOException $e) {
				echo "Search failed: " . $e->getMessage();
			}
		}
	}
	function showTags(){ 
		global $conn;

		$sql = "SELECT notesTag FROM table_notes";

		try {
			$tagList = array();
			foreach ($conn->query($sql) as $row){ 		//ADD NON-REPEATED ELEMENTS
				if (empty($tagList)){
					$tagList[] = $row['notesTag']; 
					echo "<option value='". $row['notesTag'] ."'>". $row['notesTag'] ."</option>";
				} 
				else{
					$found = false;
					foreach ($tagList as $tag) {		//SEARCH REPEATED ELEMENTS
						if($tag === $row['notesTag']) $found = true;
					}
					if(!$found){
						$tagList[] = $row['notesTag'];
						echo "<option value='". $row['notesTag'] ."'>". $row['notesTag'] ."</option>";
					}
				}				
			} 
		} 

		catch (PDOException $e) {			
				echo "Tags error: " . $e->getMessage();
		}
	}

	function showSelectedTag(){
		global $conn;

		$sql = "SELECT notesTag FROM table_notes";

		try {
			$tagList = array();
			foreach($conn->query($sql) as $row){		//ADD NON-REPEATED ELEMENTS
				if(empty($tagList))	$tagList[] = $row['notesTag']; 	
				else{
					$found = false;
					foreach($tagList as $tag){			//SEARCH REPEATED ELEMENTS
						if($tag === $row['notesTag']) $found = true;	
					}									
					if(!$found) $tagList[] = $row['notesTag']; 
				}
			}

			foreach($tagList as $tag) {
				if($_POST['tagSelectForm'] === $tag){
					$sql = "SELECT * FROM table_notes WHERE notesTag = '" . $tag . "' ORDER BY notesIndex";
					foreach ($conn->query($sql) as $row) {
						echo "<form class='form-horizontal' method='POST' action='index.php'>
						  	<div class='form-group'>
						  		<div class='row-md'>
									<h2 class='txt_title' col-sm-4>". $row['notesTitle'] . "<small>  ". $row['notesTag'] ."</small></h2>
						  		</div>
						  		<div class='row-md'>
									<input type='submit' class='btn-warning btn-xs' name='btnEditNote' value='Edit'>
									<input type='submit' class='btn-danger btn-xs' name='btnDeleteNote' value='Delete'>
						  		</div><br>
						  	</div>
						  	<span><i>". $row['notesContent'] ."</i></span><br>
						  </form>";
					}				
				}
			}
		} 

		catch (PDOException $e) {			
				echo "Tags error: " . $e->getMessage();
		}
	}

	function showNotebooks(){
		global $conn;

		$sql = "SELECT notebooksTitle FROM table_notebooks";


		try{
			foreach ($conn->query($sql) as $row) {
				echo "<option value='". $row['notebooksTitle'] ."'>". $row['notebooksTitle'] ."</option>";
			}
		}

		catch (PDOException $e) {			
				echo "Notebooks error: " . $e->getMessage();
		}
	}
?>