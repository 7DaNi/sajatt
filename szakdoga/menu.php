<div id="menu">

<ul>

	<!--<li>Belépve: <span style="color:#FC3;"><?php// echo utf8_encode($_SESSION["felhasznalo"]); ?></li>-->
	
    
	<li><a href="ujuser.php">PIZZÁK</a></li>
    
    <li><a href="userlista.php">SALÁTÁK</a></li>
    
    <li><a href="ujtermek.php">DESSZERTEK</a></li>
    
    <li><a href="termeklista.php">ÜDÍTŐK</a></li>
    
    <li><a href="ujcikk.php">KIEGÉSZÍTŐK</a></li>
    
   <!-- <li><a href="cikklista.php">Cikk lista</a></li>
    
    <li><a href="logout_session.php">Kilépés</a></li>-->
</ul>
</div>
<?php
if(!isset($_SESSION["user"]) && !isset($_SESSION["pw"])){
echo '<div id="teteje">
<a href="fooldal.php">Főoldal</a>
</div>';

}else{
	echo '<div id="teteje">
<a href="fooldal.php">Főoldal</a>I
<a href="logout_session.php">Kilépés</a>
</div>';
}
?>
<br />