<?php  
	if (isset($_GET['cuenta'])){ 	

// codigo para la conexion de la BD en archvivos php
$path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('./connectionDB.php');
require_once('./verifica.php');
//login('login.php');
 
$hola=$_GET['cuenta'];
$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
   echo "errno de depuraci¨®n: " . $mysql->connect_errno() . PHP_EOL;
}
	
 $consulta_add="select personal_genius.id_usuario as idusuario,nombre,a_paterno,a_materno,fecha_nacimiento,edad,direccion,colonia,municipio_delegacion,estado,ciudad,pais,cp,tel_movil,tel_casa,email_personal,
 email_empresarial,tel_otro,dir_foto,departamento,puesto,numero_empleado,RFC,nombre_banco,CURP,NSS,clave_IFE,cuenta_banco,clave_banco,dir_curp,dir_tarjeta,dir_ife ,pass_usuario from personal_genius inner join usuario on usuario.id_usuario=personal_genius.id_personal  where personal_genius.id_personal='".$_GET['cuenta']."'";
if($mysql->query($consulta_add)){
		$mysql->errno; 
	 }
	 $resultado=$mysql->prepare($consulta_add);
	 $resultado->execute();
	 $resultado->bind_result($idusuario,$nombre,$a_paterno,$a_materno,$fecha_nacimiento,$edad,$direccion,$colonia,$municipio_delegacion,$estado,$ciudad,$pais,$cp,$tel_movil,$tel_casa,$email_personal,$email_empresarial,$tel_otro,$dir_foto,$departamento,$puesto,$numero_empleado,$RFC,$nombre_banco,$CURP,$NSS,$clave_IFE,$cuenta_banco,$clave_banco,$dir_curp,$dir_tarjeta,$dir_ife,$passusuario);
	 $resultado->fetch();	 
	   $resultado->close();
	   
              
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

<?print_titulo("Editar usuario");?>
<br>
<div class="row">
  <div class="col-md-8">
<form name="form" class="form-horizontal" method="get" action="config/action_edita.php">


<?php if($hola!=""&&$nombre!=""){?>
<div class="row">
     <div class=" alert alert-success col-md-5  col-md-offset-1 ">
<h5><strong><center>Se modificaran datos al empleado:</center></strong>
 <br>No. Empleado: <b>G<?php echo $hola;?></b><br>
</h5>
 <input type="text" name="empleado" id="empleado" value="<?php echo $hola; ?>" style="display:none;">
  <input type="text" name="nom_empleado" id="nom_empleado" value="<?php echo $nombre; ?>" style="display:none;">
     </div>
</div>
<?php }else{?>
<div class="row">
<div class="alert alert-info col-md-6 col-md-offset-1" role="alert">
    <?php echo "no exixte";?>
</div>
 </div>
 <?php  } ?>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">USER</label>
    <div class="col-sm-3">
      <input type="text" style="text-transform: uppercase" data-toggle="tooltip" data-placement="bottom" title="Escriba el nombre para generar el usuario" class="form-control" id="user_usu" name="user_usu" value="<?php echo $idusuario; ?>" readonly>
      <input type="text" style="display:none;" class="form-control" id="id_numero_user" name="id_numero_user" >
    </div>
	 <label for="inputEmail3" class="col-sm-3 control-label">PASSWORD</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" style="text-transform: uppercase" id="pass_usu" name="pass_usu"  data-toggle="tooltip" data-placement="bottom" title="La contrase&ntilde;a sera cambiada cuando el usuario inicie sesion por primera vez" value="<?php echo $passusuario; ?>"readonly>
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
      <input type="text" class="form-control" id="nombre_usu" name="nombre_usu" value="<?php echo utf8_encode($nombre) ;?>"  data-toggle="tooltip"
       data-placement="top" title="Escriba el nombre del empleado ">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">APELLIDO PATERNO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="app_usu" name="app_usu" data-toggle="tooltip" data-placement="right" title="Escriba apellido paterno" 
      value="<?php echo utf8_encode($a_paterno) ;?>">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">APELLIDO MATERNO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="apm_usu" name="apm_usu" data-toggle="tooltip" data-placement="top" title="Escriba apellido materno"
       value="<?php echo utf8_encode($a_materno) ;?>" >
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">NACIMIENTO</label>
    <div class="col-sm-3">
      <input type="date" class="form-control" id="nacimineto_usu" name="nacimineto_usu" value="<?php if($fecha_nacimiento!="") echo $fecha_nacimiento; else echo ""; ?>">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">EDAD</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="edad_usu" name="edad_usu" data-toggle="tooltip" data-placement="right" title="Cuantos a&ntilde;os tiene?" value="<?php echo $edad ;?>">
    </div>
	
  </div>
  
 <div class="form-group">
 	 <label for="inputPassword3" class="col-sm-3 control-label">C&Oacute;DIGO POSTAL</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="codigo_usu" onChange="ex()" name="codigo_usu" data-toggle="tooltip" data-placement="right" title="Escriba c&oacute;digo postal" value="<?php echo $cp ;?>">
    </div>
 
    
	 <label for="inputPassword3" class="col-sm-3 control-label">COLONIA</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="colonia_usu" name="colonia_usu" value="<?php echo utf8_encode($colonia) ;?>">
	  <!--<select class="form-control" placeholder="COLONIA" readonly>
  <option  id="colonia_usu" name="colonia_usu"  ></option>

