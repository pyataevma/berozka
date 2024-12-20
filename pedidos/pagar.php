<?php

include_once("../conexion/conectar.php");

$id_usuario;
  if(isset($_GET['id_usuario'])) {
      $id_usuario = $_GET['id_usuario'];
      $consulta = "SELECT id_pedido, id_usuario_fk, nombre, precio, cantidad  
      FROM pedidos JOIN productos ON pedidos.id_producto_fk = productos.id_prod 
      WHERE id_usuario_fk = '$id_usuario'";
      $resultado = mysqli_query($con, $consulta);
      if($resultado!=NULL){
        while($filas = mysqli_fetch_array($resultado)){
          $consulta = "INSERT INTO compras (id_usuario_fk, nombre_producto, precio_compra, cantidad_compra, fecha_compra) 
          VALUES ('$filas[id_usuario_fk]', '$filas[nombre]', '$filas[precio]', '$filas[cantidad]', NOW())";
          mysqli_query($con, $consulta);
          $consulta = "DELETE FROM pedidos WHERE id_pedido='$filas[id_pedido]'";
          mysqli_query($con, $consulta);
        }
      }  
      header("Location: ../paginas/pedir.php?pagar=ok");
  }
//header("Location: ../paginas/pedir.php?pagar=error");

?>
