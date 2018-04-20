<?php 
include ('connection.php'); 
include ('funciones.php');
if (!isset($_SESSION)){
session_start();
$errors = array();
if(isset($_POST['ingresar'])){
  
  $email = $mysqli->real_escape_string($_POST['correo']);
  $passw = $mysqli->real_escape_string($_POST['contraseña']);
  if(isNullLogin($email, $passw)){
    $errors[]="Rellene todos los campos";
  }
  $errors[]=login($email, $passw);  
 }
}
?>

