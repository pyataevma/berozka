<?php
include_once("../componentes/header.php");
include_once("../conexion/conectar.php");


?>

<main>

  <?php
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $consulta = "SELECT * FROM productos WHERE id_prod='$id'" ;

        $resultado = mysqli_query($con, $consulta);

        if($resultado!=NULL){
                        
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
                <secton>
                <div class=campo>
                <h2>Modificar producto</h2>
                <form action=../abm/mod_prod.php method=post enctype=multipart/form-data>
                    <div>
                        <input name=id  type=hidden value=$filas[id_prod]>
                        <label for=nombreProducto>Nombre</label>
                        <input id=nombreProducto type=text name=nombreProducto value=$filas[nombre]>
                    </div>
                    <div>
                        <label for=precio >Precio</label>
                        <input id=precio type=number name=precio value=$filas[precio]>
                    </div>
                    <div>
                        <label for=descripcion>Descripción</label>
                        <textarea id=descripcion name=descripcion>$filas[descripcion]</textarea>
                    </div>
                    <div>
                        <label for=imagen>Imagen</label>
                        <input id=imagen type=file accept=.jpg name=imagen value=$filas[imagen]>
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
