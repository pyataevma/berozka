<?php

include_once("../conexion/conectar.php");

$id_usuario;
$id_producto;
$cantidad;

  if(isset($_GET['id_usuario']) and isset($_GET['id_prod']) and isset($_GET['cantidad'])) {

      $id_usuario = $_GET['id_usuario'];
      $id_producto = $_GET['id_prod'];
      $cantidad = $_GET['cantidad'];
      if ($cantidad == 1) {
        $consulta = "DELETE FROM pedidos WHERE id_usuario_fk = '$id_usuario' AND id_producto_fk = '$id_producto'" ;
      } else {
        $cantidad -=1;
        $consulta = "UPDATE pedidos SET cantidad='$cantidad' WHERE id_usuario_fk = '$id_usuario' AND id_producto_fk = '$id_producto'";
      }
      $resultado = mysqli_query($con, $consulta);
      header("Location: ../paginas/pedir.php?menos=ok");
  }

//header("Location: ../paginas/pedir.php?menos=error");

?>
