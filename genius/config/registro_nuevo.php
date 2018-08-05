<?php  

if (isset($_GET['valida'])){
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
   echo "errno de depuración: " . $mysql->connect_errno() . PHP_EOL;
}
// "conectado:".$mysql->host_info;  //comentar el info del host
// codigo para la conexion de la BD en los archvios php

 
$id_numero_user=verifica_entrada($_GET['id_user_numero']);
$user=verifica_entrada($_GET['usuario']);
$pass=verifica_entrada($_GET['password']);
$passc=verifica_entrada($_GET['cpassword']);
$nombre=verifica_entrada($_GET['nombre']);
$app=verifica_entrada($_GET['apellidop']);
$apm=verifica_entrada($_GET['apellidom']);
$nacimiento=verifica_entrada($_GET['fecha_nac']);
$edad=verifica_entrada($_GET['edad']);
$direccion=verifica_entrada($_GET['direccion']);
$colonia=verifica_entrada($_GET['colonia']);
$ciudad=verifica_entrada($_GET['ciudad']);
$estado=verifica_entrada($_GET['estado']);
$pais=verifica_entrada($_GET['pais']);
$codigo=verifica_entrada($_GET['codigo']);
$movil=verifica_entrada($_GET['celular']);
$correo=verifica_entrada($_GET['correop']);
$telp=verifica_entrada($_GET['telp']);
$correoo=verifica_entrada($_GET['correoo']);
$telo=verifica_entrada($_GET['telo']);
$foto_usu=verifica_entrada($_GET['foto']);
$dir_photo=verifica_entrada($_GET['dir_photo']);
   $mysql->query("SET NAMES 'utf8'");  

$consulta="insert into personal_genius (id_personal,id_usuario,nombre,a_paterno,a_materno,fecha_nacimiento,edad,
direccion, colonia,municipio_delegacion,estado,ciudad,pais,cp,tel_movil,tel_casa,email_personal,email_empresarial,tel_otro,dir_foto) 
values ('$id_numero_user','$user','$nombre','$app','$apm','$nacimiento','$edad','$direccion','$colonia','$ciudad','$estado','$ciudad',
'$pais','$codigo','$movil','$telp','$correo','$correoo','$telo','$dir_photo')";
	 if($mysql->query($consulta)){
		$mysql->errno; 
	 }
		 $insert_user="insert into usuario (id_usuario,nombre_usuario,pass_usuario) values ('$id_numero_user','$user','$pass')";
	 if($mysql->query($insert_user)){
		$mysql->errno; 
	 }
	
	}
	
?>

<style type="text/css">
.forma{
position:absolute;
top:3px;
left:950px;
	
}
.invalid{
	border:3px orange solid;	
}
.nover{
	display:none;	
}
</style>
 
<div class="subnav subnav-fixed nover" id="submenu">
	<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Datos Generales</a></li>
  <li role="presentation"><a href="#">Datos Personales</a></li>
  <li role="presentation"><a href="#">Permisos</a></li>
</ul>
</div>

<?print_titulo("Registro Nuevo Personal");?>
<br>
<div class="row">
  <div class="col-md-8">
<form name="form" class="form-horizontal" method="get" action="config/registro_nuevo.php">

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">USER</label>
    <div class="col-sm-3">
      <input type="text" style="text-transform: uppercase" data-toggle="tooltip" data-placement="bottom" title="Escriba el nombre para generar el usuario" class="form-control" id="user_usu" name="user_usu" readonly>
      <input type="text" style="display:none;" class="form-control" id="id_numero_user" name="id_numero_user">
    </div>
	 <label for="inputEmail3" class="col-sm-3 control-label">PASSWORD</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" style="text-transform: uppercase" id="pass_usu" name="pass_usu"  data-toggle="tooltip" data-placement="bottom" title="La contrase&ntilde;a sera cambiada cuando el usuario inicie sesion por primera vez" readonly>
    </div>
	
  </div> 
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label"></label>
    <div class="col-sm-3">
     
    </div>
	 <label for="inputEmail3" class="col-sm-3 control-label nover">CONFIRMAR</label>
    <div class="col-sm-3">
      <input type="password" class="form-control nover" id="passc_usu" name="passc_usu" data-toggle="tooltip" data-placement="bottom" title="Confirme su contrase&ntilde;a">
    </div>
		
  </div> 
  <br/><br/>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">NOMBRE</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nombre_usu" name="nombre_usu"  data-toggle="tooltip"
       data-placement="top" title="Escriba el nombre del empleado ">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">APELLIDO PATERNO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="app_usu" name="app_usu" data-toggle="tooltip" data-placement="right" title="Escriba apellido paterno" >
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">APELLIDO MATERNO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="apm_usu" name="apm_usu" data-toggle="tooltip" data-placement="top" title="Escriba apellido materno" >
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">NACIMIENTO</label>
    <div class="col-sm-3">
      <input type="date" class="form-control" id="nacimineto_usu" name="nacimineto_usu" >
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">EDAD</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="edad_usu" name="edad_usu" data-toggle="tooltip" data-placement="right" title="Cuantos a&ntilde;os tiene?">
    </div>
	
  </div>
  
 <div class="form-group">
 	 <label for="inputPassword3" class="col-sm-3 control-label">C&Oacute;DIGO POSTAL</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="codigo_usu" name="codigo_usu" data-toggle="tooltip" data-placement="right" title="Escriba c&oacute;digo postal">
    </div>
 
    
	 <label for="inputPassword3" class="col-sm-3 control-label">COLONIA</label>
    <div class="col-sm-3">
    
	  <select class="form-control" placeholder="COLONIA"  id="colonia_usu" name="colonia_usu">
  <!-- <option>  </option>-->