</select>-->
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">CIUDAD/MUNICIPIO</label>
    <div class="col-sm-3">
      <!--<input type="text" class="form-control" id="ciudad_usu" name="ciudad_usu" placeholder="CIUDAD/MUNICIPIO">-->
	    <select class="form-control" placeholder="CIUDAD/MUNICIPIO">
  <option id="ciudad_usu" name="ciudad_usu" ><?php echo utf8_encode($municipio_delegacion) ;?></option>

</select>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">ESTADO</label>
    <div class="col-sm-3">
      <!--<input type="text" class="form-control" id="estado_usu" name="estado_usu" placeholder="ESTADO">-->
	   <select class="form-control" placeholder="ESTADO">
  <option  id="estado_usu" name="estado_usu"><?php echo $estado ;?></option>

</select>
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">PA&Iacute;S</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="pais_usu" name="pais_usu" data-toggle="tooltip" data-placement="bottom" title="Escriba pa&iacute;s"
       value="<?php echo $pais ;?>">
    </div>
	<label for="inputPassword3" class="col-sm-3 control-label">DIRECCI&Oacute;N</label>
    <div class="col-sm-3">
      <!-- <input type="text" class="form-control" id="direccion_usu" name="direccion_usu">-->
	
	  <textarea class="form-control" rows="5" id="direccion_usu" name="direccion_usu" data-toggle="tooltip" data-placement="right" title="Escriba la direcci&oacute;n" ><?php echo $direccion ;?></textarea>
	  
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label"></label>
    <div class="col-sm-3">
    
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">M&Oacute;VIL</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="movil_usu" name="movil_usu" data-toggle="tooltip" data-placement="right" title="Escriba tel&eacute;fono celular" value="<?php echo $tel_movil ;?>">
    </div>
	
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">CORREO PERSONAL</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="correo_usu" name="correo_usu" data-toggle="tooltip" data-placement="right" title="Escriba e-mail" value="<?php echo $email_personal ;?>">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">TEL&Eacute;FONO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="telp_usu" name="telp_usu" data-toggle="tooltip" data-placement="right" title="Escriba tel&eacute;fono casa" value="<?php echo $tel_casa ;?>">
    </div>
	
  </div>
 <div class="form-group ">
    <label for="inputPassword3" class="col-sm-3 control-label">CORREO OFIC&Iacute;NA</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" style="text-transform: uppercase; font-size: x-small;" id="correoo_usu" name="correoo_usu"  readonly placeholder="@aguagenius.com" data-toggle="tooltip" data-placement="right" title="Se genera automaticamente cuando escribe el nombre" value="<?php echo $email_empresarial ;?>">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">TEL&Eacute;FONO OFI</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="telo_usu" name="telo_usu" data-toggle="tooltip" data-placement="right" title="Escriba tel&eacute;fono oficina" value="<?php echo $tel_otro ;?>">
	  
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
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">AREA</label>
    <div class="col-sm-3">
      <select class="form-control" id="area_usu" name="area_usu"  data-toggle="tooltip" data-placement="top" title="Seleccione area">
     
          <?php 
          $depa2="SELECT id_departamento as id, nombre_departamento as name from departamentos where id_departamento = '$departamento'";
              $ress=$mysql->query($depa2);    
               while($dat=$ress->fetch_row())
                 echo '<option value="'.$dat[0].'">'.strtoupper($dat[1]).'</option>';
          
          $depa="SELECT id_departamento as id, nombre_departamento as name from departamentos where id_departamento <> '$departamento'";
              $res=$mysql->query($depa);    
               while($datos=$res->fetch_row())
                 echo '<option value="'.$datos[0].'">'.strtoupper($datos[1]).'</option>';
          ?>
      </select>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">CURP</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="curp_usu" name="curp_usu" value="<?php echo $CURP; ?>" placeholder="CURP">
    </div>
  </div>
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">PUESTO</label>
    <div class="col-sm-3">
      <select class="form-control"  id="puesto_usu" name="puesto_usu"  data-toggle="tooltip" data-placement="right" title="Seleccione puesto">
       <?php 
              $puesto2="SELECT id_puesto as clave, nombre_puesto as puesto from puestos where id_puesto='$puesto'";
              $res3=$mysql->query($puesto2); 
               while($dato2=$res3->fetch_row())
                 echo '<option value="'.$dato2[0].'">'.strtoupper($dato2[1]).'</option>';
                 
       $puesto="SELECT id_puesto as clave, nombre_puesto as puesto from puestos where id_puesto <> '$puesto'";
              $res2=$mysql->query($puesto); 
               while($dato=$res2->fetch_row())
                 echo '<option value="'.$dato[0].'">'.strtoupper($dato[1]).'</option>';
          ?> 
          </select>
    
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">N.S.S</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nss_usu" name="nss_usu" value="<?php echo $NSS; ?>" placeholder="N.S.S">
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">N.EMPLE.</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nemple_usu" name="nemple_usu" value="<?php echo $numero_empleado; ?>" readonly>
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">IFE</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="ife_usu" name="ife_usu" value="<?php echo $clave_IFE; ?>" placeholder="IFE">
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">RFC</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="rfc_usu" name="rfc_usu" value="<?php echo $RFC; ?>" placeholder="RFC">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">CUENTA</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="cuenta_usu" name="cuenta_usu" value="<?php echo $cuenta_banco; ?>" placeholder="CUENTA">
    </div>
  </div>
  
  
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">BANCO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="banco_usu" name="banco_usu" value="<?php echo $nombre_banco; ?>" placeholder="BANCO">
    </div>
	 <label for="inputPassword3" class="col-sm-3 control-label">CLAVE</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="clave_usu" name="clave_usu" value="<?php echo $clave_banco; ?>" placeholder="CLAVE">
    </div>
  </div>
   
