
<?php include ('head.php'); ?>
<?php include ('menu.php'); ?>
<?php include ('carrito.php'); ?>
<?php include ('buscador.php'); ?>

<?php

  require '../../controladores/connection.php';

  
  if(!empty($_GET))
  {

    $id = $_GET['id'];
    global $mysqli;

    $producto = mysqli_query($mysqli, "SELECT * FROM producto WHERE idproducto='$id'");


    $id_pro = "";
    $precio = "";
    $nombre = "";
    $desc = "";
    $modelo = "";
    $marca = "";


    while ($row = mysqli_fetch_array($producto)) {

      $id_pro = $row['idproducto'];
      $precio = $row['precio'];
      $nombre = $row['nombreProducto'];
      $desc = $row['descripcion'];
      $modelo = $row['modelo'];
      $marca = $row['marca'];
      $cantidad = $row['cantidad'];
      $img = $row['img_path'];

    }

  }




  ?> 


<div class="container">

      <div class="row">

        <div class="col-lg-2">

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-8">

          <div class="card mt-4">
            <img class="card-img-top img-fluid " src=<?php echo $img;  ?> alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $nombre; ?> <small>id: <?php echo $id;  ?></small> </h3>
              <h4>$<?php echo $precio;  ?></h4>
              <p class="card-text">  <?php echo $desc;  ?></p>
              <p>Modelo:  <?php echo $modelo;  ?></p>
              <p>Marca:  <?php echo $marca;  ?></p>

              <?php if($cantidad > 0)
              {
                echo '<h5>Estado: <small>Disponible</small></h5>';

              } else 
              {
                echo '<h5>Estado: <small>Sin Stock</small></h5>';
              } 

               ?>

              
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
            <div class="row">

              <?php
                if($cantidad > 0)
                {
                  echo '<a href="#" class="btn btn-center">Agregar al carrito</a>';

                }else
                {
                  echo '<a href="#" class="btn btn-center">Sin Stock :(</a>';

                }

                ?>

              
            </div>
          </div>
          <div class="row">

          </div>

          <!-- /.card -->

          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>



<?php include ('body.php'); ?>
<?php include ('footer.php'); ?>
