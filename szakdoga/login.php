<?php
	session_start();
	require_once('connect.php');
	
	if(isset($_POST["belepes"])){
		$user = $_POST["user"];
		$pw = $_POST["pw"];
		
		$dbc = mysqli_connect(host,user,pw,db);
		mysqli_query($dbc,"SET NAME utf8");
		$query = "SELECT * FROM felhasznalok WHERE user='$user' AND pw='$pw'";
		$data = mysqli_query($dbc,$query);
		
		if(mysqli_num_rows($data)==1){
			$adatok = mysqli_fetch_array($data);
			$user = $adatok["user"];
			$pw = $adatok["pw"];
			$felhasznalo = $adatok["nev"];
			
			//session be alitasa
			
			$_SESSION["user"]=$user;
			$_SESSION["pw"]=$pw;
			$_SESSION["felhasznalo"]=$felhasznalo;
		}
		else{
			echo "Nem megfelelo felhasznalo nev vagy jelszo";
			exit();
		}
	}else{
 		if(!isset($_SESSION["user"]) || !isset($_SESSION["pw"])){
			echo '<form name="login" method="post" action="'.$_SERVER['PHP_SELF'].'">
				<label>Username: </label><input type="text" name="user"/><br />
				<label>Password: </label><input type="password" name="pw"/><br />
				<input type="submit" name="belepes" value="Login" />
			</form>';
			exit();
		}
	}
require_once("footer.php");
?>