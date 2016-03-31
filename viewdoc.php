<?php
if (!session_id()) session_start();
if (!$_SESSION['logon']){
	header("location:index.php");
	die();
}
include_once ("db.php");  
$case_id = $_GET ['idv']; 
$sql = mysqli_query ($conn, "SELECT * FROM tblfiles WHERE case_id = '{$case_id}'") ;
$count_img = $count_pdf = 0;
$results = array ();	
			while ($row = mysqli_fetch_assoc ($sql))  { 
				$ext = pathinfo($row['photo1'], PATHINFO_EXTENSION);
				$row ['type'] = $ext;
				$results []= $row;
				
				if ($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg') {
					$count_img++;
				}
													
				else if ($ext == 'pdf') {
					$count_pdf++;
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
<div id="table_view">
<table id="table">
	<thead>
		<th colspan="<?php echo $count_img ?>">Fotografii Incarcate</th>
		<th colspan="<?php echo $count_pdf ?>">Documente Incarcate</th>
	</thead>
	<tbody>
		<tr>
		<?php 
		foreach ($results as $row) {
		$ext = $row['type'];
			if ($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg') {
					
					$image= $row['photo1']; echo '<td>
														<a href="upload/'.$image.'"target="_blank"><img src="upload/'.$image.'" width="180px" height="auto"></a></td>'; }
													
				else if ($ext == 'pdf') {
					
					$object= $row['photo1']; echo '<td><object  width="300px" height="398" type="application/pdf" data="upload/'.$object.'?#zoom=35&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content"></td>'; } 

		}
		?>
		</tr>
</table>
</div>
</body>
<footer>
	<div id="footer">
	<p>Copyright 2015. All rights reserved</p>
	</div>
 </footer>
</html>