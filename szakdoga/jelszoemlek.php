<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elfelejtett jelszó</title>
</head>

<body>
<?php
require_once('head.php');
?>
<div id="jelszoemlek">
<h2>Elfelejtett jelszó</h2>
<form id="jelszoemlek" name="jelszoemlek" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<ul>
    <li><label>Kérlek add meg azt az Email címet,</label></li>
    <li><label>amivel korábban nálunk regisztráltál,</label></li>
    <li><label>erre küldjük hamarosan az </label></li>
    <li><label>emlékeztetőt.</label><br /></li>
	<li><input type="text" name="email" title="Email" placeholder="Email"/></li>
    <input type="submit" name="kuldes" value="Küldés" class="button green" /> 
</ul>   
</form>
</div>
<?php if(isset($_POST["kuldes"]) /*&& isset($_POST["email"])*/)
{
	
	
	//$email = $_POST["email"];
	

/*	$dbc = mysqli_connect(host,user,pw,db);
		mysqli_query($dbc,"SET NAME utf8");
		$query = "SELECT * FROM userek WHERE email='$email'";
		$data = mysqli_query($dbc,$query);
		
		if(mysqli_num_rows($data)==1){
			$adatok = mysqli_fetch_array($data);
			$email = $adatok["email"];
			$nev = $adatok["nev"];
			$user = $adatok["user"];
			$pw = $adatok["pw"];
			
			$targy="Pizzarendelő elfelejtett adatok";
			
$header = "MIME-Version: 1.0\n";
$header .= "Content-Type: text/html; charset=utf8\n";
$header .= "From: Szakdoga <pizzarendelo@szakdoga.hu>\n";
$header .= "Errors-to: 93mufan@gmail.com\n";
mb_internal_encoding("UTF-8");
$targy = mb_encode_mimeheader($targy, "UTF-8", "Q");
$content = "<html><head><title>$targy</title></head><body>Kedves utf8_encode($nev),</br> 
       ezen az e-mail címen az alábbi adatokkal regisztráltál:</br>
  felhasználónév: utf8_encode($user)
  jelszó: utf8_encode($pw)</br></br>
  Pizzarendelő szakdoga</body></html>";
  echo $content;
mail($email, $targy, $content, $header);
*/
$url = 'fooldal.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
		}
	     else{
			 exit();
		 }
require_once('footer.php');
?>
</body>
</html>