<?php
require('head.php');
$title = 'Cikk módosítása';
	if (isset($_GET['id']) && isset($_GET['tartalom'])){
	$id = $_GET['id'];
	$tartalom = $_GET['tartalom'];
	
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT cim FROM cikkek WHERE id='$id'";
	$lekerdezes = mysqli_query($dbc,$query);
	
	$adatok = mysqli_fetch_array($lekerdezes);

	
	$cim = $adatok['cim'];
	
	}
?>
<h2><?php echo $cim; ?></h2>
<form id="reg" name="reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label>Cím: </label><input type="text" size="40" name="cim" value="<?php if (isset($cim)) {echo $cim;} ?>"/> <br /><br />
    <label>Tartalom: </label><input type="text"   size="40" name="tartalom" value="<?php if (isset($tartalom)) {echo $tartalom;} ?>"/><br /><br />
    <input type="hidden" name="id" value="<?php if (isset($id)) {echo $id;} ?>" />
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
    
    
</form>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['id']) && !empty($_POST['cim']) && !empty($_POST['tartalom']))
		{
	$id = $_POST['id'];
	$cim = $_POST['cim'];
	$tartalom = $_POST['tartalom'];
	
	//adatbázisba írás
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "UPDATE cikkek SET cim='$cim',tartalom='$tartalom' WHERE id='$id' LIMIT 1";
	
	mysqli_query($dbc,$query);
	mysqli_close($dbc);
	  $url = 'cikklista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
		}
		else {echo "Minden adat kitöltése kötelező!";}
	}
require_once('footer.php');
?>
