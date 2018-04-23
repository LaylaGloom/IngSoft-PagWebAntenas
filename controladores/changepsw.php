<?php
include ('connection.php');
include ('funciones.php');

@session_start();
$errors = array();
if(isset($_POST['cambiar'])){
  
  $contraseña_act = $mysqli->real_escape_string($_POST['contraseña_actual']);
  $contraseña_nuv = $mysqli->real_escape_string($_POST['contraseña_nueva']);
  $contraseña_conf = $mysqli->real_escape_string($_POST['contraseña_confirmar']);

  if(isNullPsw($contraseña_conf, $contraseña_nuv, $contraseña_act)){
  	$errors[]="Rellene todos los campos";
  }
  if(minMax(5, 10, $contraseña_nuv)){
  	$errors[]="El campo Contraseña Nueva debe tener al mínimo 6 caracteres y máximo 9";
  }
  if(minMax(5, 10, $contraseña_conf)){
  	$errors[]="El campo Confirmar contraseña nueva debe tener al mínimo 6 caracteres y máximo 9";
  }

  if(!validatePassword($contraseña_nuv, $contraseña_conf)){
	$errors[]="Las contraseñas no coinciden";
  }
  if($contraseña_act==$contraseña_nuv){
  	$errors[]="La contraseña debe ser diferente a la actual";

  }

  if(count($errors)==0){
 
 	global $mysqli;

	$stmt = $mysqli->prepare("SELECT idCliente, contraseña FROM clientes WHERE idCliente = ? LIMIT 1");
	$stmt->bind_param("s", $_SESSION['id_usuario']);
	$stmt->execute();
	$stmt->store_result();
	$rows=$stmt->num_rows;

	if ($rows > 0) {
			$stmt->bind_result($id, $password);
			$stmt->fetch();

			$contraseña_hash = hash('sha256', $contraseña_act);

			if ($contraseña_hash==$password) {

				$contraseña_nueva_hash = hash('sha256', $contraseña_nuv);

				$stmt = $mysqli->prepare("UPDATE clientes SET contraseña = ? WHERE idCliente = ? LIMIT 1");
				$stmt->bind_param("ss", $contraseña_nueva_hash, $_SESSION['id_usuario']);
				$stmt->execute();
				$stmt->close();  

				header("location: usuario.php");
				
			}else{
				$errors[] = "La contraseña es incorrecta";
			}		
    }
  }
}
?>