<?php $title = "Cikk törlése";
require_once('head.php');
if (isset($_GET['id']) && isset($_GET['cim'])){
	$id = $_GET['id'];
	$cim = $_GET['cim'];
}
 ?>
<form id="torles" name="cikktorles" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h2>Cikk törlése</h2>
<p align="center">Biztosan törölni szeretné a következő cikket?</p>
<strong>Sorszám: <?php if (isset($id)){echo $id;} ?></strong><br />
<strong>Cím: <?php if (isset($cim)) {echo $cim;} ?></strong><br />
<input type="hidden" name="id" value="<?php if (isset($cim)) {echo $id;}?>"/>
<br />
<input type="submit" name="torles" value="Cikk törlése" />
<a href="cikklista.php"><input type="button" name="megsem" value="Mégsem" /></a>
</form>
 <?php
 if (isset($_POST['torles'])){
	 $id = $_POST['id'];
	 
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "DELETE FROM cikkek WHERE id = '$id' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 $url = 'cikklista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
 }
require_once('footer.php');
?>