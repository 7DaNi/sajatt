<?php $title = "Cikk lista";
require_once('head.php');
 ?>
 <h2><?php echo $title; ?></h2>
<div align="center">
	<form name="cikkkereses" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Keresés</label><input type="text" name="keresomezo"  value="<?php if (isset($_POST['keres'])) {echo $_POST['keresomezo'];} ?>"/>
    <input type="submit" name="keres" value="Keresés" />
    <a href="cikklista.php"><input type="button" name="megsem" value="Alaphelyzet" /></a>
    </form>
</div>
<?php 
if (isset($_POST['keres']) && !empty($_POST['keresomezo'])) {
	$feltetel = $_POST['keresomezo'];
		
echo '
<table width="90%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr bgcolor="#FFCC33">
	<th>Sorszám</th>
	<th>Cím</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem jött be!');
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT * FROM cikkek WHERE id LIKE '%" . $feltetel . "%' OR cim LIKE '%" . $feltetel . "%' OR tartalom LIKE  '%" . $feltetel . "%'";
	$lekerdezes = mysqli_query($dbc,$query);
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$cim = $adatok['cim'];
		$tartalom = $adatok['tartalom'];
echo '
<tr>
	<td>' . $id . '</td>
    <td>' . $cim . '</td>
	<td><a href="cikktorles.php?id=' . $id . '&cim=' . $cim . '">Törlés</a> | <a href="cikkmodositas.php?id=' . $id . '&cim=' . $cim . '&tartalom=' . $tartalom . '">Módosítás</a>
	</td>

</tr>';
	}
	
}
else {
	echo '
<table width="90%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr bgcolor="#FFCC33">
	<th>Sorszám</th>
	<th>Cím</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT * FROM cikkek ORDER BY ID DESC LIMIT 20";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$cim = $adatok['cim'];
		$tartalom = $adatok['tartalom'];
	
echo '
<tr>
	<td>' . $id . '</td>
    <td>' . $cim . '</td>
	<td><a href="cikktorles.php?id=' . $id . '&cim=' . $cim . '">Törlés</a> | <a href="cikkmodositas.php?id=' . $id . '&cim=' . $cim . '&tartalom=' . $tartalom . '">Módosítás</a>
	</td>
</tr>';
	}
} // kereses else vége
?>
</table>
<?php
require_once('footer.php');
?>
