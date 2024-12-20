<?php
  include_once("../componentes/header.php"); 
  include_once("../conexion/conectar.php");
  $id_usuario = $_SESSION['id_usuario'];
?>
<main>
            <?php
                if(isset($_GET['mensaje'])){
                  $mensaje=$_GET['mensaje'];
                }
            ?>
        <section>
          <table>
                <caption>Todas mis compras</caption>
                <thead>
                    <tr>
                       <th>Nombre producto</th>   
                       <th>Precio</th>                       
                       <th>Cantidad</th>
                       <th>Total</th>
                       <th>Fecha</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $consulta = "SELECT * FROM compras WHERE id_usuario_fk ='$id_usuario' ";

                        $resultado = mysqli_query($con, $consulta);
                    
                        if($resultado!=NULL){
                            while($filas = mysqli_fetch_array($resultado)){
                                $precio=$filas['precio_compra'];
                                $cantidad=$filas['cantidad_compra'];
                                $total=$precio*$cantidad;
                                echo "
                                    <tr>
                                        <td>$filas[nombre_producto]</td>
                                        <td>\$$filas[precio_compra]</td>
                                        <td>$filas[cantidad_compra]</td>
                                        <td>\$$total</td>
                                        <td>$filas[fecha_compra]</td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </secton>
      </main>
<?php  
  include_once("../componentes/footer.php"); 
?>
