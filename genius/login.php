<?php
require_once('connectionDB.php');
require_once('verifica.php');
global $mysql;
$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql->connect_errno){
$mensaje="";
if(!empty($_POST['inicio'])){
$username=verifica_entrada($_POST['username']);
$pass=verifica_entrada($_POST['password']);
    $var_user=verificar_login($username,$pass,$BDNAME);
  if($var_user){
     $inicio=primer_inicio($var_user[0]);
     if($inicio[0]==$var_user[1]){
     $_SESSION['user']=$var_user[1];
     $_SESSION['id_user']=$var_user[0];
     $_SESSION['permisos']=user_permisos($var_user[0]);
     $_SESSION['rol_usuario']=$var_user[4];
     $_SESSION['machine']=$_SERVER['REMOTE_ADDR'];
          header("Location: $path_cambio");
     }else{
     $_SESSION['user']=$var_user[1];
     $_SESSION['id_user']=$var_user[0];
     $_SESSION['permisos']=user_permisos($var_user[0]);
     $_SESSION['rol_usuario']=$var_user[4];
     $_SESSION['machine']=$_SERVER['REMOTE_ADDR'];
     $mysql->close();
    header("Location: $path_web");
     } 
  }else
   $mensaje="Usuario o Password Incorrectos...";
 }
}else
  echo "Error de conexion BD 1.0 ".$mysql->connect_error;

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
      <meta charset="utf-8">
      <title>System Genius</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- CSS -->
      <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/supersized.css">
      <link rel="stylesheet" href="css/style_login.css">

    </head>
    <body>
        <div class="page-container">
            <h1><b>SYSTEM<b> <small>GENIUS</small> </h1>
            <form name="formulario_inicio" action="" method="post">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                    <? echo "<br>".$mensaje;?>
                <button type="submit" id="inicio" name="inicio" value="ok">Entrar</button>
                <div class="error"><span>+</span></div>
            </form>

        </div>
        <!-- Javascript -->
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/supersized-init.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
