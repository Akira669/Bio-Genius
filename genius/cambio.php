<?php
require_once('connectionDB.php');
require_once('verifica.php');
global $mysql;
$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql->connect_errno){
$mensaje="";
$pass1="";
$pass2="";
$mjs="";
$id_user=$_SESSION['id_user'];
if(!empty($_POST['cambio']) ){
$pass1=verifica_entrada($_POST['pass1']);
$pass2=verifica_entrada($_POST['pass2']);
//echo "password: ".$pass1." t:".strlen($pass1)." ".$pass2;
if( (strlen($pass1)>=8) && (strlen($pass2)>=8) ){
      if($pass1===$pass2){
        $update="UPDATE usuario set pass_usuario='$pass1' where id_usuario='$id_user'";
      $listo=$mysql->query($update);
         if($listo){
              $mjs = "La contrase&ntilde;a se ha cambiado !!! CORRECTO";
               sleep(3);
            $mysql->close();
            header("Location: $path_web");
               }else
                   $mensaje="Error envio de datos 2.0";
           }else
         $mensaje="Las contrase&ntilde;as no son iguales...";
        }else
    $mensaje="Parametros incorrectos...<br> La contrase&ntilde;a debe de tener Mayusculas, Minusculas,N&uacute;meros... ";
      }
 }else
  echo "Error de conexion BD 1.0 ".$mysql->connect_error;

?>
<script src="js/jquery-1.12.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap3/dist/css/bootstrap.min.css">
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
        $("#cambio_password").modal('show');
        $("#salir").click(function(){
            location.href = "logout.php";
        });
        /*$(document).mousedown(function(e){
         		//1: izquierda, 2: medio/ruleta, 3: derecho
              	if(e.which == 1)
              		{
                 	location.href = "cambio.php";
              		}
          	});   */
  });
</script>

<div class="modal fade" id="cambio_password" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="gridSystemModalLabel">Cambio de contrase&ntilde;a</h4>
      </div>
      <div class="modal-body">
          <? if($mensaje!=""){ ?>
            <div class="row">
              <div class="col-md-10 col-md-offset-1 alert alert-danger" role="alert">
               <? echo $mensaje; ?>
             </div>
        </div>
          <? } ?>
          <? if($mjs!=""){ ?>
            <div class="row">
              <div class="col-md-10 col-md-offset-1 alert alert-success" role="alert">
               <? echo $mjs; ?>
             </div>
        </div>
          <? } ?>
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
<h4>Ingrese su nueva contrase&ntilde;a usuario <span class="label label-info"><? echo  $_SESSION['user']; ?></span></h4>
             </div>
        </div>
<br>
        <div class="row">
          <div class="col-sm-9">
<form class="form-horizontal" action="cambio.php" method="POST" name="cambio-pass">
    <div class="form-group">
      <label for="pass1" class="col-sm-6 control-label">Contrase&ntilde;a Nueva</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="pass1" name="pass1" >
      </div>
    </div>
    <div class="form-group">
      <label for="pass2" class="col-sm-6 control-label">Confirme contrase&ntilde;a</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="pass2" name="pass2">
      </div>
    </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="salir">Salir</button>
        <button type="submit" class="btn btn-primary" name="cambio" id="cambio" value="ok">Cambiar Contrase&ntilde;a</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