</form>

</div>
  <div class="col-md-4">
     <div style="height:80px;"></div>
     
     <label  class="col-sm-3 control-label">Foto</label>
       <input id="archivos" name="imagenes[]" type="file" class="file-loading" accept="image/*" value="<?php echo $dir_foto; ?>">
       
	     <label  class="col-sm-3 control-label">CURP</label>
		<input type="file"  class="file " id="curp_arh" name="imagenes[]"  accept="image/*" value="<?php echo $dir_curp; ?>">
		<br><br>
 <label  class="col-sm-3 control-label">TARJETA</label>
      <input type="file" class="file" id="tarjeta" name="imagenes[]" accept="image/*" value="<?php echo $dir_tarjeta; ?>">
      
 <label  class="col-sm-3 control-label">IFE</label>
      <input type="file" class="file" id="ife" name="imagenes[]"  accept="image/*" value="<?php echo $dir_ife; ?>">
	 
	 <div class="row" style="padding-top:85px;">
  <div class="col-sm-9 col-md-offset-1">
    <div class="row">
      <!--<div class="col-xs-8 col-sm-6" align="right">
  <button  class="btn btn-default btn-primary disabled" type="button" id="atras" disabled="disabled">&larr; Anterior</button>    
      </div>-->
      <div class="col-xs-5 col-sm-9 col-md-offset-2" align="right">
     <button class="btn btn-primary btn-lg btn-block" type="button" id="guardar" >Guardar</button>
      </div>
    </div>
  </div>
</div>		
		
		</div>
        	
   
</div>
        
      
        
        
        
        

<script src="config/valida_campo_registro_edita.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
   
   localStorage.clear();
   
      var dato_curp="<?php echo $dir_curp; ?>";
       localStorage.setItem("curp_dir", dato_curp); 
        
      var dato_foto="<?php echo $dir_foto; ?>";
      localStorage.setItem("photo", dato_foto);
      
      var dato_tarjeta= "<?php echo $dir_tarjeta; ?>";
      localStorage.setItem("tarjeta_dir", dato_tarjeta);
      
      var dato_ife="<?php echo $dir_ife; ?>";
      localStorage.setItem("ife_dir", dato_ife);
        
    $("#archivos").change(function(){
      var foto_ruta = $("#archivos").val();
	         if(foto_ruta!=""){         
	          localStorage.setItem("photo", foto_ruta);
	        }
   }); 
            
             $("#curp_arh").change(function(){    
        var curp_ruta = $("#curp_arh").val();
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
        
	
	$("#ife").change(function(){
                 var ife_ruta = $("#ife").val();
	         if(ife_ruta!=""){
	          localStorage.setItem("ife_dir", ife_ruta);
	        }
      });
   });
   var foto_ruta_bd="<?php echo $dir_foto; ?>";
     var curp_ruta_bd="<?php echo $dir_curp; ?>";
       var tarjeta_ruta_bd="<?php echo $dir_tarjeta; ?>";
         var ife_ruta_bd="<?php echo $dir_ife; ?>";
   
