<?php
  include_once("../componentes/header.php"); 
  include_once("../conexion/conectar.php");
?>

<main>


<article>
        <?php
            if (isset($_GET['alta'])) {
                echo "<strong>Salio todo OK, te podes loguear</strong>";
               
            }
        ?>
        <section class=campo>
        <h2>Registrarse</h2>
        <form method="post" action="../reg/alta.php" >
            <div>
                <label for="nom" >Nombre</label>
                <input name="nom"  type="text" id="nom" >
            </div>
            <div>
                <label for="ape" >Apellido</label>
                <input name="ape"  type="text" id="ape" >
            </div>
            <div>
                <label for="email" >Correo</label>
                <input name="email"  type="email" id="email" >
            </div>
            <div>
                <label for="pass" >Contraseña</label>
                <input name="pass"  type="password" id="pass" >
            </div>
            <div>
                <input type="submit" value="Registrarme" >
            </div>
        </form>
        </section>
    </article>
</main>
<?php  
  include_once("../componentes/footer.php"); 
?>
