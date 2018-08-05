<?php
$path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('./connectionDB.php');
require_once('./verifica.php');
login('login.php');

$mysql = new conecta_mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuración: " . $mysql->connect_errno() . PHP_EOL;
}
//echo "principal conectado:".$mysql->host_info;
$nu_trabajador="100";
$nombre="ALDO";

print_titulo("Se le asiganara permisos al siguiente trabajador: <br> No. de  empleado: ".$nu_trabajador."<br> Nombre completo: ".$nombre);
?>
<form name="permisos" class="form-horizontal" id="permi" action="" method="">
<div class="row">

  <div class="col-md-3 well well-sm">
    <div class="form-group"><label class="col-sm-8 control-label"> ADMINISTRACION </label></div>
    <!-- <div class="form-group">
        <label for="total_administracion" class="col-sm-7 control-label">CONTROL TOTAL: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_administracion" > </div>
    </div> -->
    <div class="form-group">
        <label for="crear_administracion" class="col-sm-7 control-label">CREAR: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_administracion" > </div>
    </div>
    <div class="form-group">
        <label for="leer_administracion" class="col-sm-7 control-label">LEER: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_administracion" > </div>
    </div>
    <div class="form-group">
        <label for="modificar_administracion" class="col-sm-7 control-label">MODIFICAR: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_administracion" > </div>
    </div>
    <div class="form-group">
        <label for="borrar_administracion" class="col-sm-7 control-label">BORRAR: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_administracion" > </div>
    </div>
    <div class="form-group">
        <label for="reportes_administracion" class="col-sm-7 control-label">REPORTES: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_administracion" > </div>
    </div>
  </div>

 <div class="col-md-3 well well-sm">
   <div class="form-group"><label class="col-sm-9 control-label"> TALENTO HUMANO </label></div>
   <!--<div class="form-group">
       <label for="total_humano" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_humano" > </div>
   </div> -->
   <div class="form-group">
       <label for="crear_humano" class="col-sm-7 control-label">CREAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_humano"> </div>
   </div>
   <div class="form-group">
       <label for="leer_humano" class="col-sm-7 control-label">LEER: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_humano" > </div>
   </div>
   <div class="form-group">
       <label for="modificar_humano" class="col-sm-7 control-label">MODIFICAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_humano" > </div>
   </div>
   <div class="form-group">
       <label for="borrar_humano" class="col-sm-7 control-label">BORRAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_humano" > </div>
   </div>
   <div class="form-group">
       <label for="reportes_humano" class="col-sm-7 control-label">REPORTES: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_humano" > </div>
   </div>
 </div>

 <div class="col-md-3 well well-sm">
   <div class="form-group"><label class="col-sm-7 control-label"> VENTAS </label></div>
   <!--<div class="form-group">
       <label for="total_ventas" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_ventas" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_ventas" class="col-sm-7 control-label">CREAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_ventas" > </div>
   </div>
   <div class="form-group">
       <label for="leer_ventas" class="col-sm-7 control-label">LEER: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_ventas" > </div>
   </div>
   <div class="form-group">
       <label for="modificar_ventas" class="col-sm-7 control-label">MODIFICAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_ventas" > </div>
   </div>
   <div class="form-group">
       <label for="borrar_administracion" class="col-sm-7 control-label">BORRAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_administracion" > </div>
   </div>
   <div class="form-group">
       <label for="reportes_ventas" class="col-sm-7 control-label">REPORTES: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_ventas" > </div>
   </div>
 </div>

 <div class="col-md-3 well well-sm">
   <div class="form-group"><label class="col-sm-7 control-label"> PRODUCCION </label></div>
   <!--<div class="form-group">
       <label for="total_produccion" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_produccion" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_produccion" class="col-sm-7 control-label">CREAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_produccion" > </div>
   </div>
   <div class="form-group">
       <label for="leer_produccion" class="col-sm-7 control-label">LEER: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_produccion" > </div>
   </div>
   <div class="form-group">
       <label for="modificar_produccion" class="col-sm-7 control-label">MODIFICAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_produccion" > </div>
   </div>
   <div class="form-group">
       <label for="borrar_produccion" class="col-sm-7 control-label">BORRAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_produccion" > </div>
   </div>
   <div class="form-group">
       <label for="reportes_produccion" class="col-sm-7 control-label">REPORTES: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_produccion" > </div>
   </div>
 </div>

