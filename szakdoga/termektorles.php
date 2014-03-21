<?php $title = "Termék törlése";
require_once('head.php');
if (isset($_GET['id']) && isset($_GET['nev'])){
	$id = $_GET['id'];
	$nev = $_GET['nev'];
}
 ?>
<form id="torles" name="termektorles" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h2>Termék törlése</h2>
<p align="center">Biztosan törölni szeretné a következő terméket?</p>
<strong>Sorszám: <?php if (isset($id)){echo $id;} ?></strong><br />
<strong>Név: <?php if (isset($nev)) {echo $nev;} ?></strong><br />
<input type="hidden" name="id" value="<?php if (isset($nev)) {echo $id;}?>"/>
<br />
<input type="submit" name="torles" value="Termék törlése" />
<a href="termeklista.php"><input type="button" name="megsem" value="Mégsem" /></a>
</form>
 <?php
 if (isset($_POST['torles'])){
	 $id = $_POST['id'];
	 
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "DELETE FROM termekek WHERE id = '$id' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 $url = 'termeklista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
 }
require_once('footer.php');
?>