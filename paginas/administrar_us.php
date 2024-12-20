<?php
  include_once("../componentes/header.php"); 
  include_once("../conexion/conectar.php");
?>

<main>
        <section>
            <?php
                if(isset($_GET['mensaje'])){
                  $mensaje=$_GET['mensaje'];
                  echo "<strong> $mensaje </strong>";
                }
                if(isset($_GET['alta_producto'])){
                    echo "<strong>El producto fue agregado con éxito!</strong>";
                }
                if(isset($_GET['baja_producto'])){
                    echo "<strong>El producto fue eliminado con éxito! </strong>";
                }
                if(isset($_GET['mod'])){
                  echo "<strong>El producto fue modificado con éxito! </strong>";
                }
            ?>
        </section>
        <section>
          <table>
                <caption>Usuarios registrados</caption>
                <thead>
                    <tr>
                       <th>Nombre</th>   
                       <th>Apellido</th>
                       <th>E-mail</th>
                       <th>Nivel</th>
                       <th>Estado</th>
                       <th>Fecha alta</th>
                       <th>Modificar</th>
                       <th>Eliminar</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $consulta = "SELECT * FROM usuarios";

                        $resultado = mysqli_query($con, $consulta);
                    
                        if($resultado!=NULL){
                            while($filas = mysqli_fetch_array($resultado)){
                                echo "
                                    <tr>
                                        <td>$filas[NOMBRE]</td>
                                        <td>$filas[APELLIDO]</td>
                                        <td>$filas[EMAIL]</td>
                                        <td>$filas[NIVEL]</td>
                                        <td>$filas[ESTADO]</td>
                                        <td>$filas[FECHA_ALTA]</td>
                                        <td><a href=modificar_usuario.php?id=$filas[id_usuario] >Modificar</a></td>
                                        <td><a href=../reg/baja_usuario.php?id=$filas[id_usuario] >Eliminar</a></td>
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
                <h2>Agregar nuevo usuario</h2>
                <form action="../reg/alta_admin.php"  method="post" enctype="multipart/form-data" class="agregar">
                    <div>
                        <label for="nombreUsuario" >Nombre</label>
                        <input id="nombreUsuario" type="text" name="nombreUsuario" >
                    </div>
                    <div>
                        <label for="apellido" >Apellido</label>
                        <input id="apellido" type="text" name="apellido"  >
                    </div>
                    <div>
                        <label for="email" >E-mail</label>
                        <input type="email" id="email" name="email" >
                    </div>
                    <div>
                        <label for="pass" >Contraseña</label>
                        <input name="pass"  type="password" id="pass" >
                    </div>
                    <div>
                        <label for="nivel" >Nivel</label>
                        <select name="nivel"  id="nivel" >
                          <option value="usuario">Usuario</option>
                          <option value="admin">Admin</option>
                      </select>  
                    </div>
                    <div>
                        <label for="estado" >Estado</label>
                        <select name="estado"  id="estado" >
                          <option value="activo">Activo</option>
                          <option value="banneado">Banneado</option>
                      </select>  
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
