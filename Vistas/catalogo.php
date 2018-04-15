 <?php
require '../php/conexion.php';

?>


<div class="container">
  <div class="row">


    <?php

    global $mysqli;


    $productos = mysqli_query($mysqli, "SELECT * FROM producto");


    while($row =mysqli_fetch_array($productos)) 
    {

      echo '<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">';
      echo '<div class="card h-100">';
      echo '<a href="#"><img class="card-img-top" src="../recursos/images/antena.png" alt=""></a>';
      echo '<div class="card-body">';
        echo '<h4 class="card-title">';
        echo '<a href="producto.php?id='.$row['idproducto'].'">'; echo $row['nombreProducto']; echo '</a>';
        echo '</h4>';
      echo ' <p class="card-text">';  echo substr($row['descripcion'], 0 , 180). '.....';  echo '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';


    }






      ?>

      




        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="../recursos/images/antena.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="verproduct.php">Project One</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>
      

      
      
       
      
      
       


       
      </div> <!-- acaba una row -->
</div>