if( foto_ruta_bd==null || foto_ruta_bd!=""){

        $("#archivos").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
    initialCaption: '<?php echo $dir_foto; ?>', 
    initialPreview: ['<img src="/fotografias/<?php echo $dir_foto; ?>"  style="height:200px; width:200px;" >'],
    initialPreviewShowDelete: false,
    showRemove: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["jpg","txt","pdf","png", "gif"]
});
       } else{
 
           $("#archivos").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
    initialCaption: 'Initial-Image.jpg',
    initialPreviewShowDelete: false,
    showRemove: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["jpg","txt","pdf","png", "gif"]
});
       } 
       
           //Tarjeta 
          
if( tarjeta_ruta_bd !="nula" ){

    $("#tarjeta").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
   dropZoneTitleClass:"file-drop-zone-title2 ",
     initialCaption: '<?php echo $dir_tarjeta; ?>',
    initialPreview: ['<img src="/fotografias/<?php echo $dir_tarjeta; ?>" style="height:200px; width:200px;" >'],
    initialPreviewShowDelete: false,
    showRemove: false,
	showCaption: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions: ["jpg","txt","pdf","png", "gif"]
});
     }else{
         

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

     } 
     
     // CURP

if( curp_ruta_bd !="nula" ) {
	$("#curp_arh").fileinput({
	    uploadUrl: "config/upload.php",
	    autoReplace: true,
	    overwriteInitial: true,
	    showUploadedThumbs: false,
	    maxFileCount: 1,
	    dropZoneTitleClass:"file-drop-zone-title2 ",
	    initialCaption: '<?php echo $dir_curp; ?>',
	    initialPreview: ['<img src="/fotografias/<?php echo $dir_curp; ?>" style="height:200px; width:200px;" >'],
	    initialPreviewShowDelete: false,
	    showRemove: false,
	    //showCaption: false,
	    showClose: false,
	    layoutTemplates: {actionDelete: ''}, 
	    allowedFileExtensions:  ["jpg","txt","pdf","png", "gif"]
	});
}else{
   $("#curp_arh").fileinput({
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
 }
 
         // IFE
   
       if( ife_ruta_bd!="nula"  ) {
       $("#ife").fileinput({
    uploadUrl: "config/upload.php",
    autoReplace: true,
    overwriteInitial: true,
    showUploadedThumbs: false,
    maxFileCount: 1,
    dropZoneTitleClass:"file-drop-zone-title2",
    initialCaption: '<?php echo $dir_ife; ?>',
    initialPreview: ['<img src="/fotografias/<?php echo $dir_ife; ?>" style="height:200px; width:200px;" >'],
    initialPreviewShowDelete: false,
    showRemove: false,
   // showCaption: false,
    showClose: false,
    layoutTemplates: {actionDelete: ''}, 
    allowedFileExtensions:  ["jpg","txt","pdf","png", "gif"]
});
       }else{
       $("#ife").fileinput({
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
       }
   
</script>



<script type="text/javascript">
      $(document).ready(function(){
      
       var d = new Date();
       var ano_actual = d.getFullYear("Y");
      
          $("#nombre_usu").keyup(function(){
            var user=$(this).val();
                  if(user!=""){
                   var username= user.toUpperCase(); 
             $.get("config/busca_empleado.php",function(data){
              if(data){
            //  $("#id_numero_user").val(data);
               var listouser = username.replace(" ","");
               $("#user_usu").val(listouser+"G"+data);
              // $("#pass_usu").val(user.toUpperCase()+"G"+data);
               $("#correoo_usu").val(listouser+"G"+data+"@aguagenius.com");
                  }else{
             bootbox.alert("Error al obtener numero empleado consulte administrador",function(){
                   location.reload();
               });  
               }
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
                  var edad = ano_actual-ano_edad;
                    $("#edad_usu").val(edad);
              }
        });
        
      });
</script>