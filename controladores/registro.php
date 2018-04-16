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
		echo "rellena los campos";
		$errors[]="rellena los campos";
		header("location: ../vistas/registro.php");
	}
	if(!isEmail($correo)){
		echo "direccion invalida";
		$errors[]="direccion invalida";
		header("location: ../vistas/registro.php");
	}
	if(!validatePassword($contraseña, $con_contraseña)){
		echo "las contraseñas no coinciden";
		$errors[]="las contraseñas no coinciden";
		header("location: ../vistas/registro.php");
	}
	if (emailExist($correo)) {
		echo "el correo '$correo' ya existe";
		$errors[]="el correo '$correo' ya existe";
		header("location: ../vistas/registro.php");
	}

	if(count($errors)==0){
		$token = generateToken();
		$register = registerUser($nombre, $apellido, $contraseña, $correo, $numero, $token);
		if($register > 0){
			echo "exito";
			header("location: ../vistas/home.php");
		}else{
			$errors[]="Error al registrar";
			header("location: ../vistas/registro.php");
			echo resultBlock($errors);
		}
	}
}
?>