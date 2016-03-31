<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
			include_once ("db.php");
			$id = $_GET ['idp'];
			if (isset ($_GET ['idp']));
			{
				$sql = mysqli_query ($conn, "SELECT * FROM tblservice WHERE id = '{$id}'");
				$row = mysqli_fetch_object ($sql); 	
			}
?>
<?php
include_once ("head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
	<div id="altexlogo">
		<a href="view.php">
		<img src="assets/images/logo_altex_print.png"; class="img-responsive"; alt="altex logo"; />
		</a>
	</div>	
	<br>
	<br>
	<br>
	<br>
	<div id="title"> PROCES VERBAL DE PREDARE-PRIMIRE APARAT DEFECT </div>
	<div id="title-small">(in vederea trimiterii in service) </div>
	<div id="clientdata">
	<div id="regdate">Data Preluare de la client: <?php echo $row->receivedate ?> </div>
	<div id="regnumber">Numar de Inregistrare: <?php echo $row->id ?> / <?php echo $row->receivedate ?></div>
	<div id="idtitle">Date Client:</div>
	<div id="data">Nume Client: <?php echo $row->clientname ?> Adresa Strada: <?php echo $row->clientstreet ?> Nr: <?php echo $row->id ?>
		Bl: <?php echo $row->clientbl ?> Sc: <?php echo $row->clientsc ?> Ap: <?php echo $row->clientap ?> Et: <?php echo $row->clientet ?><br>
		Judet/Sector: <?php echo $row->clientjud ?> Localitatea: <?php echo $row->clientloc ?> Numar Telefon: <?php echo $row->clientphone ?> eMail: <?php echo $row->clientemail ?></div>
	<br>
	<div id="idtitle">Date Magazin Altex:</div>
	<div id="data"> Denumire Unitatii: <?php echo $row->store ?> <br>Nume Reprezentant Magazin: <?php echo $row->av ?> 
		Functia: <?php echo $row->functia ?> Numar Telefon: <?php echo $row->storephone ?></div>	
	</div>	
	<div id="product">
	<div class="container">
		<div id="idtitle"> Date Aparat Predat </div><br>
			<div id="container">
				<div id="data">Denumire Produs: <?php echo $row->product ?></div>
				<div id="data">Marca: <?php echo $row->productbrand ?></div>
				<div id="data">Model: <?php echo $row->productmodel ?></div>
				<div id="data">Serie: <?php echo $row->sn ?></div>
			</div>
		<div id="productstate1">
			<div id="data">Aspect Estetic: <?php echo $row->aspect ?></div>
			<div id="data">Ambalaj Corespunzator: <?php echo $row->id ?></div>
		</div>
	</div>
	</div>
	<div id="aditionaldata">
		<div id="data"> Accesorii (se va detalia care sunt accesoriile ce insotesc produsul in service): <?php echo $row->accesorii ?> </div><br>
		<div id="data"> OBLIGATORIU! Certificat de Garantie in Original: Numar: <?php echo $row->cgnumber ?>Data: <?php echo $row->cgdate ?> </div><br>
		<div id="data"> Dovada Cumpararii (Factura Fiscala sau Bon Fiscal): Numar: <?php echo $row->invoicenumber ?> Data: <?php echo $row->invoicedate ?></div>
	</div>
	<div id="aditionaldata1">
		<div id="idtitle"> Defect Reclamat de Client: </div>
		<div id="data"> Descrierea defectului: <?php echo $row->defect ?></div>
	</div>
	<div id="aditionaldata">
		<div id="idtitle"> Date Unitate Service: </div>
		<div id="data"> Denumirea Unitatii: <?php echo $row->servunit ?>   Numar de Telefon: <?php echo $row->servphone ?> </div>
		<div id="data">Adresa Unitatii:<?php echo $row->servadress ?>   Persoana de Contact: <?php echo $row->servcontact ?></div>
	</div>
	<div id="aditionaldata">
		<div id="idtitle"> IMPORTANT! Clientul este de acord cu următoarele::</div>
		<div id="data"> 1. Aparatul se va trimite catre unitatea de service autorizata pentru reparare, termenul de aducere la conformitate fiind de 15 zile calendaristice de la data la care cumparatorul a notificat vanzatorul.</div>
		<div id="data"> 2. Aparatul trimis in service si care nu este ridicat/revendicat de client in termenul legal de revendicare (3 ANI), se considera abandonat si clientul nu mai are drept de proprietate asupra lui; </div>
		<div id="data"> 3. Vanzatorul nu poate fi facut raspunzator, in cazul defectarii produsului, pentru pierderea informatiilor sau datelor, nici pentru orice prejudicii ce ar putea suferi beneficiarul in urma acestor pierderi;</div>
	</div>
	<div id="product">
		<div id="idtitle"> Date Aparat Predat </div>
		<div class="container">
			<div id="container">
				<div id="data">Semnătura reprezentant magazin de primire de la CLIENT</div>
				<div id="data">L.S.</div>
			</div>
		<div id="productstate">
			<div id="data">Semnatura de predare de catre CLIENT</div>
			<div id="data">L.S.</div>
		</div>
		</div>
	</div>
	<div id="product">
		<div id="idtitle">Predarea produsului în stare de funcţionare către client</div>
		<div id="idtitle">Echipamentele au fost testate în faţa clientului şi sunt în stare bună de funcţionare.</div>
		<div class="container">
			<div id="container">
				<div id="data">Data predării către client:</div>
			</div>
			<div id="productstate">
				<div id="data">Semnătura Client   </div>
			</div>
		</div>
	</div>
	<button id="print_button" class="btn btn-default" onClick="window.print()">Listare</button>
	<a id="altex_button" href="view.php" class="btn btn-default">Inapoi la Gestionare Fise</a>
</body>

<footer>
	<div id="footer">
	<p>Copyright 2015. All rights reserved</p>
	</div>
 </footer>
</html>