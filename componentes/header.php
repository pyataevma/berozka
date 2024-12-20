<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <link rel=stylesheet href="../estilos/estilo5.css?v=1.0.6" />
    <title>Berözka</title>
</head>
<body>
    <?php
        session_start();
        $menu = array();
        $menu["Inicio"] = "inicio.php";
        if (isset($_SESSION['id_usuario'])) {
            $nombre_usuario = $_SESSION['NOMBRE']." ".$_SESSION['APELLIDO'];
            if ($_SESSION['NIVEL'] == 'admin') {
                $nombre_usuario = "Administrador: ".$nombre_usuario; 
                $menu['Administrar productos'] = "administrar_prod.php";
                $menu['Administrar usuarios'] = "administrar_us.php";
                $menu["Ver productos"] = "productos.php";
            } else {
                $nombre_usuario = "Cliente: ".$nombre_usuario; 
                $menu['Pedir'] = "pedir.php";
                $menu["Ver mis compras"] = "compras.php";
            }
            $menu["Salir"] = "../reg/salir.php";
        } else {
          $nombre_usuario ="No estás autorizado";
          $menu["Nuestros productos"] = "productos.php";
          $menu["Ingresar"] = "ingresar.php";
          $menu["Registrarse"] = "registrarse.php";
        }
    ?>
    <div class="wrapper">
        <div class="content">
            <header>
                <h1>
                    Berözka                
                </h1>
                <div class="second">
                    <nav>            
                        <ul>
                            <?php
                                foreach ($menu as $texto => $vinculo) {
                                    echo "<li><a href=$vinculo >$texto</a></li>";
                                }
                            ?>
                        </ul>            
                    </nav>
                    <section class="nombre">
                        <?php echo $nombre_usuario  ?>
                    </section>
                </div>
            </header>


  