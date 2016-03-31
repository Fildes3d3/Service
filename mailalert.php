
<?php
include_once ("db.php");
$sql = mysqli_query ($conn, "SELECT id, receivedate, clientname, clientphone, clientemail, product, productbrand, productmodel, sn, 
									invoicenumber, invoicedate, defect, servunit, servphone, sentdate, awb, confdate, releasedate,
									DATEDIFF(CURDATE(), receivedate) AS servdays FROM tblservice ORDER BY servdays DESC LIMIT 10");
while ($row = mysqli_fetch_object ($sql)) {

$id= $row->id;
$days= $row->servdays;
$sender= "popadrianbogdan@yahoo.com";
$sender_name= "Service God";
};
require("phpmailer/class.phpmailer.php");

$mail = new PHPMailer();



$mail->From = "\n $sender";
$mail->FromName = "\n $sender_name ";
$mail->AddAddress("fildes3d3@yahoo.com");
    


$mail->WordWrap = 50;                               
$mail->IsHTML(true);                                  

if ($days > 13)
{
$mail->Subject = " Verifica Fisa Service $id \n.";
$mail->Body    = "Verifica Fisa Service: $id \n.".
				"Aceasta Fisa Service se Apropie de Termenul MAXIM de Solutionare";
} 
?>

