<?php include ('head.php'); ?>
<?php include ('menu.php'); ?>
<?php include ('carrito.php'); ?>
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-12 form-reg">

      <div class="f-cafe">
        <h4 class="text-center">Iniciar Sesión</h4>
        <hr>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
          <label for="nombre">Correo Electrónico:</label>
          <input class="form-control input-sm" id="inputsm" type="email" name="correo" value="" placeholder="ejemplo@algo.com" required="Ingresa tu correo electrónico">
          <label for="contraseña">Contraseña:</label>
          <input class="form-control input-sm" id="inputsm" type="password" name="contraseña" value="" required="Ingresa tu contraseña">
          <br>
          <input class="btn btn-center" type="submit" name="ingresar" value="Iniciar Sesión">
        </form>
        <p>¿No estás registrado aún? <a href="registro.php">Registrate!</a></p>
        <?php echo resultBlock($errors); ?>
      </div>
    </div>

</div>

<?php include ('body.php'); ?>
<?php include ('footer.php'); ?>
