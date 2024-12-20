<?php

include_once("../conexion/conectar.php");

$id;
$nombreProducto;
$precio;
$imagen;
$descripcion;

  if(isset($_POST['id']) and isset($_POST['nombreProducto']) and isset($_POST['precio']) and isset($_POST['descripcion']) and isset($_FILES['imagen'])) {

      $id = $_POST['id'];
      $nombreProducto = $_POST['nombreProducto'];
      $precio = $_POST['precio'];
      $descripcion = $_POST['descripcion'] ;

      $temporal  = $_FILES['imagen']['tmp_name'];
      $original = imagecreatefromjpeg($temporal);
      $ancho_original = imagesx($original);
      $alto_original = imagesy($original);
      $nuevo_ancho = 800;
      $nuevo_alto = round($alto_original * $nuevo_ancho / $ancho_original);
      $copia_imagen = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
      imagecopyresampled($copia_imagen, $original, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho_original, $alto_original);
      header("Content-type: image/jpeg");
      $imagen = time(). ".jpg"; 
      imagejpeg($copia_imagen, "../imagines/$imagen");

      $consulta = "UPDATE productos SET nombre='$nombreProducto', precio='$precio', descripcion='$descripcion', imagen= '$imagen' 
      WHERE id_prod='$id'";

      mysqli_query($con, $consulta);

      header("Location: ../paginas/administrar_prod.php?modificar_producto=ok");
  }

//header("Location: ../paginas/administrar.php?alta_producto=ok");

?>
