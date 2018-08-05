<?php

function verificar_login($user,$pass,$bd){
  global $mysql;
    if(!$bd) return false;
  $consulta="SELECT id_usuario as clave,nombre_usuario as user, pass_usuario as pass, rol,id_rol
   from usuario where nombre_usuario = '$user' and pass_usuario='$pass'";
$datos=$mysql->query($consulta);
  $resultado=$datos->fetch_row();
       if($resultado)
         return $resultado;
       else
         return false;
}
//verificacion de permisos usuario
function user_permisos($id_user){
global $mysql;
    $consulta="SELECT permisos from permisos where id_usuario='$id_user'";
  $datos=$mysql->query($consulta);
    $result=$datos->fetch_row();
          if($result)
        return $result;
        else
        return "Error de permisos";
}
// verificacion de primer inicio de sesion
function primer_inicio($id_user){
   global $mysql;
    $co="SELECT pass_usuario from usuario where id_usuario='$id_user'";
  $da=$mysql->query($co);
    $res=$da->fetch_row();
          if($res)
        return $res;
        else
        return "Error al obtener password";
}

// verifica las sesiones que esten declardas
function is_logeado(){
  return isset($_SESSION) && isset($_SESSION['user']) && isset($_SESSION['permisos'])
      && isset($_SESSION['rol_usuario']);
}

// verifica que el susario se autentico o muestra error y sale del sistema
function login($page){
  if(!is_logeado()){
    header("Location: logout.php");
  }
}
session_start();
?>
