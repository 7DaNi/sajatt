<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="szakdolgozat">
<title>Regisztráció</title>
<meta http-equiv="content-language" content="hu">
<script language=JavaScript src="ellenor.js"></script>
</head>

<body>
<?php
session_start();
require_once('head.php');
?><div id="reg">
<h2>Regisztráció</h2>
<form id="reg" name="reg" method="post" onSubmit="javascript:ellenoriz()" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<ul>	
    <li><label>Teljes név: </label><input type="text" size="50" name="nev" /></li>
    <li><label>Felhasználónév: </label><input type="text" size="50" name="user" /></li>
    <li><label>Jelszó: </label><input type="password" size="50" name="pw1" /></li>
    <li><label>Jelszó újra: </label><input type="text" size="50" name="pw2" /></li>
    <li><label>Telefonszám: </label><input type="text" size="50" name="telszam"/></li>
    <li><label>Email: </label><input type="text" name="email" /></li>
     <input type="hidden" name="rang" value="1" />
    <input type="submit" name="kuldes" id="reg_button" value="REGISZTRÁCIÓ" />
    <input type="reset" name="torles" id="torles_button" value="TÖRLÉS" />
    <input type="button" name="vissza" id="back_button" value="VISSZA" onClick="history.back()" />
</ul>     
</form>
 
</div>
<?php

	if (isset($_POST['kuldes'])){
		if (!empty($_POST['nev']) && !empty($_POST['user']) && !empty($_POST['pw1']) && !empty($_POST['pw2']) && !empty($_POST['telszam']) && !empty($_POST['email']) &&!empty($_POST['rang']))
		{
	$nev = $_POST['nev'];
	$user = $_POST['user'];
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	$telszam = $_POST['telszam'];
	$email = $_POST['email'];
	$rang = $_POST['rang'];
	
	
	$dbc = mysqli_connect(host,user,pw,db) or die('Bukó!');
	$query = "INSERT INTO userek (nev,user,pw,telszam,email,rang) VALUES ('$nev','$user','$pw1','$telszam','$email','$rang')";
	mysqli_query($dbc,"SET NAMES utf8");
	mysqli_query($dbc,$query);
	
	$_SESSION["user"]=$user;
	$_SESSION["pw"]=$pw1;
		
	$url = 'fooldal.php?nev='.$nev.'';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
	// adatátadás
	
	/* echo "<a href='regmodositas.php?nev=" . $nev . "&irsz=" . $irsz . "&varos=" . $varos . "&utca=" . $utca . "&email=" . $email . "'>Módosítás</a>";*/ 
	}
	else {
		echo "Valamelyik adat hibás!";
		}
	}

require_once('footer.php');
?>
</body>
</html>
