<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
include_once ("db.php");
$case_id = $_GET ['idu'];


if (isset ($_POST ['save']))
	{
	
	if(($_FILES['file']['type'] == 'image/jpeg')
	|| ($_FILES['file']['type'] == 'image/png')
	|| ($_FILES['file']['type'] == 'image/jpg')
	|| ($_FILES['file']['type'] == 'application/pdf')
	&& ($_FILES ['file']['size'] < 4194304))
	{
		if($_FILES ['file']['error'] > 0)
		{
			echo "return code". $_FILES ['file']['error'];
		}
		else if (file_exists ('upload/'. $_FILES ['file']['name']))
		{
			echo $_FILES ['file']['name'].'<script language="javascript">alert("Un Fisier cu Aceasta Denumire Exista Deja!!!");</script>';
		}
		else if (move_uploaded_file ($_FILES['file']['tmp_name'], 'upload/'. $_FILES['file']['name']))
		{
			$part = $_FILES['file']['name'];
			$sql = mysqli_query($conn, "INSERT INTO tblfiles (photo1, case_id)  VALUES ('$part', '$case_id')");
			if ($sql)
			{
				echo '<script language="javascript">alert("Fisier Incarcat cu Succes!!!");</script>';
			}
		}
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
				<a href="view.php">
					<img src="assets/images/logo_altex_print.png"; class="img-responsive"; alt="altex logo"; />
				</a>
			</div>	
			<div id="mediagalaxylogo">
				<a href="view.php">
					<img src="assets/images/mediagalaxy.png"; class="img-responsive"; alt="mediagalaxy logo"; />
				</a>
			</div>	
	</div>
	<div class="container-fluid">
		<nav class="navbar-default">
			<div class="container">
				<div class="navbar">
					<ul class="nav navbar-nav navbar-center">
						<li><a href="adauga.php">Adauga Fisa</a></li>
						<li><a href="view.php">Gestionare Fise</a></li> 
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container-fluid">
	<form enctype="multipart/form-data" action="" method="post" name="upload">
	<label for="photo1"> Upload Photo</label>
    <input type="file" id="fileuploadbtn" name="file"/></br>
    <input value="save" type="submit" id="save" name="save">

</div>
</body>
<footer>
	<div id="footer">
	<p>Copyright 2015. All rights reserved</p>
	</div>
 </footer>
</html>