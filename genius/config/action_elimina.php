<?php 
 $path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('../connectionDB.php');
require_once('../verifica.php');
login('login.php');

$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;
}

$id_user=$_POST['id_user'];

$personal="DELETE from personal_genius where id_personal='$id_user'";
    $del_personal=$mysql->query($personal);
        if(!$del_personal){
        	echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL; 
        	exit();
        }
        	   

$permisos_modulos="DELETE from permisos where id_usuario='$id_user'";
			 $permisos_modulos=$mysql->query($permisos_modulos);
        if(!$permisos_modulos){
        	  echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL; 
        	  exit();
        }
        	
$permisos_usuario="DELETE from permisos_usuario where id_usuario='$id_user'";
 $permisos_usuario=$mysql->query($permisos_usuario);
        if(!$permisos_usuario){
        	  echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL; 
        	  exit();
        }

$usuario="DELETE from usuario where id_usuario='$id_user'";
      $usuario=$mysql->query($usuario);
        if(!$usuario){
        	  echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL; 
        	  exit();
        }
echo "listo";
?>