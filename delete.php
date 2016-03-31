<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
include_once ("db.php");
$id = $_GET ['idd'];
if (isset ($_GET ['idd']))
{
	$sql = mysqli_query ($conn, "SELECT * FROM tblservice WHERE id= '{$id}'");
	$row = mysqli_fetch_object ($sql);
}
	$sqld = mysqli_query ($conn, "DELETE FROM tblservice WHERE id= '{$id}'");
	if ($sqld)
	{
		header ('location: view.php');
	}
?>