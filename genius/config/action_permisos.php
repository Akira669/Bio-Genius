<?php
$path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('./connectionDB.php');
require_once('./verifica.php');
login('login.php');

$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuraci¨®n: " . $mysql->connect_errno() . PHP_EOL;
}
//echo "principal conectado:".$mysql->host_info;
if(!empty($_GET['id_user'])){
$id_user=$_GET['id_user'];
}else{
 echo '<div class="row">
          <div class="col-md-6 col-md-offset-2 text-center" style="padding-left:150px; padding-top:50px;" >
              <img src="img/warning.png"><br>
             <b> ERROR!!!<br> Al obtener empleado... Consulta tu administrador <b>
          </div>
      </div>';
    exit();  
}   
$nu_trabajador=$id_user;
$consulta="SELECT nombre,a_paterno,a_materno from personal_genius where id_personal='$id_user'";
$respuesta=$mysql->query($consulta);
  $datos=$respuesta->fetch_row();
  if($datos){
  $nombre=strtoupper($datos[0]." ".$datos[1]." ".$datos[2]);
  }else{
  echo '<div class="row">
          <div class="col-md-6 col-md-offset-2 text-center" style="padding-left:150px; padding-top:50px;" >
              <img src="img/warning.png"><br>
             <b> ERROR!!!<br> Al obtener empleado... Consulta tu administrador <b>
          </div>
      </div>';
    exit();  
  }
  ?>
<div class="row">
     <div class=" alert alert-success col-md-5  col-md-offset-1 ">
<h5><strong><center>Se le asignar&aacute;n permisos al empleado:</center></strong>
 <br>No. Empleado: <b>G<?php echo $id_user;?></b><br>
 Nombre completo: <b><?php echo utf8_encode($nombre);?></b></h5>
 <input type="text" name="empleado" id="empleado" value="<?php echo $nu_trabajador; ?>" style="display:none;">
  <input type="text" name="nom_empleado" id="nom_empleado" value="<?php echo $nombre; ?>" style="display:none;">
     </div>
</div>


