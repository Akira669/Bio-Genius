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
   echo "errno de depuracion: " . $mysql->connect_errno() . PHP_EOL;
}
 //echo "principal conectado:".$mysql->host_info;

     $consulta="SELECT max(id_personal) as id from personal_genius";
     $num=$mysql->query($consulta);
         $dato=$num->fetch_row();
    if($dato[0]!="")
        echo $dato[0];
 
?>
