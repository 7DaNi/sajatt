<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Szakdolgozat</title>
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="banner.js"></script>
</head>
<body>
<div id="swf_content">
	<p>Frissítés alatt.</p>
</div>
<?php
session_start ();
require_once ('head.php');
if (isset ( $_GET ['nev'] )) {
	$nev = $_GET ['nev'];
	$_SESSION ["nev"] = $nev;
}
if (isset ( $_POST ["belepes"] )) {
	$user = $_POST ["user"];
	$pw = $_POST ["pw"];
	$dbc = mysqli_connect ( host, user, pw, db );
	mysqli_query ( $dbc, "SET NAME utf8" );
	$query = "SELECT * FROM userek WHERE user='$user' AND pw='$pw'";
	$data = mysqli_query ( $dbc, $query );
	
	if (mysqli_num_rows ( $data ) == 1) {
		$adatok = mysqli_fetch_array ( $data );
		$user = $adatok ["user"];
		$pw = $adatok ["pw"];
		$rang = $adatok ["rang"];
		$nev = $adatok ["nev"];
		$_SESSION ["user"] = $user;
		$_SESSION ["pw"] = $pw;
		$_SESSION ["rang"] = $rang;
		$_SESSION ["nev"] = $nev;
		if (isset ( $_SESSION ["rang"] ) && $_SESSION ["rang"] == 1) {
			header ( 'location: fooldal.php' );
			exit ();
		} else if (isset ( $_SESSION ["rang"] ) && $_SESSION ["rang"] == 2) {
			header ( 'location: rendeleskezelo.php' );
			exit ();
		} else if (isset ( $_SESSION ["rang"] ) && $_SESSION ["rang"] == 3) {
			header ( 'location: admin.php' );
			exit ();
		}
	} else {
		echo "Nincs megfelelő rangja!";
		exit ();
	}
}
{//ez az encapsulation direkt van itt?
	if (! isset ( $_SESSION ["user"] ) || ! isset ( $_SESSION ["pw"] )) {
		echo '<form id=login name="login" method="post" action="' . $_SERVER ['PHP_SELF'] . '">
 			<label>BEJELENTKEZÉS</label><br /><br /><br />
 			<input type="text" name="user" title="Felhasználónév" placeholder="Felhasználónév"/><br /><br />
 			<input type="password" name="pw" title="Jelszó" placeholder="Jelszó"/><br /><br />
			<input  value="Belépés" name="belepes" id="belepes" class="button green" title="Belépés" type="submit">
			<a href="regisztracio.php" id="regisztracio" class="button red">Regisztráció</a>
			<a href="jelszoemlek.php" id="jelszoemlek">Elfelejtetted a jelszavad?</a>
			</form>';
		exit ();
	} else {
		echo '<form id=adat name="adat" method="post" action="' . $_SERVER ['PHP_SELF'] . '">
 			<label>ADATAIM</label><br /><br /><br />
 			<label>Üdvözöljük</label><br /><br />
 			<label>' . utf8_encode ( $_SESSION ["nev"] ) . '</label><br /><br />
			<a href="adatmodositas.php" id="adatmodositas" class="button red">Adatmódosítás</a>
			<a href="ujcim.php" id="ujcim" class="button red">Új cím</a>
			<a href="logout_session.php" id="kilepes" class="button red2">Kilépés</a>
			</form>';
		exit ();
	}
}
require_once ('footer.php');
?>  
</body>
</html>