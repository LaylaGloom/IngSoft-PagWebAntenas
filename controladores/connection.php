<?php 
$server = "127.0.0.1";
$user = "root";
$password = "coffee";
$bd = "Antena";
try {
	$mysqli = new mysqli($server, $user, $password, $bd);
} catch (mysqli_sql_exception $e) {
    throw $e;
    echo "Error: "+$e;
} 
?>


