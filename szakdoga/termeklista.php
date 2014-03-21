<?php $title = "Termék lista";
require_once('head.php');
 ?>
 <h2><?php echo $title; ?></h2>
<div align="center">
	<form name="termekkereses" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Keresés</label><input type="text" name="keresomezo"  value="<?php if (isset($_POST['keres'])) {echo $_POST['keresomezo'];} ?>"/>
    <input type="submit" name="keres" value="Keresés" />
    <a href="termeklista.php"><input type="button" name="megsem" value="Alaphelyzet" /></a>
    </form>
</div>
<?php 
if (isset($_POST['keres']) && !empty($_POST['keresomezo'])) {
	$feltetel = $_POST['keresomezo'];
		
echo '
<table width="90%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr bgcolor="#FFCC33">
	<th>Sorszám</th>
	<th>Név</th>
    <th>Mennyiség</th>
    <th>Egység</th>
    <th>Netto ár</th>
    <th>Brutto ár</th>
	<th>Leírás</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT * FROM termekek WHERE id LIKE '%" . $feltetel . "%' OR nev LIKE '%" . $feltetel . "%' OR mennyiseg LIKE  '%" . $feltetel . "%' OR egyseg LIKE '%" . $feltetel . "%' OR nettoar LIKE '%" . $feltetel . "%' OR bruttoar LIKE '%" . $feltetel . "%' OR leiras LIKE '%" . $feltetel . "%'";
	$lekerdezes = mysqli_query($dbc,$query);
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$nev = $adatok['nev'];
		$mennyiseg = $adatok['mennyiseg'];
		$egyseg = $adatok['egyseg'];
		$nettoar = $adatok['nettoar'];
		$bruttoar = $adatok['bruttoar'];
		$leiras = $adatok['leiras'];	
echo '
<tr>
	<td>' . $id . '</td>
    <td>' . $nev . '</td>
    <td>' . $mennyiseg . '</td>
    <td>' . $egyseg . '</td>
    <td>' . $nettoar . '</td>
    <td>' . $bruttoar . '</td>
	<td>' . $leiras . '</td>
	<td> <a href="termektorles.php?id='. $id.'&nev='. $nev .'">Törlés</a> | <a href="termekmodositas.php?id='.$id.'&nev='.$nev.'&mennyiseg='.$mennyiseg.'&egyseg='.$egyseg.'&nettoar='.$nettoar.'&bruttoar='.$bruttoar.'&leiras='.$leiras.'">Modosítás</a>
	</td>

</tr>';
	}
	
}
else {
	echo '
<table width="90%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr bgcolor="#FFCC33">
	<th>Sorszám</th>
	<th>Név</th>
    <th>Mennyiség</th>
    <th>Egység</th>
    <th>Netto ár</th>
    <th>Brutto ár</th>
	<th>Leírás</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT * FROM termekek ORDER BY ID DESC LIMIT 20";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$nev = $adatok['nev'];
		$mennyiseg = $adatok['mennyiseg'];
		$egyseg = $adatok['egyseg'];
		$nettoar = $adatok['nettoar'];
		$bruttoar = $adatok['bruttoar'];
		$leiras = $adatok['leiras'];	
echo '
<tr>
	<td>' . $id . '</td>
    <td>' . $nev . '</td>
    <td>' . $mennyiseg . '</td>
    <td>' . $egyseg . '</td>
    <td>' . $nettoar . '</td>
    <td>' . $bruttoar . '</td>
	<td>' . $leiras . '</td>
	<td> <a href="termektorles.php?id='. $id.'&nev='. $nev .'">Törlés</a> | <a href="termekmodositas.php?id='.$id.'&nev='.$nev.'&mennyiseg='.$mennyiseg.'&egyseg='.$egyseg.'&nettoar='.$nettoar.'&bruttoar='.$bruttoar.'&leiras='.$leiras.'">Modosítás</a>
	</td>

</tr>';
	}
} // kereses else vége
?>
</table>
<?php
require_once('footer.php');
?>
