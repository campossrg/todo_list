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
				<button type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-ok-circle"></span> NEW NOTE
				</button>
			</div>
		</div>
		<div class="row" id="dv_content">
			<div id="dv_panel_left" class="col-md-2 panel panel_default">
				LEFT	
			</div>
			<div id="dv_panel_right" class="col-md-7 panel panel_default">
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
				right<br>		
					
				</div>
				<div id="dv_body">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>