</select>
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">CIUDAD/MUNICIPIO</label>
    <div class="col-sm-3">
	    <select class="form-control" placeholder="CIUDAD/MUNICIPIO">
  <option id="ciudad_usu" name="ciudad_usu" ></option>

</select>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">ESTADO</label>
    <div class="col-sm-3">
	   <select class="form-control" placeholder="ESTADO">
  <option  id="estado_usu" name="estado_usu" ></option>

</select>
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">PA&Iacute;S</label>
    <div class="col-sm-3">
      <input type="text" class="form-control"  id="pais_usu" name="pais_usu" data-toggle="tooltip" data-placement="bottom" title="Escriba pa&iacute;s">
    </div>
	<label for="inputPassword3" class="col-sm-3 control-label">DIRECCI&Oacute;N</label>
    <div class="col-sm-3">
      <!-- <input type="text" class="form-control" id="direccion_usu" name="direccion_usu">-->
	
	  <textarea class="form-control" rows="5" id="direccion_usu" name="direccion_usu" data-toggle="tooltip" data-placement="right" title="Escriba la direcci&oacute;n"></textarea>
	  
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label"></label>
    <div class="col-sm-3">
    
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">M&Oacute;VIL</label>
    <div class="col-sm-3">
      <input type="text" class="form-control solonumero" id="movil_usu" name="movil_usu" data-toggle="tooltip" data-placement="right" title="Escriba tel&eacute;fono celular" maxlength="10">
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">CORREO PERSONAL</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="correo_usu" name="correo_usu" data-toggle="tooltip" data-placement="right" title="Escriba e-mail">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label ">TEL&Eacute;FONO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control solonumero" id="telp_usu" name="telp_usu" data-toggle="tooltip" data-placement="right" title="Escriba tel&eacute;fono casa" maxlength="13">
    </div>
	
  </div>
 <div class="form-group ">
    <label for="inputPassword3" class="col-sm-3 control-label">CORREO OFIC&Iacute;NA</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" style="text-transform: uppercase; font-size: x-small;" id="correoo_usu" name="correoo_usu"  readonly placeholder="@aguagenius.com" data-toggle="tooltip" data-placement="right" title="Se genera automaticamente cuando escribe el nombre" >
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label ">TEL&Eacute;FONO OFI</label>
    <div class="col-sm-3">
      <input type="text" class="form-control solonumero" id="telo_usu" name="telo_usu" data-toggle="tooltip" data-placement="right" title="Escriba tel&eacute;fono oficina" maxlength="15" >
	  
    </div>

	</div>
   
    <!-- <div class="form-group">
    <div class=" col-sm-2">
	    <button type="button"  class="btn btn-primary disabled">Atr&aacute;s</button>
		</div>
		  <div class="col-sm-3 col-sm-offset-6">
  <button type="button" class="btn btn-primary"  id="valida" name="valida">siguiente</button>
    </div>
  </div> -->
   
</form>

</div>
  <div class="col-md-4">
     <div style="height:80px;"></div>
       <input id="archivos" name="imagenes[]" type="file" class="file-loading" accept="image/*">
       
       
	  <div class="row" style="padding-top:85px;">
  <div class="col-sm-9 col-md-offset-1">
    <div class="row">
      <!--<div class="col-xs-8 col-sm-6" align="right">
  <button  class="btn btn-default btn-primary disabled" type="button" id="atras" disabled="disabled">&larr; Anterior</button>    
      </div>-->
      <div class="col-xs-4 col-sm-9" align="right">
       <button class="btn btn-default btn-primary" type="button" id="valida" >Siguiente &rarr;</button>
      </div>
    </div>
  </div>
</div>		
		
		</div>
        	
</div>
        
<script src="config/valida_campo_registro.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    localStorage.clear();
   
   $("#archivos").change(function(){
      var foto_ruta = $("#archivos").val();
        if(foto_ruta!=""){
	 localStorage.setItem("photo", foto_ruta);
      }
   });

 $('.solonumero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });

});

      $("#archivos").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
    minFileSize: 1 ,
    initialCaption: 'Initial-Image.jpg',
    initialPreviewShowDelete: false,
    showRemove: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["jpg", "png", "gif"]
});
   
</script>

<script type="text/javascript">
      $(document).ready(function(){

       var d = new Date();
       var ano_actual = d.getFullYear("Y");
          
          $("#nombre_usu").keyup(function(e){
                
            var user=$(this).val();
                  if(user!=""){
                var username= user.toUpperCase();    
             $.get("config/busca_numero.php",function(data){
              if(data){    
               $("#id_numero_user").val(data);
               var listouser = username.replace(" ","");
               $("#user_usu").val(listouser+"G"+data);
               $("#pass_usu").val(listouser+"G"+data);
               $("#correoo_usu").val(listouser+"G"+data+"@aguagenius.com");
               }else
             bootbox.alert("Error al obtener numero usuario consulte administrador",function(){
                   location.reload();
               });  
             });
             }
             
          }); 
        
        $("#nacimineto_usu").keyup(function() {
            var fecha=$(this).val();
            var ano_edad = fecha.substring(0, 4);
             var an=ano_edad.substring(2, 4) 
               var edad = ano_actual-ano_edad;  
                   $("#edad_usu").val(edad);
        });
        
         $("#nacimineto_usu").mousedown(function(e) {
              if(e.which==1){ 
               var fecha=$(this).val();
            var ano_edad = fecha.substring(0, 4);
             var an=ano_edad.substring(2, 4) 
               var edad = ano_actual-ano_edad;  
                   $("#edad_usu").val(edad);
              }
        });
        
      });
</script>
