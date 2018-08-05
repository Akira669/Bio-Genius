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
   echo "errno de depuración: " . $mysql->connect_errno() . PHP_EOL;
}
//echo "principal conectado:".$mysql->host_info;
?>
<style>
table td {
    text-align: center;
}
</style>
<div class="container-fluid">
<?

$consulta="SELECT id_personal,nombre,a_paterno,a_materno,fecha_nacimiento,edad,direccion, estado, pais, tel_movil,
email_personal FROM personal_genius";
$resultado=$mysql->query($consulta);
$resultado_info=$mysql->query($consulta);
$datos = $resultado->fetch_row();

   if($datos[0]==""){
      echo '<div class="row">
          <div class="col-md-6 col-md-offset-2 text-center" style="padding-left:150px; padding-top:50px;" >
              <img src="img/warning.png"><br>
             <b> No existen datos <b>
          </div>
      </div>';
    exit();  
   }
   print_titulo("Lista de Empleados");

?>
<table class="table table-striped table-bordered table-condensed" id="resultado">
 <thead>
    <tr>
        <th>Acciones <span class="glyphicon glyphicon-user" aria-hidden="true"></span></th>
      <th>Clave Personal</th>
      <th>Nombre Completo</th>
      <th>Fecha de Nacimiento</th>
      <th>Edad</th>
      <th>Direcci&oacute;n</th>
      <th>Estado</th>
      <th>Pa&iacute;s</th>
      <th>Tel&eacute;fono</th>
      <th>Email</th>
    </tr>
 </thead>
 <tbody>
      <?php while($row = $resultado_info->fetch_row()){?>
    <tr>
      <td>

      <button id="eliminar" name="eliminar" type="button" class="btn btn-danger btn-xs" onclick="eliminar(<?php echo $row[0]; ?>);"   data-toggle="tooltip" data-placement="bottom" title="Eliminar">
      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </button>
  
      
<!--  <a href="genius.php?aplication=config&modulo=action_edita&cuenta=<?php echo  $row[0];?>"> -->
          <button id="editar" type="button" class="btn btn-success btn-xs" onclick="editar_empleado(<?php echo $row[0]; ?>);" 
          data-toggle="tooltip" data-placement="bottom" title="Editar">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </button>
          <!-- </a> -->
              
               <button id="permisos" type="button" class="btn btn-info btn-xs" onclick="permisos(<?php echo  $row[0];?>);" 
               data-toggle="tooltip" data-placement="bottom" title="Permisos">
               <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
               </button>
               
   
      </td>
      <td>G<?php echo $row[0];?></td>
      <td><?php echo $row[1]." ".$row[2]." ".$row[3];?></td>
      <td><?php echo $row[4];?></td>
      <td><?php echo $row[5];?></td>
      <td><?php echo $row[6];?></td>
      <td><?php echo $row[7];?></td>
      <td><?php echo $row[8];?></td>
      <td><?php echo $row[9];?></td>
      <td><?php echo $row[10];?></td>
    </tr>
<?}?>
 </tbody>
</table>
<script src="config/principio.js"></script>

<script type="text/javascript">

function eliminar(id){

 bootbox.confirm("Eliminar empleado "+id+" ?",function(result){
    if(result){
      $.post("config/action_elimina.php",{"id_user":id},function(data){
        if(data){
         bootbox.alert("Empleado con clave: "+id+" ELIMINADO!!!",function(){
            location.reload();
         }); 
        }  
      }); 
    }
 });   
   
}

</script>

</div>
