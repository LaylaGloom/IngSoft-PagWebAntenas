<?php
session_start();
include ('connection.php');
if(isset($_POST['ingresar'])){
  if ((isset($_POST['correo'])) && (isset($_POST['contraseña']))) {
    $email = $_POST['correo'];
    $passw = $_POST['contraseña'];
    $contraseña_hash = hash('sha256', $passw);
    try{
      $query = "SELECT * FROM clientes WHERE email ='".$email."' AND contraseña = '".$contraseña_hash."';";
      $execute = $mysqli->query($query);
      $row = $execute->fetch_array();
    }
    catch(mysqli_sql_exception $e){
      throw $e;
    }
  }else{
      echo "rellena los campos";
  }

  if(($email == $row['email']) && ($contraseña_hash == $row['contraseña'])){
    $_SESSION['username']=$row['nombres'];
    header("location: ../Vistas/Cliente/home.php");
  }
  else{
    header("location: ../Vistas/Cliente/login.php");
    echo "<p>El correo electrónico o la contraseña son incorrectos</p>";

  }
}
else{
  echo "rellena los campos";
	header("location: ../Vistas/Cliente/login.php");
}
?>
