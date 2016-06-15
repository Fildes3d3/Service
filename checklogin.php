<?php
include_once ("db.php");

$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes ($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$encrypted_password = md5($password);
$sql="SELECT * FROM utilizatori WHERE username='$username' and password='$encrypted_password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
		if (isset ($_POST['password']) && isset ($_POST['username'])) {
			if ($_POST['password'] == $password && $_POST['username'] == $username) {
				if (!session_id ())
					session_start();
			$_SESSION['logon'] = true;
			header("location:view.php?succes");
		
		}
}
}
else {
	echo '<script language="javascript">window.location.href="index.php";alert("Utilizator/Parola Eronata!!!");</script>';
}

ob_end_flush();
?>
