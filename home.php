<?php 
	require_once "includes\\common.php";
	require_once "templates\\header.php"; 
?>

<body>
	<div id="dv_main" class="container-fluid">
		<div class="row">
			<div id="dv_title" class="col-md-9 well well-sm">
				<h1 style="font-family: Impact, fantasy;">PERSONAL NOTES</h1> 
			</div>
		</div>
		<div class="row">
			<div id="dv_options_bar" class="col-md-9 well well-sm">
				<form method="POST" id="optionsBarForm" action="index.php">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="txt_search" name="txtSearch" placeholder="Search an item...">
					</div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-default" name="btnSearchNote">
						    <i class="fa fa-search" aria-hidden="true"> SEARCH</i>
						</button>
					</div>
					<div class="col-sm-4">
						<button type="submit" class="btn btn-default" name="btnNewNote">
							<i class="fa fa-plus" aria-hidden="true"> ADD NOTE</i>
						</input>
					</div>
					<select name='tagSelectForm' onchange="document.getElementById('optionsBarForm').submit();"> <!--Select the option without submit-->
				  		<option value=''>Tags...</option> <!--favicon dropdown-->
						<?php showTags(); ?>
					</select>
				</form>
			</div>
		</div>
		<div class="row" id="dv_content">
			<div id="dv_panel_left" class="col-md-2 panel list-group">							<!-- PANEL LEFT -->
			<div class="list-group">
				<form method="POST" action="index.php">
					<?php showHeadNotebooks() ?>
				</form>
			</div>
			</div>
			<div id="dv_panel_right" class="col-md-7 panel list-group">							<!-- PANEL RIGHT UP -->
				<div id="dv_panel_right_upper" class="col-md-7 list-group">
					<form method="POST" action="index.php">
						<?php showHeadNotes(); ?>
					</form>
				</div>
				<div id="dv_panel_right_lower" class="col-md-7 panel panel_default">			<!-- PANEL RIGHT DOWN -->
					<?php 
						if(isset($_POST['btnNewNote'])) require "templates\\newNoteForm.php";					//NEW FORM
						if(isset($_POST['btnEditNote'])) require "templates\\editNoteForm.php";					//EDIT FORM
						if(isset($_POST['btnSearchNote'])) searchNotes();										//SEARCH
						if(isset($_POST['tagSelectForm'])) showSelectedTag();									//TAGS
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

<?php require_once "templates\\footer.php"; ?>
	