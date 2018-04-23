 <?php
require '../../controladores/connection.php';

?>


<div class="container">
  <div class="row">


    <?php

    require_once '../../controladores/Zebra_Pagination.php';

    global $mysqli;


    $productos = mysqli_query($mysqli, "SELECT * FROM producto");
    $num_registros = mysqli_num_rows($productos);

    $resultados_x_pagina = 4;

    $paginacion;

    $paginacion = new Zebra_Pagination();
    $paginacion -> records($num_registros);
    $paginacion -> records_per_page($resultados_x_pagina);


    $filtro = 'SELECT * FROM producto order by idproducto DESC LIMIT ' .(($paginacion->get_page() - 1) * $resultados_x_pagina).','.$resultados_x_pagina;
    $result = mysqli_query($mysqli, $filtro);


    while($row =mysqli_fetch_array($result))
    {

      echo '<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">';
      echo '<div class="card h-100">';
      echo '<a href="#"><img class="card-img-top" src="'.$row['img_path'].'" alt=""></a>';
      echo '<div class="card-body">'; 
        echo '<h4 class="card-title">';
        echo '<a href="producto.php?id='.$row['idproducto'].'">'; echo $row['nombreProducto']; echo '</a>';
        echo '</h4>';
      echo ' <p class="card-text">';  echo substr($row['descripcion'], 0 , 150). '.....';  echo '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';


    }




      ?>



<!-- row de muestra


        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="../../recursos/images/antena.png" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="verproduct.php">Project One</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div> 

        -->
      </div> 

  <?php 
    $paginacion->render();  ?>
</div>
