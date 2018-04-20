<?php include ('head.php'); ?>
<?php include ('menu.php'); ?>
<?php include ('carrito.php'); ?>

<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-12 form-reg">

      <div class="f-cafe">
        <h4 class="text-center">Registro</h4>
        <hr>
        <form method="POST" action="../../controladores/registro.php">
            <label for="nombre">Nombre:</label>
            <input class="form-control input-sm" id="inputsm" type="text" name="nombre" value="" required>
            <label for="apellido">Apellidos:</label>
            <input class="form-control input-sm" id="inputsm" type="text" name="apellido" value="" required>
            <label for="correo">Correo electrónico:</label>
            <input class="form-control input-sm" id="inputsm" type="email" name="correo" value="" placeholder="Ej.: ejemplo@algo.com" required>
            <label for="contraseña">Contraseña:</label>
            <input class="form-control input-sm" id="inputsm" type="password" name="contraseña" value="" required>
            <label for="con_contraseña">Confirmar contraseña:</label>
            <input class="form-control input-sm" id="inputsm" type="password" name="con_contraseña" value="" required>
            <label for="numero">Número telefónico:</label>
            <input class="form-control input-sm" id="inputsm" type="tel" name="numero" value="" placeholder="Ej.: 7712345678" minlength="10" maxlength="10" required>
            <br>
            <input class="btn btn-center" type="submit" name="enviar" value="Registarse">
        </form>
       <?php echo resultBlock($errors); ?>
      </div>
    </div>

</div>

<?php include ('body.php'); ?>
<?php include ('footer.php'); ?>
