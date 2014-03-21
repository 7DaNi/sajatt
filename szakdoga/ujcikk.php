<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>-->
<?php $title = "Új cikk hozzáadása";
require_once('head.php');
 ?>

<h2><?php echo $title; ?></h2>
<form id="reg" name="reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
	<label>Cím: </label><input type="text" size="40" name="cim" /> <br /><br />
    <label>Tartalom: </label><textarea type="text" rows="20" cols="50" name="tartalom"></textarea><br /><br />
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
    
    
</form>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['cim']) && !empty($_POST['tartalom']))
		{
	$cim = $_POST['cim'];
	$tartalom = $_POST['tartalom'];
	
	

	//adatbázisba írás
	
	$dbc = mysqli_connect(host,user,pw,db) or die('Bukó!');
	$query = "INSERT INTO cikkek (cim,tartalom) VALUES ('$cim','$tartalom')";
	mysqli_query($dbc,"SET NAMES utf8");
	mysqli_query($dbc,$query);
	 $url = 'cikklista.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
	}
	else {echo "Minden adatot ki kell tölteni!";}
	}
require_once('footer.php');
?>

