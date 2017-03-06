<link rel="stylesheet" type="text/css" href="includes\\style_login.css">

	<div class="modal-dialog">
		<div class="loginmodal-container">
			<h1>Login to Personal Notes</h1>
			<form method="POST" action="login.php">
				<div class="form-group">
					<input type="text" class="form-control" name="txtLoginName" placeholder="sergio" />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="txtLoginPass" placeholder="*****" />
				</div>
				<div class="form-group">
					<input type="submit" name="btnLoginSubmit" class="login loginmodal-submit" value="Login">
				</div>
			</form>
			<div class="login-help">
				<a href="templates\\registerForm.php">Register</a> - <a href="#">Forgot Password</a>
			</div>
		</div>
	</div>