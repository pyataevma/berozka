session_start();

if(!isset($_SESSION['NIVEL']) or $_SESSION['NIVEL']!='Admin' ){

    die("No tenes permisos!!!");
}
