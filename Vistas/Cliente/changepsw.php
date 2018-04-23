<?php include ('head.php'); ?>
<?php include ('menu.php'); ?>
<?php include ('../../controladores/changepsw.php'); ?>
<?php include ('carrito.php'); ?>
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-12 form-reg">

      <div class="f-cafe">
        <h4 class="text-center">Cambiar Contraseña</h4>
        <hr>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
          <label for="contraseña_actual">Contraseña Actual: </label>
          <input class="form-control input-sm" id="inputsm" type="password" name="contraseña_actual" value="" placeholder="Ingresa su contraseña actual" required=""><br>

          <label for="contraseña_nueva">Contraseña Nueva: </label>
          <input class="form-control input-sm" id="inputsm" type="password" name="contraseña_nueva" value="" placeholder="Ingresa una contraseña nueva" required="">
          <br>

          <label for="contraseña_confirmar">Confirmar contraseña nueva: </label>
          <input class="form-control input-sm" id="inputsm" type="password" name="contraseña_confirmar" value="" placeholder="Ingresa nuevamente su contraseña" required="">
          <br>

          <input class="btn btn-center" type="submit" name="cambiar" value="Cambiar Contraseña">
        </form>
        <?php echo resultBlock($errors); ?>
      </div>
    </div>
</div>

<?php include ('body.php'); ?>
<?php include ('footer.php'); ?>
