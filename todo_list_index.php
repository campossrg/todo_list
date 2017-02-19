<!DOCTYPE html>
<!-- ************** BOOTSTRAP ************** -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- **************************************** -->
<html>
<head>
	<title>TODO LIST</title>
	<!-- FAVICON -->
	<link rel="icon" type="image/gif" href="includes\\favicon.jpg" />
	<!-- STYLE -->
	<link rel="stylesheet" type="text/css" href="includes\\style.css">
	<!-- Database connection -->
	<?php 
		include "includes\\connection.php";
		require_once "includes\\todo_list_functions.php";
	?>
</head>
<body>
	<div id="dv_main" class="container-fluid">
		<div class="row">
			<div id="dv_title" class="col-md-9 well well-sm">
				<h1 style="font-family: Impact, fantasy;">PERSONAL NOTES</h1> 
			</div>
		</div>
		<div class="row">
			<div id="dv_options_bar" class="col-md-9 well well-sm">
				<form method="POST" action="todo_list_index.php">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="txt_search" name="txtSearch" placeholder="Search an item...">
					</div>
					<div class="col-sm-1">
						<input type="submit" class="btn btn-default" name="btnSearchNote" value="SEARCH"></input>
					</div>
					<div class="col-sm-4">
						<input type="submit" class="btn btn-default" name="btnNewNote" value="NEW NOTE"></input>
					</div>
					Tag
					<select name='tagSelectForm'>
				  		<option value=''>Select..</option>
						<?php showTags(); ?>
					</select>
				</form>
			</div>
		</div>
		<div class="row" id="dv_content">
			<div id="dv_panel_left" class="col-md-2 panel list-group">
				<form method="POST" action="todo_list_index.php">
				<?php showHeadNotes();?>
				</form>
			</div>
			<div id="dv_panel_right" class="col-md-7 panel panel_default">
				<?php 
					if(isset($_POST['btnNewNote'])) require "templates\\newNoteForm.php";					//NEW FORM
					if(isset($_POST['btnEditNote'])) require "templates\\editNoteForm.php";					//EDIT FORM
					if(isset($_POST['btnSearchNote'])) searchNotes();										//SEARCH
					if(isset($_POST['btnDeleteNote'])) require "templates\\confirmEraseForm.php";			//DELETE FORM
					else showNotes();																		//SHOW 
					if(isset($_POST['btn_new_note_submit'])) newNotes();									//SUBMIT NEW
					if(isset($_POST['btn_edit_note_submit'])) editNotes();									//EDIT 
					if(isset($_POST['btn_confirm_yes'])) deleteNotes();										//DELETE
					if(isset($_POST['btn_confirm_no'])) echo "Data erase canceled.";
				?>
			</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<small><a href="https://github.com/campossrg"> Github @ campos.srg</a></small>
</footer>
</html>