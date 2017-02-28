<form class="form-horizontal" role="form" method="POST" action="index.php">
	<div class="form-group">
		<div class="col-sm-9">
			<input type="text" class="form-control" id="txt_title" name="txt_title" placeholder="Title" value="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-9">
			<input type="text" class="form-control" id="txt_tag" name="txt_tag" placeholder="Tag" value="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="txt_content" placeholder="Insert the content..."></textarea>
		</div>
	</div>
	<div class="form-group">
		<select name='txt_notebook'>
			<option value=''>Notebooks..</option>
				<?php showNotebooksDrop(); ?>
		</select>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type="submit" name="btn_new_note_submit" id="btnNewNoteSubmit" value="Submit" class="btn btn-primary">
		</div>
	</div>
</form>