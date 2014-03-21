<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="szakdolgozat">
<title>Főoldal</title>
<meta http-equiv="content-language" content="hu">
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="banner.js"></script>
</head>
<body>
<div id="swf_content">
	<p>Frissítés alatt.</p>
</div>
<?php
session_start();
require_once('head.php');
if (isset($_GET['nev'])){
	$nev = $_GET['nev'];
	$_SESSION["nev"]=$nev;
	}

	if(isset($_POST["belepes"])){
		$user = $_POST["user"];
		$pw = $_POST["pw"];
		
		$dbc = mysqli_connect(host,user,pw,db);
		mysqli_query($dbc,"SET NAME utf8");
		$query = "SELECT * FROM userek WHERE user='$user' AND pw='$pw'";
		$data = mysqli_query($dbc,$query);
		
		if(mysqli_num_rows($data)==1){
			$adatok = mysqli_fetch_array($data);
			$user = $adatok["user"];
			$pw = $adatok["pw"];
			$rang = $adatok["rang"];
			$nev = $adatok["nev"];
			
			
			$_SESSION["user"]=$user;
			$_SESSION["pw"]=$pw;
			$_SESSION["rang"]=$rang;
			$_SESSION["nev"]=$nev;
			if(isset( $_SESSION["rang"] ) && $_SESSION["rang"] == 1){
				header('location: fooldal.php');
				exit();
			}
			else if(isset( $_SESSION["rang"] ) && $_SESSION["rang"] == 2){
				header('location: rendeleskezelo.php');
				exit();
			}
			else if(isset( $_SESSION["rang"] ) && $_SESSION["rang"] == 3){
				header('location: admin.php');
				exit();
			}
		}
		else{echo "Nincs megfelelő rangja!";
			exit();
		}}else{
 		if(!isset($_SESSION["user"]) || !isset($_SESSION["pw"])){
			echo '<form id=login name="login" method="post" action="'.$_SERVER['PHP_SELF'].'">
 <label>BEJELENTKEZÉS</label><br /><br /><br />
 <input type="text" name="user" title="Felhasználónév" placeholder="Felhasználónév"/><br /><br />
 <input type="password" name="pw" title="Jelszó" placeholder="Jelszó"/><br /><br />
<input  value="Belépés" name="belepes" id="belepes" class="button green" title="Belépés" type="submit">
<a href="regisztracio.php" id="regisztracio" class="button red">Regisztráció</a>
<a href="jelszoemlek.php" id="jelszoemlek">Elfelejtetted a jelszavad?</a>
			</form>';
			exit();
		}
		else{
			echo '<form id=adat name="adat" method="post" action="'.$_SERVER['PHP_SELF'].'">
 <label>ADATAIM</label><br /><br /><br />
 <label>Üdvözöljük</label><br /><br />
 <label>' . utf8_encode($_SESSION["nev"]) . '</label><br /><br />
<a href="adatmodositas.php" id="adatmodositas" class="button red">Adatmódosítás</a>
<a href="ujcim.php" id="ujcim" class="button red">Új cím</a>
<a href="logout_session.php" id="kilepes" class="button red2">Kilépés</a>
</form>';
			exit();
			




		}
	}
require_once('footer.php');
?>  
</body>
</html>

<!--?>-->


<!--<div align="center">
	<form name="termekkereses" action="<?php// $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Keresés</label><input type="text" name="keresomezo"  value="<?php// if (isset($_POST['keres'])) {echo $_POST['keresomezo'];} ?>"/>
    <input type="submit" name="keres" value="Keresés" />
    <a href="termeklista.php"><input type="button" name="megsem" value="Alaphelyzet" /></a>
    </form>
</div>
<?php/*
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
*/?>
<!--</table>-->