<?php
if(isset($_GET['success'])) {
	echo '<script language="javascript">alert("Utilizator Inregistrat cu Succes!!!")</script>';
}
?>
<?php
include_once ("head.php");
?>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/sunny/jquery-ui.css"/>
		<script src="form.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registru Service</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<style type='text/css' media='print'>

	#print_button {display : none}
	#altex_button {display : none}
	#footer {display : none}
	.header {display : none}
	

</style>

</head>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<div class="container-fluid">
	<div class="container-fluid">
			<div id="altexlogo">
				<a href="index.php">
					<img src="assets/images/logo_altex_print.png"; class="img-responsive"; alt="altex logo"; />
				</a>
			</div>	
			<div id="mediagalaxylogo">
				<a href="index.php">
					<img src="assets/images/mediagalaxy.png"; class="img-responsive"; alt="mediagalaxy logo"; />
				</a>
			</div>	
	</div>
	<div class="container" id="loginform">
		<form method="post" id="indexform" name="indexform" enctype="multipart/form-data" action="checklogin.php">
			<div class="container-fluid">
				<h3>Autentificare Utilizator:</h3>
					<div class="form-group">
						<label for="username">Nume Utilizator:</label>
							<input type="text" class="form-control focusedInput" id="username" name="username" placeholder="Nume Utilizator">
					</div>
					<div class="form-group">
						<label for="password">Parola:</label>
							<input type="password" size="6" class="form-control focusedInput" id="password" name="password" placeholder="Parola">
					</div>
					<div class="container-fluid" id="login">
						<input type="submit" value="Autentifica" id="login" name="login" />
					</div>
					<div class="container-fluid">
						<a href="register.php" id="inregistrareuser" class="btn btn-default">Inregistrare Utilizator</a>
					</div>
		</form>
	</div>
</div>	
</body>
<footer>
	<div id="footer">
	<p>Copyright 2015. All rights reserved</p>
	</div>
 </footer>
</html>