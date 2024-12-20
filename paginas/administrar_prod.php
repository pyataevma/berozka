<?php
  include_once("../componentes/header.php"); 
  include_once("../conexion/conectar.php");
?>

<main>
        <section>
            <?php
                $mensaje="";
                if(isset($_GET['mensaje'])){
                    $mensaje=$_GET['mensaje'];
                }
                if(isset($_GET['alta_producto'])){
                    $mensaje="El producto fue agregado con éxito!";
                }
                if(isset($_GET['baja_producto'])){
                    $mensaje="El producto fue eliminado con éxito!";
                }
                if(isset($_GET['mod'])){
                   $mensaje="El producto fue modificado con éxito!";
                }
                if ($mensaje !="") {
                   echo "<div class=mensaje><strong> $mensaje </strong></div>";
                }
            ?>
        </section>
        <section>
          <table>
                <caption>Productos ya agregados</caption>
                <thead>
                    <tr>
                       <th>Nombre producto</th>   
                       <th>Imagen</th>
                       <th>Precio</th>                       
                       <th>Modificar</th>
                       <th>Eliminar</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $consulta = "SELECT * FROM productos";

                        $resultado = mysqli_query($con, $consulta);
                    
                        if($resultado!=NULL){
                            while($filas = mysqli_fetch_array($resultado)){
                                echo "
                                    <tr>
                                        <td>$filas[nombre]</td>
                                        <td><img src='../imagines/".$filas['imagen']."' alt='".$filas['nombre']."' class='mini-image'></td>
                                        <td>$filas[precio]</td>
                                        <td><a href=modificar_producto.php?id=$filas[id_prod] >Modificar</a></td>
                                        <td><a href=../abm/baja_producto.php?id=$filas[id_prod] >Eliminar</a></td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </secton>
        <section>
            <div class="campo">    
                <h2>Agregar nuevo producto</h2>
                <form action="../abm/alta_producto.php"  method="post" enctype="multipart/form-data" class="agregar">
                    <div>
                        <label for="nombreProducto" >Nombre</label>
                        <input id="nombreProducto" type="text" name="nombreProducto" >
                    </div>
                    <div>
                        <label for="precio" >Precio</label>
                        <input id="precio" type="number" name="precio"  >
                    </div>
                    <div>
                        <label for="descripcion" >Descripción</label>
                        <textarea id="descripcion" name="descripcion" ></textarea>
                    </div>
                    <div>
                        <label for="imagen" >Imagen</label>
                        <input id="imagen" type="file" accept=".jpg" name="imagen">
                    </div>
                    <div>
                        <input type="submit" value="Agregar" >
                    </div>
                </form>
            </div>
        </section>
    </main>

<?php  
  include_once("../componentes/footer.php"); 
?>

