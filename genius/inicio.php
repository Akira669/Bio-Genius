<?php
require_once('verifica.php');
login('login.php');
//variables de asignacion
$permisos=$_SESSION['permisos'];
$user=$_SESSION['user'];
if($permisos === "Error de permisos"){
        echo '<div class="row" align="center">
          <div class="col-md-6 col-md-offset-2 text-center" style="padding-left:150px; padding-top:50px;" >
              <img src="img/warning.png"><br>
             <b> No tiene permisos asignados... <br>consulte con su administrador del sistema  <b>
             <br><br>
             <h3><a style="color:black;" href="logout.php">'.$user.'</a><a style="color:black;" href="logout.php"> | Salir</a></h3>
          </div>
      </div>';
    exit();  

}

$per=explode(",",$permisos[0]);
//print_r($per);

$menu= array(0=>" ",
1=>'ADMINISTRACI&Oacute;N',
2=>'TALENTO HUMANO',
3=>'VENTAS',
4=>'PRODUCCI&Oacute;N',
5=>'ALMAC&Eacute;N',
6=>'LOG&Iacute;STICA',
7=>'MARKETING',
8=>'PANEL DE CONTROL');

$url= array(0=>" ",1=> 'admin',2=>'talen_humano',3=>'ventas',4=>'production',
                          5=>'stock',6=>'pensamiento',7=>'publicidad',8=>'config');
/*
for ($i=0; $i < count($per) ; $i++){
			echo "<br>URL: ".$url[$per[$i]]." Menu:".$menu[$per[$i]]."<br>";
		}
		
exit();*/

?>
 <!doctype html>
<html lang="en" class="no-js">
<head>
  <title>System genius</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr.js"></script>

   <h3><img style=" position: relative;top: 1em;" src="img/user60.png"><a style="color:black;"><?php echo $user;?></a><a style="color:black;" href="logout.php">|Salir</a></h3>
   
 <h2><img class="imagen2" src="img/LOGOGENIUS.png"></h2>

<h4>MEN&Uacute;</h4>
</head>

<body>
<div class="cd-bouncy-nav-modal">
	<nav>
		<ul class="cd-bouncy-nav">
<?
		for ($i=0; $i < count($per) ; $i++){
			echo '<li><a href="genius.php?aplication='.$url[$per[$i]].'">'.$menu[$per[$i]].'</a></li>';
		}
?>
		</ul>
	</nav>
</div>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
</body>
</html>
