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

function sendEmail($correo, $nombre, $asunto, $cuerpo){

	//FUNCION PARA ENVIAR CORREO

    require_once 'Antenas/componentes/email/PHPMailer';
	require_once 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer();
	
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	
	$mail->Username = 'antenas.clientes@gmail.com'; //Correo de donde enviaremos los correos
	$mail->Password = 'Antenas.'; // Password de la cuenta de envío
	
	$mail->setFrom('antenas.clientes@gmail.com', 'Sistemas de Usuario');
	$mail->addAddress($correo, $nombre); //Correo receptor
	
	
	$mail->Subject = $asunto;
	$mail->Body    = $cuerpo;
	
	if($mail->send()) {
		echo 'Correo Enviado';
		} else {
		echo 'Error al enviar correo';
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

function isNullLogin($correo, $contraseña){
	if (strlen(trim($correo)) < 1 || strlen(trim($contraseña)) < 1 ) {
		return true;
	}else{
		return false;
	}
}

function login($correo, $contraseña){

	session_start();

	global $mysqli;
	$errors='';
	$stmt = $mysqli->prepare("SELECT idCliente, contraseña, nombres FROM clientes WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $correo);
	$stmt->execute();
	$stmt->store_result();
	$rows=$stmt->num_rows;

	if ($rows > 0) {
			$stmt->bind_result($id, $password, $nombre);
			$stmt->fetch();

			$contraseña_hash = hash('sha256', $contraseña);

			if ($contraseña_hash==$password) {
				lastSession($id);
				$_SESSION['nombre_cliente']=$nombre;
				echo $_SESSION['nombre_cliente'];
				$_SESSION['id_usuario']=$id;
				header("location: ../Cliente/home.php");
			}else{
				$errors = "La contraseña es incorrecta";
			}		
	}else{
		$errors = "El correo electrónico no existe";
	}
	return $errors;
}

function lastSession($id){
	global $mysqli;
	$stmt = $mysqli->prepare("UPDATE clientes SET last_session=NOW(), token_password='', password_request=1 WHERE idCliente = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$stmt->close();  
}

function isActivo($correo){

	//CORREO DE ACTIVACION

	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activacion FROM clientes WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $correo);
	$stmt->execute();
	$stmt->bind_result($activacion);
	$stmt->fetch();
	if ($activacion == 1) {
		return true; 
	}else{
		return false;
	}
}


?>

