<?php
    include_once("../conexion/conectar.php");
    include_once("../componentes/header.php"); 
?>

<main>

  <?php

    echo "<h2 class='page-title'>Nuestros productos</h2>";
     
    if($con!=NULL){
 
        $consulta = "SELECT * FROM productos";

        $resultado = mysqli_query($con, $consulta);
    
        if ($resultado!=NULL) {
          while($filas = mysqli_fetch_array($resultado)){ 
            echo "
              <section class='product-card'>
                <img src='../imagines/".$filas['imagen']."' alt='".$filas['nombre']."' class='product-image'>
                <div class='product-info'>
                  <h3 class='product-name'>".$filas['nombre']."</h3>
                  <p class='product-price'>".$filas['precio']."</p>
                  <p class='product-description'>".$filas['descripcion']."</p>
                </div>
              </section>
            ";
          }
        }
    } else {
      echo "<h1>Algo se rompio</h1>";
    }
  ?>
</main>

<?php  
  include_once("../componentes/footer.php"); 
?>