<div class="row">
  <div class="col-md-2 " ></div>
  <div class="col-md-2 " >
  <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
            where id_usuario='$id_user' and departamento ='1'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
	
   }else{
   $datos[0]="";
   $datos[1]="";
   $datos[2]="";
   $datos[3]="";
   $datos[4]="";
   }
  ?>
    <div class="form-group" align="center"><label class="col-sm-12 control-label"> ADMINISTRACI&Oacute;N </label></div>
    <!-- <div class="form-group">
        <label for="total_administracion" class="col-sm-7 control-label">CONTROL TOTAL: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_administracion" > </div>
    </div> -->
    <div class="form-group">
        <label for="crear_administracion" class="col-sm-5 control-label">CREAR: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_administracion" 
        <?php if($datos[0]=='1') echo 'checked';?> > </div>
    </div>
    <div class="form-group">
        <label for="leer_administracion" class="col-sm-5 control-label">LEER: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_administracion" 
         <?php if($datos[1]=='1') echo 'checked';?>> </div>
    </div>
    <div class="form-group">
        <label for="modificar_administracion" class="col-sm-5 control-label">MODIFICAR: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_administracion" 
         <?php if($datos[2]=='1') echo 'checked';?>> </div>
    </div>
    <div class="form-group">
        <label for="borrar_administracion" class="col-sm-5 control-label">BORRAR: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_administracion" 
         <?php if($datos[3]=='1') echo 'checked';?>> </div>
    </div>
    <div class="form-group">
        <label for="reportes_administracion" class="col-sm-5 control-label">REPORTES: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_administracion" 
         <?php if($datos[4]=='1') echo 'checked';?>> </div>
    </div>
  </div>
 <div style="padding-left:50px;"></div>
 <div class="col-md-2 " align="center">
  <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='2'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
   <div class="form-group"><label class="col-sm-12 control-label"> TALENTO HUMANO </label></div>
   <!--<div class="form-group">
       <label for="total_humano" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_humano" > </div>
   </div> -->
   <div class="form-group">
       <label for="crear_humano" class="col-sm-5 control-label">CREAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_humano" 
        <?php if($datos[0]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="leer_humano" class="col-sm-5 control-label">LEER: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_humano" 
        <?php if($datos[1]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="modificar_humano" class="col-sm-5 control-label">MODIFICAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_humano" 
        <?php if($datos[2]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="borrar_humano" class="col-sm-5 control-label">BORRAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_humano" 
        <?php if($datos[3]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="reportes_humano" class="col-sm-5 control-label">REPORTES: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_humano" 
        <?php if($datos[4]=='1') echo 'checked';?> > </div>
   </div>
 </div>
<div style="padding-left:50px;"></div>
 <div class="col-md-2 " align="center">
 <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='3'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
   <div class="form-group"><label class="col-sm-12 control-label"> VENTAS </label></div>
   <!--<div class="form-group">
       <label for="total_ventas" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_ventas" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_ventas" class="col-sm-5 control-label">CREAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_ventas" 
       <?php if($datos[0]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="leer_ventas" class="col-sm-5 control-label">LEER: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_ventas" 
       <?php if($datos[1]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="modificar_ventas" class="col-sm-5 control-label">MODIFICAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_ventas" 
       <?php if($datos[2]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="borrar_administracion" class="col-sm-5 control-label">BORRAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_administracion" 
       <?php if($datos[3]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="reportes_ventas" class="col-sm-5 control-label">REPORTES: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_ventas" 
       <?php if($datos[4]=='1') echo 'checked';?>> </div>
   </div>
 </div>
<div style="padding-left:50px;"></div>
 <div class="col-md-2 " align="center">
 <?php
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='4'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
   <div class="form-group"><label class="col-sm-12 control-label"> PRODUCCI&Oacute;N </label></div>
   <!--<div class="form-group">
       <label for="total_produccion" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_produccion" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_produccion" class="col-sm-5 control-label">CREAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_produccion" 
        <?php if($datos[0]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="leer_produccion" class="col-sm-5 control-label">LEER: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_produccion" 
        <?php if($datos[1]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="modificar_produccion" class="col-sm-5 control-label">MODIFICAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_produccion" 
        <?php if($datos[2]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="borrar_produccion" class="col-sm-5 control-label">BORRAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_produccion" 
        <?php if($datos[3]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="reportes_produccion" class="col-sm-5 control-label">REPORTES: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_produccion" 
        <?php if($datos[4]=='1') echo 'checked';?>> </div>
   </div>
 </div>

</div>
<br><br>
<!-- //termina  primero 4 modulos de permiso -->
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-2 " align="center">
   <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='5'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
    <div class="form-group"><label class="col-sm-12 control-label"> ALMAC&Eacute;N </label></div>
    <!--<div class="form-group">
        <label for="total_almacen" class="col-sm-7 control-label">CONTROL TOTAL: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_almacen" > </div>
    </div>-->
    <div class="form-group">
        <label for="crear_almacen" class="col-sm-5 control-label">CREAR: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_almacen" 
         <?php if($datos[0]=='1') echo 'checked';?> > </div>
    </div>
    <div class="form-group">
        <label for="leer_almacen" class="col-sm-5 control-label">LEER: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_almacen" 
         <?php if($datos[1]=='1') echo 'checked';?> > </div>
    </div>
    <div class="form-group">
        <label for="modificar_almacen" class="col-sm-5 control-label">MODIFICAR: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_almacen" 
         <?php if($datos[2]=='1') echo 'checked';?>> </div>
    </div>
    <div class="form-group">
        <label for="borrar_almacen" class="col-sm-5 control-label">BORRAR: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_almacen" 
         <?php if($datos[3]=='1') echo 'checked';?>> </div>
    </div>
    <div class="form-group">
        <label for="reportes_almacen" class="col-sm-5 control-label">REPORTES: </label>
        <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_almacen" 
         <?php if($datos[4]=='1') echo 'checked';?> > </div>
    </div>
  </div>
  <div style="padding-left:50px;"></div>
 <div class="col-md-2" align="center">
 <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='6'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
   <div class="form-group"><label class="col-sm-12 control-label"> LOG&Iacute;STICA </label></div>
   <!--<div class="form-group">
       <label for="total_logistica" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_logistica" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_logistica" class="col-sm-5 control-label">CREAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_logistica"
        <?php if($datos[0]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="leer_logistica" class="col-sm-5 control-label">LEER: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_logistica" 
        <?php if($datos[1]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="modificar_logistica" class="col-sm-5 control-label">MODIFICAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_logistica" 
        <?php if($datos[2]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="borrar_logistica" class="col-sm-5 control-label">BORRAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_logistica" 
        <?php if($datos[3]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="reportes_logistica" class="col-sm-5 control-label">REPORTES: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_logistica" 
        <?php if($datos[4]=='1') echo 'checked';?> > </div>
   </div>
 </div>
<div style="padding-left:50px;"></div>
 <div class="col-md-2 " align="center">
  <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='8'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
   <div class="form-group"><label class="col-sm-12 control-label"> SEGURIDAD </label></div>
   <!-- <div class="form-group">
       <label for="total_seguridad" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_seguridad" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_seguridad" class="col-sm-5 control-label">CREAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_seguridad" 
       <?php if($datos[0]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="leer_seguridad" class="col-sm-5 control-label">LEER: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_seguridad" 
       <?php if($datos[1]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="modificar_seguridad" class="col-sm-5 control-label">MODIFICAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_seguridad" 
       <?php if($datos[2]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="borrar_seguridad" class="col-sm-5 control-label">BORRAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_seguridad" 
       <?php if($datos[3]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="reportes_seguridad" class="col-sm-5 control-label">REPORTES: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_seguridad" 
       <?php if($datos[4]=='1') echo 'checked';?>> </div>
   </div>
 </div>
<div style="padding-left:50px;"></div>
 <div class="col-md-2 " align="center">
 <?php 
   if($nu_trabajador!=""){
    $admin="SELECT crear,leer,modificar,borrar,reportes from permisos_usuario 
                                          where id_usuario='$id_user' and departamento ='7'";
    $res=$mysql->query($admin);
     $datos=$res->fetch_row();
   }
  ?>
   <div class="form-group"><label class="col-sm-12 control-label"> MARKETING </label></div>
   <!-- <div class="form-group">
       <label for="total_marketing" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_marketing" > </div>
   </div> -->
   <div class="form-group">
       <label for="crear_marketing" class="col-sm-5 control-label">CREAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="crear_marketing" 
        <?php if($datos[0]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="leer_marketing" class="col-sm-5 control-label">LEER: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="leer_marketing" 
        <?php if($datos[1]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="modificar_marketing" class="col-sm-5 control-label">MODIFICAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="modificar_marketing" 
        <?php if($datos[2]=='1') echo 'checked';?>> </div>
   </div>
   <div class="form-group">
       <label for="borrar_marketing" class="col-sm-5 control-label">BORRAR: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="borrar_marketing"
        <?php if($datos[3]=='1') echo 'checked';?> > </div>
   </div>
   <div class="form-group">
       <label for="reportes_marketing" class="col-sm-5 control-label">REPORTES: </label>
       <div class="col-sm-3"> <input type="checkbox" class="form-control" id="reportes_marketing" 
        <?php if($datos[4]=='1') echo 'checked';?> > </div>
   </div>
 </div>

</div>
<br>
<p align="center">
  <button id="envia_permiso" type="button" class="btn btn-primary">Asignar Permisos</button>
</p>
<div id="debug"></div>
<script src="config/permisos_usuario.js"></script>
<?php $mysql->close(); ?>