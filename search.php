<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
include_once ("db.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['go'])) {
			if (preg_match("/[0-9]+/", $_POST['id'])) {
				$id = $_POST['id'];
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
						<li class="active"><a href="view.php">Gestionare Fise</a></li> 
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
	<div>
	<table id="table">
		<thead>
			<th>Nr Inreg</th>
			<th>Zile Service</th>
			<th>Data Preluare</th>
			<th>Nume Client</th>
			<th>Numar de Telefon</th>
			<th>Adresa de eMail</th>
			<th>Denumire Produs</th>
			<th>Marca</th>
			<th>Model</th>
			<th>Serial Number</th>
			<th>Numar Factura</th>
			<th>Data Factura</th>
			<th>Defect</th>
			<th>Unitate Service</th>
			<th>Numar Telefon</th>
			<th>Data AWB Trimitere</th>
			<th>Numar AWB</th>
			<th>Data Primire</th>
			<th>Data   Eliberare   Produs</th>
			<th>Actiuni Fisa</th>
			<th>Incarcare Documente</th>
		</thead>
		<tbody>
			<?php
			$sql = mysqli_query ($conn, "SELECT id, receivedate, clientname, clientphone, clientemail, product, productbrand, productmodel, sn, 
									invoicenumber, invoicedate, defect, servunit, servphone, sentdate, awb, confdate, releasedate,
									DATEDIFF(CURDATE(), receivedate) AS servdays FROM tblservice WHERE id=".$id);
			
			if ($row = mysqli_fetch_object ($sql))
			{
				echo  "<tr>
						<td>$row->id</td>
						<td>$row->servdays</td>
						<td>$row->receivedate</td>
						<td>$row->clientname</td>
						<td>$row->clientphone</td>
						<td>$row->clientemail</td>
						<td>$row->product</td>
						<td>$row->productbrand</td>
						<td>$row->productmodel</td>
						<td>$row->sn</td>
						<td>$row->invoicenumber</td>
						<td>$row->invoicedate</td>
						<td>$row->defect</td>
						<td>$row->servunit</td>
						<td>$row->servphone</td>
						<td>$row->sentdate</td>
						<td>$row->awb</td>
						<td>$row->confdate</td>
						<td>$row->releasedate</td>
						<td><a href='edit.php?ide=$row->id'>Edit</a><br>
							<a href='delete.php?idd=$row->id'>Delete</a> 
							<a href='print.php?idp=$row->id'>Print</a>
						</td>
						<td><a href='upload.php?idu=$row->id'>Upload</a> 
							<a href='viewdoc.php?idv=$row->id'>Vizual</a> 
						</td>
					  </tr>";
			}
			else {
	echo '<script launguage="javascript">alert("Fisa Cautata Nu Exista in Baza de Date")</script>';
}
			?>
		</tbody>
	</table>
	</div>
</div>

	
</body>
<footer>
	<div id="footer">
	<p>Copyright 2015. All rights reserved</p>
	</div>
 </footer>
</html>