<?php $title = "Új termék hozzáadása";
require_once('head.php');
 ?>

<h2><?php echo $title; ?></h2>
<form id="reg" name="reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
	<label>Név: </label><input type="text" size="40" name="nev" /> <br /><br />
    <label>Mennyiség: </label><input type="text" size="8" name="mennyiseg" /><br /><br />
    <label>Egység: </label><input type="text" size="40" name="egyseg" /><br /><br />
    <label>Netto ár: </label><input type="text" size="40" name="nettoar" /><br /><br />
    <label>Bruttó ár: </label><input type="text" size="40" name="bruttoar"/><br /><br />
    <label>Leírás: </label><input type="text" size="40" name="leiras"/><br /><br />
    <label>Kép: </label><input type="file" name="file" /><br />
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
    
    
</form>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['nev']) && !empty($_POST['mennyiseg']) && !empty($_POST['egyseg']) && !empty($_POST['nettoar']) && !empty($_POST['bruttoar']) && !empty($_POST['leiras']))
		{
	$nev = $_POST['nev'];
	$mennyiseg = $_POST['mennyiseg'];
	$egyseg = $_POST['egyseg'];
	$nettoar = $_POST['nettoar'];
	$bruttoar = $_POST['bruttoar'];
	$leiras = $_POST['leiras'];
	
	
	$target = "feltoltes/";
	$file_name = $_FILES['file']['name'];
	$tmp_dir = $_FILES['file']['tmp_name'];
	$ujnev = time().'.jpg';
	
	move_uploaded_file($tmp_dir, $target . $ujnev);
	$utvonal = $target . $ujnev;
		
		
	$dbc = mysqli_connect(host,user,pw,db) or die('Bukó!');
	$query = "INSERT INTO termekek (nev,mennyiseg,egyseg,nettoar,bruttoar,leiras,kep) VALUES ('$nev','$mennyiseg','$egyseg','$nettoar','$bruttoar','$leiras','$utvonal')";
	mysqli_query($dbc,"SET NAMES utf8");
	mysqli_query($dbc,$query);
	
	
	$url = 'termeklista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
	
	}
	else {echo "Minden adatot ki kell tölteni!";}
	}
require_once('footer.php');
?>