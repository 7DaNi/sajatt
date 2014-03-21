<?php
require('head.php');
$title = 'Termék módosítása';
	if (isset($_GET['id']) && isset($_GET['nev']) && isset($_GET['egyseg']) && isset($_GET['mennyiseg']) && isset($_GET['nettoar']) && isset($_GET['bruttoar']) && isset($_GET['leiras'])){
	$id = $_GET['id'];
	$nev = $_GET['nev'];
	$egyseg = $_GET['egyseg'];
	$mennyiseg = $_GET['mennyiseg'];
	$nettoar = $_GET['nettoar'];
	$bruttoar = $_GET['bruttoar'];
	$leiras = $_GET['leiras'];
	
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT kep FROM termekek WHERE id='$id'";
	$lekerdezes = mysqli_query($dbc,$query);
	
	$adatok = mysqli_fetch_array($lekerdezes);
	
	$utvonal = $adatok['kep'];
	}
?>
<h2>Termék módosítása</h2>
<form id="reg" name="reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label>Név: </label><input type="text" size="40" name="nev" value="<?php if (isset($nev)) {echo $nev;} ?>"/> <br /><br />
    <label>Mennyiség: </label><input type="text" size="8" name="mennyiseg" value="<?php if (isset($mennyiseg)) {echo $mennyiseg;} ?>"/><br /><br />
    <label>Egység: </label><input type="text" size="40" name="egyseg" value="<?php if (isset($egyseg)) {echo $egyseg;} ?>"/><br /><br />
    <label>Nettóár: </label><input type="text" size="40" name="nettoar" value="<?php if (isset($nettoar)) {echo $nettoar;} ?>"/><br /><br />
    <label>Bruttóár: </label><input type="text" size="40" name="bruttoar" value="<?php if (isset($bruttoar)) {echo $bruttoar;} ?>"/><br /><br />
    <label>Leírás: </label><input type="text" size="40" name="leiras" value="<?php if (isset($leiras)) {echo $leiras;} ?>"/><br /><br />
    <input type="hidden" name="id" value="<?php if (isset($id)) {echo $id;} ?>" />
    <img src="<?php echo $utvonal; ?>" /><br /><br />
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
    
    
</form>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['nev']) && !empty($_POST['mennyiseg']) && !empty($_POST['egyseg']) && !empty($_POST['nettoar']) && !empty($_POST['bruttoar']) && !empty($_POST['id']))
		{
	$id = $_POST['id'];
	$nev = $_POST['nev'];
	$egyseg = $_POST['egyseg'];
	$mennyiseg = $_POST['mennyiseg'];
	$nettoar = $_POST['nettoar'];
	$bruttoar = $_POST['bruttoar'];
	$leiras = $_POST['leiras'];
	
	
	//adatbázisba írás
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "UPDATE termekek SET nev='$nev',egyseg='$egyseg',mennyiseg='$mennyiseg',nettoar='$nettoar',bruttoar='$bruttoar',leiras='$leiras' WHERE id='$id' LIMIT 1";
	
	mysqli_query($dbc,$query);
	mysqli_close($dbc);
	  $url = 'termeklista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
		}
		else {echo "Minden adat kitöltése kötelező!";}
	}
require_once('footer.php');
?>