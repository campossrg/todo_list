<?php
	//SHOW CURRENT INFORMATION TO EDIT
	global $conn;
	if(!isset($_SESSION)) session_start();

	$sql = "SELECT * FROM table_notes WHERE notesIndex = " . $_SESSION["last_selected_id"]; 

	foreach ($conn->query($sql) as $row){
		$txt_title = $row['notesTitle'];
		$txt_tag = $row['notesTag'];
		$txt_content = $row['notesContent'];
	}
?>

<form class="form-horizontal" role="form" method="POST" action="index.php">
	<div class="form-group">
		<label class="col-sm-2 control-label"><h4><b>TITLE</b></h4></label>
		<div class="col-sm-9">
			<input type="text" class="form-control" id="txt_title" name="txt_title" value="<?php echo $txt_title; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><h4><b>TAG</b></h4></label>
		<div class="col-sm-9">
			<input type="text" class="form-control" id="txt_tag" name="txt_tag" value="<?php echo $txt_tag; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"><h4><b>CONTENT</b></h4></label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="txt_content"><?php echo $txt_content; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type="submit" name="btn_edit_note_submit" id="btnEditNoteSubmit" value="Submit" class="btn btn-primary">
		</div>
	</div>
</form>