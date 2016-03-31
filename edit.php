<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
include_once ("db.php");
$id = $_GET ['ide'];
if (isset ($_GET ['ide']))
{	
	$sql = mysqli_query ($conn, "SELECT * FROM tblservice WHERE id = '{$id}'");
	$row = mysqli_fetch_object ($sql); 	
}
if (isset ($_POST ['update']))
{
	$receivedate = date('Y-m-d',strtotime ($_POST ['receivedate']));
	$cgdate = date('Y-m-d',strtotime ($_POST ['cgdate']));
	$invoicedate = date('Y-m-d',strtotime ($_POST ['invoicedate']));
	$sentdate = date('Y-m-d',strtotime ($_POST ['sentdate']));
	$confdate = date('Y-m-d',strtotime ($_POST ['confdate']));
	$releasedate = date('Y-m-d',strtotime ($_POST ['releasedate']));
	foreach ($_POST as $key => $value) {
		$_POST [$key] = filter_var ($value, FILTER_SANITIZE_STRING);
		$_POST [$key] = filter_var ($value, FILTER_SANITIZE_MAGIC_QUOTES);
		$_POST [$key] = filter_var ($value, FILTER_SANITIZE_SPECIAL_CHARS);
		$_POST [$key] = addslashes (strip_tags(trim ($value)));
		$_POST [$key] = stripslashes (strip_tags(trim ($value)));
		}
	$sqledit =  "UPDATE tblservice SET
				receivedate   = '{$receivedate}',
				clientname    = '{$_POST ['clientname']}',
				clientstreet  = '{$_POST ['clientstreet']}',
				clientsc      = '{$_POST ['clientsc']}',
				clientap      = '{$_POST ['clientap']}',
				clientet      = '{$_POST ['clientet']}',
				clientjud     = '{$_POST ['clientjud']}',
				clientloc     = '{$_POST ['clientloc']}',
				clientphone   = '{$_POST ['clientphone']}',
				clientemail   = '{$_POST ['clientemail']}',
				store         = '{$_POST ['store']}',
				av            = '{$_POST ['av']}',
				functia       = '{$_POST ['functia']}',
				storephone    = '{$_POST ['storephone']}',
				product       = '{$_POST ['product']}',
				productbrand  = '{$_POST ['productbrand']}',
				productmodel  = '{$_POST ['productmodel']}',
				sn            = '{$_POST ['sn']}',
				aspect        = '{$_POST ['aspect']}',
				accesorii     = '{$_POST ['accesorii']}',
				cgnumber      = '{$_POST ['cgnumber']}',
				cgdate        = '{$cgdate}',
				invoicenumber = '{$_POST ['invoicenumber']}',
				invoicedate   = '{$invoicedate}',
				defect        = '{$_POST ['defect']}',
				servunit      = '{$_POST ['servunit']}',
				servphone     = '{$_POST ['servphone']}',
				servadress    = '{$_POST ['servadress']}',
				servcontact   = '{$_POST ['servcontact']}',
				sentdate      = '{$sentdate}',
				awb           = '{$_POST ['awb']}',
				confdate      = '{$confdate}',
				releasedate   = '{$releasedate}'
				WHERE      id = '{$id}'";
		$res = mysqli_query ($conn, $sqledit);
		if ($res)
		{
			header ('location:view.php');
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
	<div class="container-fluid">
	<form action="", method="post", id="editform", enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $row->id; ?>" />
	<div class="container-fluid">
		<h3>Editeaza Fisa</h3>
			<div class="form-group">
				<label for="receivedate">Data Preluare:</label>
					<input type="text" class="form-control focusedInput" id="receivedate" name="receivedate" value="<?php echo date('m/d/Y', strtotime ($row->receivedate)); ?>">
			</div>
			<p></p>
	</div>
	<div class="container-fluid">
		<h3> Date Client </h3>
			<div class="form-group">
				<label for="clientname">Nume Client:</label>
					<input type="text" class="form-control focusedInput" id="clientname" name="clientname" value="<?php echo $row->clientname; ?>">
			</div>
			<div class="form-group">
				<label for="clientstreet" >Strada:</label>
					<input type="text" class="form-control focusedInput" id="clientstreet" name="clientstreet" value="<?php echo $row->clientstreet; ?>">
			</div>
			<div class="form-group">
				<label for="clientbl">Bloc:</label>
					<input type="text" class="form-control focusedInput" id="clientbl" name="clientbl" value="<?php echo $row->clientbl; ?>">
			</div>
			<p></p>
			<div class="form-group">
				<label for="clientsc" id="scara" >Scara:</label>
					<input type="text" class=" form-control focusedInput" id="clientsc" name="clientsc" value="<?php echo $row->clientsc; ?>">
			</div>
			<div class="form-group">
				<label for="clientap">Apartament:</label>
					<input type="text" class="form-control focusedInput" id="clientap" name="clientap" value="<?php echo $row->clientap; ?>">
			</div>
			<div class="form-group">
				<label for="clientet">Etaj:</label>
					<input type="text" class="form-control focusedInput" id="clientet" name="clientet" value="<?php echo $row->clientet; ?>">
			</div>
			<div class="form-group">
				<label for="clientjud">Judet/Sector:</label>
					<input type="text" class="form-control focusedInput" id="clientjud" name="clientjud" value="<?php echo $row->clientjud; ?>">
			</div>
			<p></p>
			<div class="form-group">
				<label for="clientloc">Localitate:</label>
					<input type="text" class="form-control focusedInput" id="clientloc" name="clientloc" value="<?php echo $row->clientloc; ?>">
			</div>
			<div class="form-group">
				<label for="clientphone">Telefon:</label>
					<input type="text" class="form-control focusedInput" id="clientphone" name="clientphone" value="<?php echo $row->clientphone; ?>" pattern="[0-9]{10}" title="Introduceti numar telefon de forma:07XXXXXXXX">
			</div>
			<div class="form-group">
				<label for="clientemail">eMail:</label>
					<input type="email" class="form-control focusedInput" id="clientemail" name="clientemail" value="<?php echo $row->clientemail;?>" title="Introduceti adresa de email de forma:user@example.XX">
			</div>
	</div>
	<div class="container-fluid">
		<h3> Date Magazin Altex </h3>
			<div class="form-group">
				<label for="store">Denumirea Unitatii:</label>
					<input type="text" class="form-control focusedInput" id="store" name="store" value="<?php echo $row->store; ?>">
			</div>
			<div class="form-group">
				<label for="av">Nume reprezentant magazin:</label>
					<input type="text" class="form-control focusedInput" id="av" name="av" value="<?php echo $row->av; ?>">
			</div>
			<div class="form-group">
				<label for="functia">Functia:</label>
					<input type="text" class="form-control focusedInput" id="functia" name="functia" value="<?php echo $row->functia; ?>">
			</div>
			<p></p>
			<div class="form-group">
				<label for="storephone">Telefon:</label>
					<input type="text" class="form-control focusedInput" id="storephone" name="storephone" value="0264275118" value="<?php echo $row->storephone; ?>" pattern="[0-9]{10}" title="Introduceti numar telefon de forma:0264XXXXXX sau 074XXXXXXX">
			</div>
	</div>
	<p></p>
	<div class="container-fluid">
		<h3>Date Aparat Predat:</h3>
			<div class="form-group">
				<label for="product">Denumire Produs:</label>
					<input type="text" class="form-control focusedInput" id="productname" name="product" value="<?php echo $row->product; ?>">
			</div>
			<div class="form-group">
				<label for="productbrand">Marca:</label>
					<input type="text" class="form-control focusedInput" id="productbrand" name="productbrand" value="<?php echo $row->productbrand; ?>">
			</div>
			<div class="form-group">
				<label for="productmodel">Model:</label>
					<input type="text" class="form-control focusedInput" id="productmodel" name="productmodel" value="<?php echo $row->productmodel; ?>">
			</div>
			<div class="form-group">
				<label for="sn">Serie:</label>
					<input type="text" class="form-control focusedInput" id="sn" name="sn" value="<?php echo $row->sn; ?>">
			</div>
	</div>
	<div class="container-fluid">
		<h3> Aspect/Accesorii: </h3>
			<div class="form-group">
				<label for="aspect">Aspect Estetic:</label>
					<input type="text" class="form-control focusedInput" id="aspect" name="aspect" value="<?php echo $row->aspect; ?>">
			</div>
			<div class="form-group">
				<label for="radio">Ambalaj Corespunzator:</label>
					<div class="checkbox">
						<label> <input type="radio" id="radio" name="optradio">Da</label>
					</div>
					<div class="checkbox">
						<label> <input type="radio" name="optradio">Nu</label>
					</div>
			</div>
	</div>
	<div class="container-fluid">
		<div class="form-group">
			<label for="accesorii">Accesorii ce insotesc aparatul in service:</label>
				<input type="text" class="form-control focusedInput" rows="3" cols="50" id="accesorii" name="accesorii" value="<?php echo $row->accesorii; ?>">
		</div>
	</div>
	<div class="container-fluid">
		<h3> Certificatul de Garantie in Original:</h3>	
			<div class="form-group">
				<label for="cgnumber">Numar:</label>
					<input type="text" class="form-control focusedInput" id="cgnumber" name="cgnumber" value="<?php echo $row->cgnumber; ?>">
			</div>
			<div class="form-group">
				<label for="cgdate">Data:</label>
					<input type="date" class="form-control focusedInput" id="cgdate" name="cgdate" value="<?php echo date('m/d/Y', strtotime ($row->cgdate)); ?>">
			</div>
	</div>
	<div class="container-fluid">
		<h3> Dovada Cumpararii (Factura fiscala/Bon Fiscal):</h3>	
			<div class="form-group">
				<label for="invoicenumber">Numar:</label>
					<input type="text" class="form-control focusedInput" id="invoicenumber" name="invoicenumber" value="<?php echo $row->invoicenumber; ?>">
			</div>
			<div class="form-group">
				<label for="invoicedate">Data:</label>
					<input type="date" class="form-control focusedInput" id="invoicedate" name="invoicedate" value="<?php echo date('m/d/Y', strtotime ($row->invoicedate)); ?>">
			</div>
	</div>
	<div class="container-fluid">
		<h3> Defect Reclamat:</h3>
			<div class="form-group">
				<label for="defect">Descrierea Defectului:</label>
					<input type="text" class="form-control focusedInput" id="defect" name="defect" rows="5" cols="50" value="<?php echo $row->defect; ?>">
			</div>
	</div>
	<div class="container-fluid">

		<h3> Date Unitate Service </h3>
			<div class="form-group">
				<label for="servunit">Denumirea Unitatii:</label>
					<input type="text" class="form-control focusedInput" id="servunit" name="servunit" value="<?php echo $row->servunit; ?>">
			</div>
			<div class="form-group">
				<label for="servphone">Numar telefon:</label>
					<input type="text" class="form-control focusedInput" id="servphone" name="servphone" value="<?php echo $row->servphone; ?>" pattern="[0-9]{10}" title="Introduceti numar telefon de forma:07XXXXXXXX">
			</div>
			<div class="form-group">
				<label for="servadress">Adresa:</label>
					<input type="text" class="form-control focusedInput" id="servadress" name="servadress" value="<?php echo $row->servadress; ?>">
			</div>
			<p></p>
			<div class="form-group">
				<label for="servcontact">Persoana de Contact:</label>
					<input type="text" class="form-control" id="servcontact" name="servcontact" value="<?php echo $row->servcontact; ?>">
			</div>
			<div class="form-group">
				<label for="sentdate">Data AWB Trimitere:</label>
					<input type="date" class="form-control" id="sentdate" name="sentdate" value="<?php echo date('m/d/Y', strtotime ($row->sentdate)); ?>">
			</div>
			<div class="form-group">
				<label for="service_contact">Numar AWB:</label>
					<input type="text" class="form-control" id="awb" name="awb" value="<?php echo $row->awb; ?>">
			</div>
			<div class="form-group">
				<label for="confdate">Confirmare Primire:</label>
					<input type="date" class="form-control" id="confdate" name="confdate" value="<?php echo date('m/d/Y', strtotime ($row->confdate)); ?>">
			</div>
			<div class="form-group">
				<label for="releasedate">Data Eliberare Produs:</label>
					<input type="date" class="form-control" id="releasedate" name="releasedate" value="<?php echo date('m/d/Y', strtotime ($row->releasedate)); ?>">
			</div>
	</div>
		<input type="submit" value="update" id="update" name="update" />
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