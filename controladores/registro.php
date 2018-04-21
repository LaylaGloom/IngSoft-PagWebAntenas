<?php
include ('connection.php'); 
include ('funciones.php');
$errors = array();

if (isset($_POST['enviar'])) {
	
	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$apellido = $mysqli->real_escape_string($_POST['apellido']);
	$correo = $mysqli->real_escape_string($_POST['correo']);
	$contraseña = $mysqli->real_escape_string($_POST['contraseña']);
	$con_contraseña = $mysqli->real_escape_string($_POST['con_contraseña']);
	$numero = $mysqli->real_escape_string($_POST['numero']);

	if (isNull($nombre, $apellido, $contraseña, $con_contraseña, $correo, $numero)) {
		$errors[]="Rellena todos los campos";
		
	}
	if(!isEmail($correo)){
		$errors[]="Dirección $correo invalida";
		
	}
	if(!validatePassword($contraseña, $con_contraseña)){
		$errors[]="Las contraseñas no coinciden";
		
	}
	if (emailExist($correo)) {
		$errors[]="El correo $correo ya existe";
	}
	if (minMax(10, 10, $numero)){
		$errors[]="El número tiene que ser de 10 digitos";
	}

	if(count($errors)==0){
		$token = generateToken();
		$register = registerUser($nombre, $apellido, $contraseña, $correo, $numero, $token);
		if($register > 0){
			echo "exito";
			header("location: ../Cliente/login.php");
		}else{

			$errors[]="Error al enviar datos";
		}
	}
}
?>