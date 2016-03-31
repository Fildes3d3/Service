<?php
include_once ("db.php");
if (isset ($_POST ['register']))
{
	foreach ($_POST as $key => $value) {
		$_POST [$key] = addslashes (strip_tags(trim ($value)));}
	$encrypted_password=md5($_POST['password']);
	$sql= mysqli_query ($conn, "INSERT INTO utilizatori 
						(username, password, store, codvanzator )
					VALUES ('{$_POST['username']}',
							'{$encrypted_password}',
							'{$_POST ['store']}',
							'{$_POST ['codvanzator']}'
							)");
	if ($sql) {
		header ('location:index.php?success');
	}
	else {
		echo "Eroare Inregistrare";
	}
}
?>
<?php
include_once ("head.php");
?>
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
<div class="container" id="registerform">
	<form method="post" id="registerform" name="registerform" enctype="multipart/form-data" action="">
	<div class="container-fluid">
		<h3>Inregistrare Utilizator:</h3>
		<div class="form-group">
				<label for="username">Nume Utilizator:</label>
					<input type="text" class="form-control focusedInput" id="username" name="username" placeholder="Nume Utilizator" required>
		</div>
		<div class="form-group">
				<label for="password">Parola:</label>
					<input type="password" size="6" class="form-control focusedInput" id="password" name="password" placeholder="Parola" required>
		</div>
		<div class="form-group">
				<label for="store" >Magazin:</label>
					<input type="text" class="form-control focusedInput" id="store" name="store" placeholder="Magazin" required>
		</div>
		<div class="form-group">
				<label for="codvanzator">Cod Vanzator:</label>
					<input type="text" class="form-control focusedInput" id="codvanzator" name="codvanzator" placeholder="Cod Vanzator" pattern="[0-9]{7}" required>
		</div>
	</div>
	<div class="container-fluid">
		<input type="submit" value="Inregistreaza Utilizator" id="register" name="register" />
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