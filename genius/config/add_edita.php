<?php
$path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('../connectionDB.php');
require_once('../verifica.php');
//login('login.php');
 

$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   echo "errno de depuraci¨®n: " . $mysql->connect_errno() . PHP_EOL;
}
	
$id_numero_user=verifica_entrada($_POST['id_user_numero']);
$idusuario=verifica_entrada($_POST['usuario']);
$passusuario=verifica_entrada($_POST['password']);
$nombre=verifica_entrada($_POST['nombre']);
$a_paterno=verifica_entrada($_POST['apellidop']);
$a_materno=verifica_entrada($_POST['apellidom']);
$fecha_nacimiento=verifica_entrada($_POST['fecha_nac']);
$edad=verifica_entrada($_POST['edad']);
$direccion=verifica_entrada($_POST['direccion']);
$colonia=verifica_entrada($_POST['colonia']);
$ciudad=verifica_entrada($_POST['ciudad']);
$estado=verifica_entrada($_POST['estado']);
$pais=verifica_entrada($_POST['pais']);
$cp=verifica_entrada($_POST['codigo']);
$tel_movil=verifica_entrada($_POST['celular']);
$email_personal=verifica_entrada($_POST['correop']);
$tel_casa=verifica_entrada($_POST['telp']);
$email_empresarial=verifica_entrada($_POST['correoo']);
$tel_otro=verifica_entrada($_POST['telo']);
$departamento=verifica_entrada($_POST['area']);
$CURP=verifica_entrada($_POST['curp']);
$puesto=verifica_entrada($_POST['puesto']);
$NSS=verifica_entrada($_POST['nss']);
$numero_empleado=verifica_entrada($_POST['nemple']);
$clave_IFE=verifica_entrada($_POST['ife']);
$RFC=verifica_entrada($_POST['rfc']);
$cuenta_banco=verifica_entrada($_POST['cuenta_u']);
$nombre_banco=verifica_entrada($_POST['banco']);
$clave_banco=verifica_entrada($_POST['clave']);
$id_empleado=verifica_entrada($_POST['id_empleado']);

$dir_photo=$_POST['dir_photo'];
$dire_curp=$_POST['path_curp'];
$dire_tarjeta=$_POST['path_tarjeta'];
$dire_ife=$_POST['path_ife'];
$mysql->query("SET NAMES 'utf8'");  
 $consulta1="update personal_genius set nombre='$nombre',a_paterno='$a_paterno',a_materno='$a_materno',fecha_nacimiento='$fecha_nacimiento',edad='$edad',
	 direccion='$direccion', colonia='$colonia',municipio_delegacion='$ciudad',estado='$estado', ciudad='$ciudad',pais='$pais',
	cp='$cp',tel_movil='$tel_movil',tel_casa='$tel_casa',email_personal='$email_personal',email_empresarial='$email_empresarial',
	tel_otro='$tel_otro',departamento='$departamento',CURP='$CURP',puesto='$puesto',NSS='$NSS',numero_empleado='$numero_empleado',
	clave_IFE='$clave_IFE',RFC='$RFC',cuenta_banco='$cuenta_banco',nombre_banco='$nombre_banco',clave_banco='$clave_banco' ";
	
	$consulta2=" ";$consulta3=" ";$consulta4=" ";$consulta5=" ";
 if($dir_photo!=" ")	
$consulta2=" ,dir_foto='$dir_photo'";

if($dire_curp!=" ")
$consulta3=" ,dir_curp='$dire_curp'";

if($dire_tarjeta!=" ")
$consulta4=" ,dir_tarjeta='$dire_tarjeta'";

if($dire_ife!=" ")
$consulta5=" ,dir_ife='$dire_ife'";

$where="  where id_personal=$id_empleado";
	 if($mysql->query($consulta1.$consulta2.$consulta3.$consulta4.$consulta5.$where)){
		$mysql->errno; 
	 }
echo "listo";
	
?>