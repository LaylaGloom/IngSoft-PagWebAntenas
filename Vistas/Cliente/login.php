<?php include ('head.php'); ?>
<?php include ('menu.html'); ?>
<?php include ('carrito.php'); ?>
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-12 form-reg">

      <div class="f-cafe">
        <h4 class="text-center">Iniciar Sesión</h4>
        <hr>
        <label for="nombre">Nombre:</label>
        <input class="form-control input-sm" id="inputsm" type="text" name="nombre" value="">
        <label for="apellidos">Contraseña:</label>
        <input class="form-control input-sm" id="inputsm" type="password" name="apellidos" value="">
        <br>
        <input class="btn btn-center" type="submit" name="" value="Iniciar Sesión">
        <p>¿No estás registrado aún? <a href="registro.php">Registrate!</a></p>
      </div>
    </div>

</div>

<?php include ('body.php'); ?>
<?php include ('footer.php'); ?>
