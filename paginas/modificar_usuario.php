<?php
include_once("../componentes/header.php");
include_once("../conexion/conectar.php");
?>

<main>
  <?php
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $consulta = "SELECT * FROM usuarios WHERE id_usuario='$id'" ;

        $resultado = mysqli_query($con, $consulta);

        if($resultado!=NULL){
            //print_r($resultado);            
            while($filas = mysqli_fetch_array($resultado)){
                // print_r($filas[APELLIDO]); 
                echo "
                <secton>
                <div class=campo>
                <h2>Modificar usuario</h2>
                <form action=../reg/mod_usuario.php method=post enctype=multipart/form-data>
                    <div>
                        <input name=id_usuario  type=hidden value=$filas[id_usuario]>
                        <label for=nombre>Nombre</label>
                        <input id=nombre type=text name=NOMBRE value=$filas[NOMBRE]>
                    </div>
                    <div>
                        <label for=apellido >Apellido</label>
                        <input id=apellido type=text name=APELLIDO value=$filas[APELLIDO]>
                    </div>
                    <div>
                        <label for=email >E-mail</label>
                        <input id=email type=text name=EMAIL value=$filas[EMAIL]>
                    </div>
                    <div>
                        <label for=nivel >Nivel</label>
                        <select name=NIVEL  id=nivel >
                          <option value=usuario>Usuario</option>
                          <option value=admin>Admin</option>
                      </select>  
                    </div>
                    <div>
                        <label for=estado>Estado</label>
                        <select name=ESTADO  id=estado >
                          <option value=activo>Activo</option>
                          <option value=banneado>Banneado</option>
                      </select>  
                    </div>                                        
                    <div>
                        <input type=submit value=Modificar>
                    </div>
                </form>
                </div>
                </section>
                ";
            }

        }

    }
    ?>
</main>

<?php  
  include_once("../componentes/footer.php"); 
?>
