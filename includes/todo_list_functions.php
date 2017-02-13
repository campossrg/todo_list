<?php

	function showHeadNotes(){
		$sql = "SELECT * FROM table_notes ORDER BY notesIndex";
		foreach ($conn->query($sql) as $row) {
			echo "<h3 class='txt_title'><a href='#' class='list-group-item' id='". $row['notesIndex'] ."'>". strtoupper($row['notesTitle']) . "</a></h3><br>";
		}
	}

	function showNotes(){
		$sql = "SELECT * FROM table_notes WHERE notesIndex = "; //PENDIENTE
		foreach ($conn->query($sql) as $row) {
			echo "<h2 class='txt_title'>". $row['notesTitle'] . "<small>  ". $row['notesTag'] ."</small></h2><br>";
			echo "<span><i>". $row['notesContent'] ."</i></span><br>";
		}
	}
?>