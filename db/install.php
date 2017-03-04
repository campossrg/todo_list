<?php 
	require_once "..\\includes\\common.php"; 
	require_once "..\\templates\\header.php"
?>

<div class="install">
<?php
	if( INSTALLED_DB == false ){
?>
	<h1>PERSONAL NOTES - Installation</h1>
	<form method="post" action="setup.php" style="margin-left: 2%">
		<div class="form-group">
			<label>Database server</label>
			<input type="text" class="form-control" name="txtHostname" placeholder="localhost" style="width: 250px" />
		</div>
		
		<div class="form-group">
			<label>Database Name</label>
			<input type="text" class="form-control" name="txtDbName" placeholder="db_todo_list" style="width: 250px" />
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="txtUsername" placeholder="root" style="width: 250px" />
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="txtPassword" placeholder="*****" style="width: 250px" />
		</div>
		
		<div class="form-group">
			<label>
				Site URL [ Eg: http://www.yoursite.com/todo/ ]
			</label>
			<input type="text" class="form-control" name="txtSiteUrl" value="http://" id="site_url" style="width: 350px" />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Install</button>
		</div>
	</form>
<?php
	}
	else echo "<h3>Installation finished. Go back to <a href='..\\index.php'>Main Page</a></h3>";

	require_once "..\\templates\\footer.php"
?>