<?php

include_once("../conexion/conectar.php");

$id;
$nombre;
$apellido;
$email;
//$clave;
$nivel;
$estado;


  if(isset($_POST['id_usuario']) and isset($_POST['NOMBRE']) and isset($_POST['APELLIDO']) and isset($_POST['EMAIL']) 
     and isset($_POST['NIVEL']) and isset($_POST['ESTADO'])) {

      $id = $_POST['id_usuario'];
      $nombre = $_POST['NOMBRE'];
      $apellido = $_POST['APELLIDO'];
      $email = $_POST['EMAIL'];
      //$clave = $_POST['CLAVE'];;
      $nivel = $_POST['NIVEL'];;
      $estado = $_POST['ESTADO'];;


      $consulta = "UPDATE usuarios SET NOMBRE='$nombre', APELLIDO='$apellido', EMAIL='$email', 
      NIVEL='$nivel', ESTADO ='$estado'  
      WHERE id_usuario='$id'";

      $resultado=mysqli_query($con, $consulta);

      header("Location: ../paginas/administrar_us.php?modificar_usuario=ok");
  }

//header("Location: ../paginas/administrar.php?alta_producto=ok");

?>
