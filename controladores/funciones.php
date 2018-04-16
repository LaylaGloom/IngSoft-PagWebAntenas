<?php

function isNull($nombre, $apellido, $contraseña, $confirmar, $correo, $numero){
	if (strlen(trim($nombre)) < 1 || strlen(trim($apellido)) < 1 || strlen(trim($contraseña)) < 1 || strlen(trim($confirmar)) < 1 || strlen(trim($correo)) < 1 || strlen(trim($numero)) < 1) {
		return true;
	}else{
		return false;
	}

}

function isEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		return true;
	}else{
		return false;
	}
}

function validatePassword($var1, $var2){
	if(strcmp($var1, $var2) != 0){
		return false;
	}else{
		return true;
	}
}

function minMax($min, $max, $valor){
	if (strlen(trim($valor)) < $min) {
		return true;
	}elseif (strlen(trim($valor < $max))) {
		return true;
	}else{
		return false;
	}
}

function emailExist($email){
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT idCliente FROM clientes WHERE email = ? LIMIT 1;");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if($num > 0){
		return true;
	}else{
		return false;
	}

}
function generateToken(){
	$tokenGen = md5(uniqid(mt_rand(), false));
	return $tokenGen;
}


function registerUser($nombre, $apellido, $contraseña, $correo, $numero, $token){
	global $mysqli;

	$contraseña_hash = hash('sha256', $contraseña);
	
	$stmt = $mysqli->prepare("INSERT INTO clientes (nombres, apellidos, email, contraseña, telefono, token) VALUES (?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("ssssss", $nombre, $apellido, $correo, $contraseña_hash, $numero, $token);
	
	

	if($stmt->execute()){
		return $mysqli->insert_id;
		$stmt->close();
	}else{
		return 0;
		$stmt->close();
	}

}

function resultBlock($errors){
	if(count($errors)>0){
		echo "<div id='error' class='alert alert-danger' role='alert'>
		<a href='#' onclick=\"showHide('error');\">[x]</a>
		<ul>";
		foreach ($errors as $error) {
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}

}



?>

