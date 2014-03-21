<?php $title = "Új felhasználó hozzáadása";
require_once('head.php');
 ?>

<h2><?php echo $title; ?></h2>
<form id="user" name="newuser" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
	<label>Név: </label><input type="text" size="40" name="nev" /> <br /><br />
    <label>Irányítószám: </label><input type="text" size="8" name="irsz" /><br /><br />
    <label>Város: </label><input type="text" size="40" name="varos" /><br /><br />
    <label>Utca, házszám: </label><input type="text" size="40" name="utca" /><br /><br />
    <label>E-mail: </label><input type="text" size="40" name="email"/><br /><br />
    <label>Felhasználónév: </label><input type="text" name="user" /><br />
    <label>Jelszó: </label><input type="password" name="pw" /><br />
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
    
    
</form>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['nev']) && !empty($_POST['irsz']) && !empty($_POST['varos']) && !empty($_POST['utca']) && !empty($_POST['email']) && !empty($_POST['user']) && !empty($_POST['pw']))
		{
	$nev = $_POST['nev'];
	$irsz = $_POST['irsz'];
	$varos = $_POST['varos'];
	$utca = $_POST['utca'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pw = $_POST['pw'];
	
	$dbc = mysqli_connect(host,user,pw,db) or die('Bukó!');
	$query = "INSERT INTO felhasznalok (nev,irsz,varos,utca,email,user,pw) VALUES ('$nev','$irsz','$varos','$utca','$email','$user','$pw')";
	mysqli_query($dbc,"SET NAMES utf8");
	mysqli_query($dbc,$query);
	
	$url = 'userlista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
	
	}
	else {echo "Minden adatot ki kell tölteni!";}
	}
require_once('footer.php');
?>
