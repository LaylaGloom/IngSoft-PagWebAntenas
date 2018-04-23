<?php 
$server = "127.0.0.1";
$user = "root";
$password = "coffee";
$bd = "antena";
try {
	$mysqli = new mysqli($server, $user, $password, $bd);
	$mysqli->set_charset("utf8");
} catch (mysqli_sql_exception $e) {
    throw $e;
    echo "Error: "+$e;
} 
?>


