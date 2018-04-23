 <?php include ('head.php'); ?>
 <?php include ('menu.php'); ?>
 <?php include ('../../controladores/usuario.php'); ?>
 <?php include ('carrito.php'); ?>
 <div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-9 col-sm-12 form-reg">
      <div class="f-cafe">

      	<h2>Peril de Usuario</h2>

      	<br>
      	<br>
      	
      	<span for="nombre"><strong>Nombre:</strong></span>
      	<p name="nombre">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre_cliente'];?></p>

      	<span for="apellido"><strong>Apellido:</strong></span>
      	<p name="Apellido">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['apellido'];?></p>

      	<span for="correo"><strong>Correo Electrónico:</strong></span>
      	<p name="correo">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['correo'];?></p>

      	<span for="numero"><strong>Número Telefónico:</strong></span>
      	<p name="numero">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['telefono'];?></p>

      	<br>
      	<br>
   		
   		<p align="center"><strong><a href="changepsw.php">Cambiar Contraseña</a></strong> | <strong><a href="../../controladores/logout.php">Cerrar Sesión</a></strong></p>
   		
   		<?php echo resultBlock($errors); ?>
      </div>
    </div>
  </div>
</div>
 <?php include ('body.php'); ?>
 <?php include ('footer.php'); ?>