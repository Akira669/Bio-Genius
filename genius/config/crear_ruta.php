<?php 

//$id_matricula_personal=$_GET['id_matricula'];
$directorio="/home/gfwsystem/genius.gfwsystem.net/fotografias/G15001";//.$id_matricula;

if(!mkdir($directorio, 0755, true)) {
   system("mkdir /home/gfwsystem/genius.gfwsystem.net/fotografias/G15001 0755");
   echo "fallo";
}else
echo "listo";
?>