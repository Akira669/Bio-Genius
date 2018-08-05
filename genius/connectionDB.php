<?php
//errores en pantalla
error_reporting(E_ALL);
ini_set("display_errors", 1);

//variables conexion
  $HOSTBD="localhost";
  $USERBD="gfwsyste_web_gen";
  $PASSBD="123genius";
  $BDNAME="gfwsyste_System_Genius";

// variables de movimiento
   $path_web="inicio.php";
   $path_salida="logout.php";
   $path_cambio="cambio.php";

//clase para la conexion de mysql
class conecta_mysqli extends mysqli {
    public function __construct($host, $usuario, $contraseña, $bd) {
        parent::init();
        if (!parent::options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
            die('Falló la configuración de MYSQLI_INIT_COMMAND');
        }
        if (!parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
            die('Falló la configuración de MYSQLI_OPT_CONNECT_TIMEOUT');
        }
        if (!parent::real_connect($host, $usuario, $contraseña, $bd)) {
            die('Error de conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
    }
}

//funciones de uso multiple para el desdarrollo
   function verifica_entrada($text){
    global $mysql;
     $texto=($text);
      $t= strip_tags($texto);
$salida=$mysql->real_escape_string($t);
     return $salida;
   }

    function print_titulo($text){
          echo '<div class="row">
                 <div class="col-md-5 col-md-offset-5"><h5><strong>'.$text.'</strong></h5></div></div> ';
    }
?>
