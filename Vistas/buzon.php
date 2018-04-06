<?php include ('head.php'); ?>
<?php include ('menu.html'); ?>
<?php include ('carrito.php'); ?>
<div class="container">
  <div class="row">
    <div id="contact">
      <div class="f-cafe">
        <h4 class="text-center">Buzón de quejas y sugerencias</h4>
        <hr>
        <h5>Escribenos! Cuentanos cómo podemos mejorar</h5>
        <form  action="index.html" method="post">
          Correo electrónico:<br>
          <input class="form-control input-sm" id="inputsm" type="text" name="email" value="" placeholder="correo electrónico">
          <br>
          Comentarios:<br>
          <textarea class="form-control input-sm" id="inputsm" name="descripcion" rows="8" cols="35"></textarea>
        </form>
        <hr>
        <p class="h5 text-center">Encuentranos en redes sociales!<br>
        &nbsp;&nbsp;
        <i class="fab fa-facebook-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <i class="fab fa-twitter-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <i class="fas fa-envelope-square"></i>&nbsp;&nbsp;
        </p>
      </div>
    </div>
  </div>
</div>

<?php include ('body.php'); ?>
<?php include ('footer.php'); ?>
