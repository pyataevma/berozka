<?php

include_once("../conexion/conectar.php");

$nombre;
$apellido;
$mail;
$pass;
$nivel;
$estado;
//print_r($_POST);

if( isset($_POST['nombreUsuario']) and isset($_POST['apellido']) and isset($_POST['email']) and isset($_POST['pass']) and isset($_POST['nivel']) and isset($_POST['estado'])){
    $nombre = $_POST['nombreUsuario'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['email'];
    $pass = $_POST['pass'];
    $nivel = $_POST['nivel'];
    $estado = $_POST['estado'];

    $consulta = "INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, CLAVE, NIVEL, ESTADO, FECHA_ALTA) 
    VALUES ('$nombre', '$apellido', '$mail', MD5('$pass'), '$nivel', '$estado', NOW()) "; 

    mysqli_query($con, $consulta);
    header("Location: ../paginas/administrar_us.php?alta=ok");

}


?>
