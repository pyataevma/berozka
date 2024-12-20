<?php
  include_once("../componentes/header.php"); 
  include_once("../conexion/conectar.php");
?>

<main>

<article>
    <?php
        if(isset($_GET['login'])){
            $error=$_GET['login'];            
            if ($error == 'error') {
                $mensaje='Esta mal tu usuario o clave';
            } else if ($error == 'ban') {
                $mensaje='El usuario está banneado';
            }
            echo "
              <div class=mensaje>
                <strong>$mensaje</strong>
              </div>  
            ";
        }
    ?>
    <section class='campo ingresar'>
    <h2>Ingresar</h2>
        <p class=aviso>
            <strong>Para ingresar a funciones administrativas use login "a@a" y contraseña "aa".</strong>
        </p>
    <form action="../reg/login.php" method="post"  >
        <div>
                <label for="email" >Correo electronico</label>
                <input name="email"  type="email" id="email" >
        </div>
        <div>
            <label for="pass" >Contraseña</label>
            <input name="pass"  type="password" id="pass" >
        </div>
        <div>
            <input type="submit" value="Ingresar" >
        </div>
    </form>
    </section>
 </article>
</main>
<?php  
  include_once("../componentes/footer.php"); 
?>

