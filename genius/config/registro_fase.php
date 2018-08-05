<?php 
// codigo para la conexion de la BD en archvivos php
$path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('../connectionDB.php');
require_once('../verifica.php');
//login('login.php');
 

$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   echo "errno de depuracion: " . $mysql->connect_errno() . PHP_EOL;
}

$id_p=verifica_entrada($_GET["nemple"]);
$area=verifica_entrada($_GET['area']);
$curp=verifica_entrada($_GET['curp']);
$puesto=verifica_entrada($_GET['puesto']);
$nss=verifica_entrada($_GET['nss']);
$ife=verifica_entrada($_GET['ife']);
$rfc=verifica_entrada($_GET['rfc']);
$cuenta=verifica_entrada($_GET['cuenta']);
$banco=verifica_entrada($_GET['banco']);
$clave=verifica_entrada($_GET['clave']);

$dire_curp=$_GET['path_curp'];
$dire_tarjeta=$_GET['path_tarjeta'];
$dire_ife=$_GET['path_ife'];

	 $consulta="update personal_genius set departamento='$area',CURP='$curp',puesto='$puesto',NSS='$nss',numero_empleado='$id_p',
	 clave_IFE='$ife',RFC='$rfc',cuenta_banco='$cuenta',nombre_banco='$banco',clave_banco='$clave', dir_curp='$dire_curp', 
	 dir_tarjeta='$dire_tarjeta', dir_ife='$dire_ife'  where id_personal='$id_p'";
	 $res=$mysql->query($consulta);

	if($puesto==1){
	   $update="UPDATE usuario set rol='Super Administrador', id_rol='1' where id_usuario='$id_p'";
	   $res2=$mysql->query($update);  
	   }else if($puesto==2){
	     $update="UPDATE usuario set rol='Administrador', id_rol='2' where id_usuario='$id_p'";
	     $res2=$mysql->query($update);  
	     }else if($puesto==3){
	       $update="UPDATE usuario set rol='usuario', id_rol='3' where id_usuario='$id_p'";
	        $res2=$mysql->query($update);  
	        }
	
?>