<?php $title = "Felhasználó lista";
require_once('head.php');
 ?>
 <h2><?php echo $title; ?></h2>
<div align="center">
	<form name="userkereses" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Keresés</label><input type="text" name="keresomezo"  value="<?php if (isset($_POST['keres'])) {echo $_POST['keresomezo'];} ?>"/>
    <input type="submit" name="keres" value="Keresés" />
    <a href="userlista.php"><input type="button" name="megsem" value="Alaphelyzet" /></a>
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
    <th>Irányítószám</th>
    <th>Város</th>
    <th>Utca, házszám</th>
    <th>E-mail</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem jött be!');
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT * FROM felhasznalok WHERE id LIKE '%" . $feltetel . "%' OR nev LIKE '%" . $feltetel . "%' OR irsz LIKE  '%" . $feltetel . "%' OR varos LIKE '%" . $feltetel . "%' OR utca LIKE '%" . $feltetel . "%' OR email LIKE '%" . $feltetel . "%'";
	$lekerdezes = mysqli_query($dbc,$query);
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$nev = $adatok['nev'];
		$irsz = $adatok['irsz'];
		$varos = $adatok['varos'];
		$utca = $adatok['utca'];
		$email = $adatok['email'];	
echo '
<tr>
	<td>' . $id . '</td>
    <td>' . $nev . '</td>
    <td>' . $irsz . '</td>
    <td>' . $varos . '</td>
    <td>' . $utca . '</td>
    <td>' . $email . '</td>
	<td><a href="usertorles.php?id=' . $id . '&nev=' . $nev . '">Törlés</a> | <a href="usermodositas.php?id=' . $id . '&nev=' . $nev . '&irsz=' . $irsz . '&varos=' . $varos . '&utca=' . $utca . '&email=' . $email . '">Módosítás</a>
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
    <th>Irányítószám</th>
    <th>Város</th>
    <th>Utca, házszám</th>
    <th>E-mail</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT * FROM felhasznalok ORDER BY ID DESC LIMIT 20";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$nev = $adatok['nev'];
		$irsz = $adatok['irsz'];
		$varos = $adatok['varos'];
		$utca = $adatok['utca'];
		$email = $adatok['email'];	
	
echo '
<tr>
	<td>' . $id . '</td>
    <td>' . $nev . '</td>
    <td>' . $irsz . '</td>
    <td>' . $varos . '</td>
    <td>' . $utca . '</td>
    <td>' . $email . '</td>
	<td><a href="usertorles.php?id=' . $id . '&nev=' . $nev . '">Törlés</a> | <a href="usermodositas.php?id=' . $id . '&nev=' . $nev . '&irsz=' . $irsz . '&varos=' . $varos . '&utca=' . $utca . '&email=' . $email . '">Módosítás</a></td>

</tr>';
	}
}
?>
</table>
<?php
require_once('footer.php');
?>