</div>

<div class="row">

  <div class="col-md-3 well well-sm">
    <div class="form-group"><label class="col-sm-7 control-label"> ALMACEN </label></div>
    <!--<div class="form-group">
        <label for="total_almacen" class="col-sm-7 control-label">CONTROL TOTAL: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_almacen" > </div>
    </div>-->
    <div class="form-group">
        <label for="crear_almacen" class="col-sm-7 control-label">CREAR: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_almacen" > </div>
    </div>
    <div class="form-group">
        <label for="leer_almacen" class="col-sm-7 control-label">LEER: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_almacen" > </div>
    </div>
    <div class="form-group">
        <label for="modificar_almacen" class="col-sm-7 control-label">MODIFICAR: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_almacen" > </div>
    </div>
    <div class="form-group">
        <label for="borrar_almacen" class="col-sm-7 control-label">BORRAR: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_almacen" > </div>
    </div>
    <div class="form-group">
        <label for="reportes_almacen" class="col-sm-7 control-label">REPORTES: </label>
        <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_almacen" > </div>
    </div>
  </div>

 <div class="col-md-3 well well-sm">
   <div class="form-group"><label class="col-sm-9 control-label"> LOGISTICA </label></div>
   <!--<div class="form-group">
       <label for="total_logistica" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_logistica" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_logistica" class="col-sm-7 control-label">CREAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_logistica"> </div>
   </div>
   <div class="form-group">
       <label for="leer_logistica" class="col-sm-7 control-label">LEER: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_logistica" > </div>
   </div>
   <div class="form-group">
       <label for="modificar_logistica" class="col-sm-7 control-label">MODIFICAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_logistica" > </div>
   </div>
   <div class="form-group">
       <label for="borrar_logistica" class="col-sm-7 control-label">BORRAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_logistica" > </div>
   </div>
   <div class="form-group">
       <label for="reportes_logistica" class="col-sm-7 control-label">REPORTES: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_logistica" > </div>
   </div>
 </div>

 <div class="col-md-3 well well-sm">
   <div class="form-group"><label class="col-sm-7 control-label"> SEGURIDAD </label></div>
   <!-- <div class="form-group">
       <label for="total_seguridad" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_seguridad" > </div>
   </div>-->
   <div class="form-group">
       <label for="crear_seguridad" class="col-sm-7 control-label">CREAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_seguridad" > </div>
   </div>
   <div class="form-group">
       <label for="leer_seguridad" class="col-sm-7 control-label">LEER: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_seguridad" > </div>
   </div>
   <div class="form-group">
       <label for="modificar_seguridad" class="col-sm-7 control-label">MODIFICAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_seguridad" > </div>
   </div>
   <div class="form-group">
       <label for="borrar_seguridad" class="col-sm-7 control-label">BORRAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_seguridad" > </div>
   </div>
   <div class="form-group">
       <label for="reportes_seguridad" class="col-sm-7 control-label">REPORTES: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_seguridad" > </div>
   </div>
 </div>

 <div class="col-md-3 well well-sm">
   <div class="form-group"><label class="col-sm-7 control-label"> MARKETING </label></div>
   <!-- <div class="form-group">
       <label for="total_marketing" class="col-sm-7 control-label">CONTROL TOTAL: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="total_marketing" > </div>
   </div> -->
   <div class="form-group">
       <label for="crear_marketing" class="col-sm-7 control-label">CREAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="crear_marketing" > </div>
   </div>
   <div class="form-group">
       <label for="leer_marketing" class="col-sm-7 control-label">LEER: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="leer_marketing" > </div>
   </div>
   <div class="form-group">
       <label for="modificar_marketing" class="col-sm-7 control-label">MODIFICAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="modificar_marketing" > </div>
   </div>
   <div class="form-group">
       <label for="borrar_marketing" class="col-sm-7 control-label">BORRAR: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="borrar_marketing" > </div>
   </div>
   <div class="form-group">
       <label for="reportes_marketing" class="col-sm-7 control-label">REPORTES: </label>
       <div class="col-sm-2"> <input type="checkbox" class="form-control" id="reportes_marketing" > </div>
   </div>
 </div>

</div>

<p>
  <button type="button" class="btn btn-primary">Default button</button>
  <button type="button" class="btn btn-default">Default button</button>
</p>

</form>
