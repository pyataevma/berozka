<?php

include_once("../conexion/conectar.php");

$mensaje = "Algo se rompio! El producto no fue eliminado!";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $consulta = "DELETE FROM productos WHERE id_prod='$id'" ;

    mysqli_query($con, $consulta);
    
    $mensaje = "El producto fue eliminado con exito!";
}

header("Location: ../paginas/administrar_prod.php?mensaje=$mensaje");

?>
