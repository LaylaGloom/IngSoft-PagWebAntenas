<?php
include ('connection.php');
include ('funciones.php');
@session_start();

global $mysqli;

$errors = array();

$stmt = $mysqli->prepare("SELECT apellidos, email, contraseña, telefono FROM clientes WHERE idCliente = ? LIMIT 1");
$stmt->bind_param("s", $_SESSION['id_usuario']);
$stmt->execute();
$stmt->store_result();
$rows=$stmt->num_rows;

if ($rows > 0) {
	
	$stmt->bind_result($apellido, $correo, $contraseña, $telefono);
	$stmt->fetch();

	$_SESSION['apellido'] = $apellido;
	$_SESSION['correo'] = $correo;
	$_SESSION['contraseña'] = $contraseña;
	$_SESSION['telefono'] = $telefono;

}else{
	
	$errors = "No se puedieron recuperar los datos";

}


?>