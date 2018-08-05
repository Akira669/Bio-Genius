<?php 
// codigo para la conexion de la BD en archvivos php
$path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('./connectionDB.php');
require_once('./verifica.php');
//login('login.php');
 

$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   echo "errno de depuracion: " . $mysql->connect_errno() . PHP_EOL;
}

	
print_titulo("Registro usuario");
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
	<ul class="nav nav-tabs nover">
  <li role="presentation" ><strong>Datos Generales</strong></li>
  <li role="presentation" class="active" style="color:#090808;">Datos Personales</li>
  <li role="presentation" style="color:#090808;">Permisos</li>
</ul>
</div>

<br>


<div class="row">
  <div class="col-md-7">
  
  
<form name="form" class="form-horizontal" method="get" action="config/registro_nuevo_dd.php">

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">AREA</label>
    <div class="col-sm-3">
      <select class="form-control" id="area_usu" name="area_usu"  data-toggle="tooltip" data-placement="top" title="Seleccione area">
       <option>...</option>
          <?php $depa="SELECT id_departamento as id, nombre_departamento as name from departamentos";
              $res=$mysql->query($depa);
              
               while($datos=$res->fetch_row())
                 echo '<option value="'.$datos[0].'">'.strtoupper($datos[1]).'</option>';
         
           
          ?>
         
      </select>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">CURP</label>
    <div class="col-sm-3">
      <input type="text" class="form-control"  style="text-transform: uppercase; id="curp_usu" name="curp_usu" data-toggle="tooltip"
        data-placement="top" title="Escriba CURP" maxlength="18" >
    </div>
  </div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">PUESTO</label>
    <div class="col-sm-3">
       <select class="form-control"  id="puesto_usu" name="puesto_usu"  data-toggle="tooltip" data-placement="right" title="Seleccione puesto">
         <option>...</option>
          <?php $puesto="SELECT id_puesto as clave, nombre_puesto as puesto from puestos";
              $res2=$mysql->query($puesto);
              
               while($dato=$res2->fetch_row())
                 echo '<option value="'.$dato[0].'">'.strtoupper($dato[1]).'</option>';
                 
              
          ?> 
      </select>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">N.S.S</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nss_usu" name="nss_usu" data-toggle="tooltip" data-placement="right"    
        title="Escriba n&uacute;mero seguro social" maxlength="15">
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">N.EMPLE.</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nemple_usu" name="nemple_usu" value="" readonly>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">IFE</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="ife_usu" name="ife_usu" data-toggle="tooltip" data-placement="right" 
       title="Escriba clave electoral" maxlength="20">
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">RFC</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="rfc_usu" name="rfc_usu" data-toggle="tooltip" data-placement="right" 
       title="Escriba RFC" maxlength="13">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">CUENTA</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="cuenta_usu" name="cuenta_usu" data-toggle="tooltip" data-placement="right" 
             title="Escriba cuenta" >
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">BANCO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="banco_usu" name="banco_usu" data-toggle="tooltip" data-placement="right" 
       title="Escriba banco" >
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">CLAVE</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="clave_usu" name="clave_usu" data-toggle="tooltip" data-placement="right" 
              title="Escriba clave " maxlength="20">
    </div>
  </div>
  
  
</form>
</div>
 <div class="col-md-4">
         <label  class="col-sm-3 control-label">CURP</label>
      <input type="file"  class="file " id="curp_archivo" name="imagenes[]" accept="text">
<br>
 <label  class="col-sm-3 control-label">TARJETA</label>
      <input type="file" class="file" id="tarjeta" name="imagenes[]" accept="text">
<br>
 <label  class="col-sm-3 control-label">IFE</label>
      <input type="file" class="file" id="ife_archivo" name="imagenes[]" accept="text">
    </div>
</div>

  <div class="row" >
  <div class="col-sm-5 col-md-offset-1">
    <div class="row">
      <div class="col-xs-8 col-sm-6" align="right">
  <button  class="btn btn-default btn-primary" type="button" id="cancelar" name="cancelar">Cancelar</button>    
      </div>
      <div class="col-xs-4 col-sm-6" align="left">
       <button class="btn btn-default btn-primary" type="button" id="valida" name="valida" >Siguiente &rarr;</button>
      </div>
    </div>
  </div>
</div>	


<div class="progress nover">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="min-width: 60em">
    <span>60% Completado</span>
  </div>
</div>

<script src="config/valida_campo_registro_dd.js"></script>
<script type="text/javascript">

   $(document).ready(function(){
   
         localStorage.clear();

        $("#curp_archivo").change(function(){
        var curp_ruta = $("#curp_archivo").val();
          if(curp_ruta!=""){     
	          localStorage.setItem("curp_dir", curp_ruta);
	        }   
        });
        
       $("#tarjeta").change(function(){
        var tarjeta_ruta = $("#tarjeta").val();
         if(tarjeta_ruta!=""){
	          localStorage.setItem("tarjeta_dir", tarjeta_ruta);
	        }
        
       });  
        
        $("#ife_archivo").change(function(){
        var ife_ruta = $("#ife_archivo").val();
           if(ife_ruta!=""){
	          localStorage.setItem("ife_dir", ife_ruta);
	        }
        });
 
         $.get("config/busca_empleado.php",function(data){
              if(data){    
               $("#nemple_usu").val(data);
               }
             });
              
   });  
 



</script>
<script>

$("#curp_archivo").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
	dropZoneTitleClass:"file-drop-zone-title2",
    initialCaption: 'Initial-Image.jpg',
    initialPreviewShowDelete: false,
    showRemove: false,
	showCaption: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["png","txt","jpg","pdf"]
});
$("#tarjeta").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
	dropZoneTitleClass:"file-drop-zone-title2 ",
    initialCaption: 'Initial-Image.jpg',
    initialPreviewShowDelete: false,
    showRemove: false,
	showCaption: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["png","txt","jpg","pdf"]
});
$("#ife_archivo").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
	dropZoneTitleClass:"file-drop-zone-title2",
    initialCaption: 'Initial-Image.jpg',
    initialPreviewShowDelete: false,
    showRemove: false,
	showCaption: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["png","txt","jpg","pdf"]
});
</script>
