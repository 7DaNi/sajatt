<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jelszó emlékeztető</title>
</head>
<body>
<?php
if (isset ( $_POST ["email"] )) {
	$con = mysqli_connect ( "localhost", "root", "", "szakdoga" );
	if (mysqli_num_rows ( mysqli_query ( $con, "SELECT email FROM userek WHERE email = '" . $_POST ["email"] . "'" ) ) == 1) {
		echo "successs";
		mail ( $_POST ["email"], "működik", "működik" );
	} else
		echo "falióra";
} else {
	echo '<form action="jelszoemlek.php" method="post">
		<input type="text" name="email">
		<input type="submit">
		</form>';
}
?>
</body>
</html>
