<?php
session_start();

include_once("../conexion/conectar.php");

$usuario;
$pass;

if( isset($_POST['email']) and isset($_POST['pass']) ){
    
    $usuario= $_POST['email'];
    $pass= $_POST['pass'];
    //print_r($usuario);
    //print_r($pass);

    $consulta = " SELECT * FROM usuarios WHERE email='$usuario' AND clave=MD5('$pass') LIMIT 1 ";
    
    //print_r($consulta);

    $query =  mysqli_query($con, $consulta);
    //print_r($query);
    //var_dump($query);


    if ($query != NULL) {
        $datos = mysqli_fetch_array($query);
        //print_r($datos);
        //var_dump($datos);
    }

    if( $datos == NULL ){
        header("Location: ../paginas/ingresar.php?login=error");
    }else if ($datos['ESTADO'] == 'banneado'){
        header("Location: ../paginas/ingresar.php?login=ban");    
    } else {
        $_SESSION = $datos;
        //var_dump($_SESSION);
        header("Location: ../paginas/inicio.php?login=ok");
    }
}

//header("Location: ../paginas/ingresar.php?login=error");

//var_dump($_SESSION);

?>
