<?php include '../../controladores/login.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Antenas Inc
          <img class="img-small" src="../recursos/images/antinc.png" alt="Brand"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Catalogo
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php">Contáctanos!</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="buzon.php">Buzón de sugerencias</a>
            </li>
            <li class="nav-item">
              <?php
                if (!isset($_SESSION)) {
              ?>
                  <a class='nav-link' href='login.php'>Iniciar sesión</a>
              <?php
                }elseif(isset($_SESSION['nombre_cliente'])){
              ?>
                  <a class="nav-link" href="usuario.php"><?php echo $_SESSION['nombre_cliente']?></a>
              <?php
                }else{
              ?>
                  <a class="nav-link" href="login.php">Iniciar sesión</a>
              <?php
                }
              ?>
            </li>
            <li class="nav-item">
              <a id="cd-cart-trigger" class="nav-link" href="#"><i class="fas fa-shopping-cart"></i>Mi carrito</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
