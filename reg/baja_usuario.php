<?php

include_once("../conexion/conectar.php");

$mensaje = "Algo se rompio! El usuario no fue eliminado!";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $consulta = "DELETE FROM usuarios WHERE id_usuario='$id'" ;

    mysqli_query($con, $consulta);
    
    $mensaje = "El usuario fue eliminado con exito!";
}

header("Location: ../paginas/administrar_us.php?mensaje=$mensaje");

?>
