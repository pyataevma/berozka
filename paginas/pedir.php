<?php
    include_once("../conexion/conectar.php");
    include_once("../componentes/header.php");
    $id_usuario = $_SESSION['id_usuario'];
    $yapedido=array();
?>

<main>

  <?php

    echo "<h2 class='page-title'>Nuestros productos</h2>";
    
    if($con != NULL){
       $consulta = "SELECT * FROM pedidos WHERE id_usuario_fk = '$id_usuario' ";
        $pedidos = mysqli_query($con, $consulta);
        if ($pedidos != NULL) {
          while($filas = mysqli_fetch_array($pedidos)){
              $id_producto_fk = $filas['id_producto_fk'];
              $yapedido[$id_producto_fk] = $filas['cantidad'];
          }
        }

        $consulta = "SELECT * FROM productos";

        $resultado = mysqli_query($con, $consulta);

        $total=0;
        if ($resultado != NULL) {
          while($filas = mysqli_fetch_array($resultado)){
            $id_prod = $filas['id_prod'];
            if (isset($yapedido[$id_prod])) {
              $cantidad = $yapedido[$id_prod]; 
            } else {
              $cantidad = 0;
            }
            $total+=$cantidad*$filas['precio'];

            echo "
              <section class='product-card' id='card'.$id_prod>
                <img src='../imagines/".$filas['imagen']."' alt='".$filas['nombre']."' class='product-image'>
                <div class='product-info'>
                  <h3 class='product-name'>".$filas['nombre']."</h3>
                  <p class='product-price'>".$filas['precio']."</p>
                  <p class='product-description'>".$filas['descripcion']."</p>
                  <div class='mas-menos'>
                    <form method='get' action='../pedidos/menos.php' >
                      <div>
                        <input name=id_usuario type=hidden value=$id_usuario >  
                        <input name=id_prod type=hidden value=$id_prod>
                        <input name=cantidad type=hidden value=$cantidad >
                      </div>  
                      <div class='boton'>
                        <input id='menos' type='submit' value=' -1 ' >
                      </div>
                    </form>
                    <p class='product-cantidad'>".$cantidad."</p>
                    <form method='get' action='../pedidos/mas.php' >
                      <div>
                        <input name=id_usuario type=hidden value=$id_usuario >  
                        <input name=id_prod type=hidden value=$id_prod>
                        <input name=cantidad type=hidden value=$cantidad >
                      </div>  
                      <div class='boton'>
                        <input id='mas' type='submit' value=' +1 ' >
                      </div>
                    </form>
                  </div>
                </div>
              </section>
              <section>
                <div class='cuenta'>
            ";
            if ($total>0) {             
              echo "Ya pedido por \$$total ";
              echo "
                <form method='get' action='../pedidos/pagar.php'>
                  <div class='boton'>
                    <input name=id_usuario type=hidden value=$id_usuario >
                    <input id='pagar' type='submit' value='Pagar' >
                  </div>
                </form>
              ";
            } else {
              echo "No hay pedidos aún";
            }
            echo "
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
