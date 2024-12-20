<?php

include_once("../conexion/conectar.php");

$nombre;
$apellido;
$mail;
$pass;

if( isset($_POST['nom']) and isset($_POST['ape']) and isset($_POST['email']) and isset($_POST['pass']) ){
    $nombre= $_POST['nom'];
    $apellido= $_POST['ape'];
    $mail= $_POST['email'];
    $pass= $_POST['pass'];


    $consulta = "INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, CLAVE, NIVEL, ESTADO, FECHA_ALTA) 
    VALUES ('$nombre', '$apellido', '$mail', MD5('$pass'), 'usuario', 'activo', NOW()) "; 

    mysqli_query($con, $consulta);
    header("Location: ../paginas/inicio.php?alta=ok");

}


?>
