<?php
require('head.php');
$title = 'Felhasználó módosítása';
	if (isset($_GET['id']) && isset($_GET['nev']) && isset($_GET['irsz']) && isset($_GET['varos']) && isset($_GET['varos']) && isset($_GET['utca']) && isset($_GET['email'])){
	$id = $_GET['id'];
	$nev = $_GET['nev'];
	$irsz = $_GET['irsz'];
	$varos = $_GET['varos'];
	$utca = $_GET['utca'];
	$email = $_GET['email'];
	
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT user,pw FROM felhasznalok WHERE id='$id'";
	$lekerdezes = mysqli_query($dbc,$query);
	
	$adatok = mysqli_fetch_array($lekerdezes);

	
	$user = $adatok['user'];
	$pw = $adatok['pw'];
	
	}
?>
<h2>Felhasználó módosítása</h2>
<form id="user" name="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label>Név: </label><input type="text" size="40" name="nev" value="<?php if (isset($nev)) {echo $nev;} ?>"/> <br /><br />
    <label>Irányítószám: </label><input type="text" size="8" name="irsz" value="<?php if (isset($irsz)) {echo $irsz;} ?>"/><br /><br />
    <label>Város: </label><input type="text" size="40" name="varos" value="<?php if (isset($varos)) {echo $varos;} ?>"/><br /><br />
    <label>Utca, házszám: </label><input type="text" size="40" name="utca" value="<?php if (isset($utca)) {echo $utca;} ?>"/><br /><br />
    <label>E-mail: </label><input type="text" size="40" name="email" value="<?php if (isset($email)) {echo $email;} ?>"/><br /><br />
    <label>Felhasználónév: </label><input type="text" size="40" name="user" value="<?php if (isset($user)) {echo $user;} ?>"/><br /><br />
    <label>Jelszó: </label><input type="password" size="40" name="pw" value="<?php if (isset($pw)) {echo $pw;} ?>"/><br /><br />
    <input type="hidden" name="id" value="<?php if (isset($id)) {echo $id;} ?>" />
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
    
    
</form>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['nev']) && !empty($_POST['irsz']) && !empty($_POST['varos']) && !empty($_POST['utca']) && !empty($_POST['email']) && !empty($_POST['id']) && !empty($_POST['user']) && !empty($_POST['pw']))
		{
	$id = $_POST['id'];
	$nev = $_POST['nev'];
	$irsz = $_POST['irsz'];
	$varos = $_POST['varos'];
	$utca = $_POST['utca'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pw = $_POST['pw'];
	
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "UPDATE felhasznalok SET nev='$nev',irsz='$irsz',varos='$varos',utca='$utca',email='$email',user='$user',pw='$pw' WHERE id='$id' LIMIT 1";
	
	mysqli_query($dbc,$query);
	mysqli_close($dbc);
	  $url = 'userlista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
		}
		else {echo "Minden adat kitöltése kötelező!";}
	}
require_once('footer.php');
?>
