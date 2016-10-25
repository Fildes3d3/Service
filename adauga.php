<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
include_once ("db.php");
if (isset ($_POST ['save']))
{
	$receivedate = date('Y-m-d',strtotime ($_POST ['receivedate']));
	$cgdate = date('Y-m-d',strtotime ($_POST ['cgdate']));
	$invoicedate = date('Y-m-d',strtotime ($_POST ['invoicedate']));
	foreach ($_POST as $key => $value) {
		$_POST [$key] = filter_var ($value, FILTER_SANITIZE_STRING);
		$_POST [$key] = filter_var ($value, FILTER_SANITIZE_MAGIC_QUOTES);
		$_POST [$key] = filter_var ($value, FILTER_SANITIZE_SPECIAL_CHARS);
		$_POST [$key] = addslashes (strip_tags(trim ($value)));
		$_POST [$key] = stripslashes (strip_tags(trim ($value)));
		}


	$sql = mysqli_query ($conn, "INSERT INTO tblservice 
						(receivedate, clientname, clientstreet, clientbl, clientsc, clientap, clientet, clientjud, clientloc, clientphone, clientemail, store, av, functia, 
						storephone, product, productbrand, productmodel, sn, aspect, accesorii, cgnumber, cgdate, invoicenumber, invoicedate, defect, servunit, servphone, 
						servadress, servcontact)
					VALUES ('{$receivedate}',
							'{$_POST['clientname']}',
							'{$_POST ['clientstreet']}',
							'{$_POST ['clientbl']}',
							'{$_POST ['clientsc']}',
							'{$_POST ['clientap']}',
							'{$_POST ['clientet']}',
							'{$_POST ['clientjud']}',
							'{$_POST ['clientloc']}',
							'{$_POST ['clientphone']}',
							'{$_POST ['clientemail']}',
							'{$_POST ['store']}',
							'{$_POST ['av']}',
							'{$_POST ['functia']}',
							'{$_POST ['storephone']}',
							'{$_POST ['product']}',
							'{$_POST ['productbrand']}',
							'{$_POST ['productmodel']}',
							'{$_POST ['sn']}',
							'{$_POST ['aspect']}',
							'{$_POST ['accesorii']}',
							'{$_POST ['cgnumber']}',
							'{$cgdate}',
							'{$_POST ['invoicenumber']}',
							'{$invoicedate}',
							'{$_POST ['defect']}',
							'{$_POST ['servunit']}',
							'{$_POST ['servphone']}',
							'{$_POST ['servadress']}',
							'{$_POST ['servcontact']}'
							)") or die(mysqli_error($conn));
	if ($sql) {
		echo "<script>alert('Inregistrare Salvata cu Succes!!!')</script>";
		header ('location:view.php');
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
						<li class="active"><a href="adauga.php">Adauga Fisa</a></li>
						<li><a href="view.php">Gestionare Fise</a></li> 
						<li>
							<form  action="search.php?go" method="post" id="searchform" name="searchform" enctype="multipart/formdata">
								<div class="container-fluid">
									<input type="text" class="form-control" id="searchbox" name="id" placeholder="Introduceti Nr. Fisei Cautate">
								</div>
						</li>
						<li>
								<div class="form-group">
									<input type="submit" value="search" id="searchbutton" name="submit">
								</div>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
<div class="container-fluid" id="leftfirst">
	<form method="post" id="indexform" name="indexform" enctype="multipart/form-data" action="">
	<div class="container-fluid">
		<h3>Adauga Fisa</h3>
		<div class="form-group">
				<label for="receivedate">Data Preluare:</label>
					<input type="date" class="form-control focusedInput" id="receivedate" name="receivedate" placeholder="Data Preluare" >
		</div>
	</div>
	<div class="container-fluid">
		<h3> Date Client </h3>
			<div class="form-group">
				<label for="clientname">Nume Client:</label>
					<input type="text" class="form-control focusedInput" id="clientname" name="clientname" placeholder="Nume Client" >
			</div>
			<div class="form-group">
				<label for="clientstreet" >Strada:</label>
					<input type="text" class="form-control focusedInput" id="cleintstreet" name="clientstreet" placeholder="Strada" >
			</div>
			<div class="form-group">
				<label for="clientbl">Bloc:</label>
					<input type="text" class="form-control focusedInput" id="clientbl" name="clientbl" placeholder="Bloc" >
			</div>
			<p></p>
			<div class="form-group">
				<label for="clientsc">Scara:</label>
					<input type="text" class=" form-control focusedInput" id="clientsc" name="clientsc" placeholder="Scara">
			</div>
			<div class="form-group">
				<label for="clientap">Apartament:</label>
					<input type="text" class="form-control focusedInput"  id="clientap" name="clientap" placeholder="Apartament" >
			</div>
			<div class="form-group">
				<label for="clientet">Etaj:</label>
					<input type="text" class="form-control focusedInput" id="clientet" name="clientet" placeholder="Etaj">
			</div>
			<div class="form-group">
				<label for="clientjud">Judet/Sector:</label>
					<input type="text" class="form-control focusedInput" id="clientjud" name="clientjud" placeholder="Judet/Sector" >
			</div>
			<p></p>
			<div class="form-group">
				<label for="clientloc">Localitate:</label>
					<input type="text" class="form-control focusedInput" id="clientloc" name="clientloc" placeholder="Localitate" >
			</div>
			<div class="form-group">
				<label for="clientphone">Telefon:</label>
					<input type="text" class="form-control focusedInput" id="clientphone" name="clientphone" placeholder="Numar telefon" pattern="[0-9]{10}" title="Introduceti numar telefon de forma:07XXXXXXXX sau 02XXXXXXXX" >
			</div>
			<div class="form-group">
				<label for="clientemail">eMail:</label>
					<input type="email" class="form-control focusedInput" id="clientemail" name="clientemail" placeholder="Adresa eMail" title="Introduceti adresa de email de forma:user@example.XX" >
			</div>
	</div>
</div>
<div class="container-fluid" id="leftmiddle">
	<div class="container-fluid">
		<h3> Date Magazin Altex </h3>
			<div class="form-group">
				<label for="store">Denumirea Unitatii:</label>
					<input type="text" class="form-control focusedInput" id="store" name="store" value="Media Galaxy Cluj Polus" placeholder="Media Galaxy Cluj Polus" >
			</div>
			<div class="form-group">
				<label for="av">Nume reprezentant magazin:</label>
					<input type="text" class="form-control focusedInput" id="av" name="av" placeholder="Reprezentant magazin" >
			</div>
			<div class="form-group">
				<label for="functia">Functia:</label>
					<input type="text" class="form-control focusedInput" id="functia" name="functia" placeholder="Functia" >
			</div>
			<p></p>
			<div class="form-group">
				<label for="storephone">Telefon:</label>
					<input type="text" class="form-control focusedInput" id="storephone" name="storephone" value="0264275118" placeholder="0264 275 118" pattern="[0-9]{10}" title="Introduceti numar telefon de forma:07XXXXXXXX sau 02XXXXXXXX" >
			</div>
	</div>
	<div class="container-fluid">
		<h3>Date Aparat Predat:</h3>
			<div class="form-group">
				<label for="productname">Denumire Produs:</label>
					<input type="text" class="form-control focusedInput" id="productname" name="product" placeholder="Denumire Produs" >
			</div>
			<div class="form-group">
				<label for="productbrand">Marca:</label>
					<input type="text" class="form-control focusedInput" id="productbrand" name="productbrand" placeholder="Marca/Producator" >
			</div>
			<div class="form-group">
				<label for="productmodel">Model:</label>
					<input type="text" class="form-control focusedInput" id="productmodel" name="productmodel" placeholder="Model" >
			</div>
			<div class="form-group">
				<label for="sn">Serie:</label>
					<input type="text" class="form-control focusedInput" id="sn" name="sn" placeholder="Serial Number" >
			</div>
	</div>
	<div class="container-fluid">
		<h3> Aspect: </h3>
			<div class="form-group">
				<label for="aspect">Aspect Estetic:</label>
					<input type="text" class="form-control focusedInput" id="aspect" name="aspect" placeholder="Aspect Estetic" >
			</div>
			<div class="form-group">
				<label for="radio">Ambalaj Corespunzator:</label>
					<div class="checkbox">
						<label> <input type="radio" id="radio" name="optradio" >Da</label>
					</div>
					<div class="checkbox">
						<label> <input type="radio" name="optradio">Nu</label>
					</div>
			</div>
	</div>
</div>
<div class="container-fluid" id="leftlast">
	<div class="container-fluid">
	<h3> Accesorii: </h3>
		<div class="form-group">
			<label for="accesorii">Accesorii ce insotesc aparatul in service:</label>
				<textarea type="text" class="form-control focusedInput" rows="3" cols="50" id="accesorii" name="accesorii" placeholder="Accesorii ce Insotesc Aparatul in service" ></textarea>
		</div>
	</div>
	<div class="container-fluid">
		<h3> Certificatul de Garantie in Original:</h3>	
			<div class="form-group">
				<label for="cgnumber">Numar:</label>
					<input type="text" class="form-control focusedInput"  id="cgnumber" name="cgnumber" placeholder="Numar CG">
			</div>
			<div class="form-group">
				<label for="cgdate">Data:</label>
					<input type="date" class="form-control focusedInput" id="cgdate" name="cgdate" placeholder="Data CG">
			</div>
	</div>


	<div class="container-fluid">
		<h3> Dovada Cumpararii (Factura fiscala/Bon Fiscal):</h3>	
			<div class="form-group">
				<label for="invoicenumber">Numar:</label>
					<input type="text" class="form-control focusedInput"  id="invoicenumber" name="invoicenumber" placeholder="Numar Factura/Bon" >
			</div>
			<div class="form-group">
				<label for="invoicedate">Data:</label>
					<input type="date" class="form-control focusedInput" id="invoicedate" name="invoicedate" placeholder="Data Factura/Bon" >
			</div>
	</div>
	<div class="container-fluid">
		<h3> Defect Reclamat:</h3>
			<div class="form-group">
				<label for="defect">Descrierea Defectului:</label>
					<textarea type="text" class="form-control focusedInput" id="defect" name="defect" rows="3" cols="50" placeholder="Defectul Reclamat de Client" ></textarea>
			</div>
	</div>
	<div class="container-fluid">
		<h3> Date Unitate Service </h3>
			<div class="form-group">
				<label for="servunit">Denumirea Unitatii:</label>
					<input type="text" class="form-control focusedInput" id="servunit" name="servunit" placeholder="Denumirea Unitatii">
			</div>
			<div class="form-group">
				<label for="servphone">Numar telefon:</label>
					<input type="text" class="form-control focusedInput" id="servphone" name="servphone" placeholder="Numar de Telefon S.A." pattern="[0-9]{10}" title="Introduceti numar telefon de forma:07XXXXXXXX sau 02XXXXXXXX">
			</div>
			<div class="form-group">
				<label for="servadress">Adresa:</label>
					<input type="text" class="form-control focusedInput" id="servadress" name="servadress"placeholder="Adresa S.A.">
			</div>
			<p></p>
			<div class="form-group">
				<label for="servcontact">Persoana de Contact:</label>
					<input type="text" class="form-control" id="servcontact" name="servcontact" placeholder="Persoana de Contact">
			</div>
	</div>
</div>
	<div class="container-fluid">
		<input type="submit" value="save" id="save" name="save" />
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