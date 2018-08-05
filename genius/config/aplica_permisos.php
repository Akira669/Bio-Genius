<?php 
 $path=$_SERVER["DOCUMENT_ROOT"].'/genius';
//require_once($path.'/connectionDB.php');
//require_once($path.'/verifica.php');
require_once('../connectionDB.php');
require_once('../verifica.php');
login('login.php');

$mysql = new mysqli($HOSTBD,$USERBD,$PASSBD,$BDNAME);
if(!$mysql){
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;
}
//echo "correcto".$HOSTBD.$USERBD.$PASSBD.$BDNAME;

$id_user=$_POST['id_user'];
       
//ADMINISTRACION
$id_admin=1;
 $crear_admin=$_POST['crear_admin']; $leer_admin=$_POST['leer_admin']; $modifi_admin=$_POST['modifi_admin'];
$bora_admin=$_POST['bora_admin']; $reporte_admin=$_POST['reporte_admin'];
  if($crear_admin==1 || $leer_admin==1 || $modifi_admin==1 || $bora_admin==1 || $reporte_admin==1){
   $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_admin'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_admin', leer='$leer_admin',modificar='$modifi_admin', 
           borrar='$bora_admin',reportes='$reporte_admin' where id_usuario='$id_user' and departamento ='$id_admin'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_admin,'0','$crear_admin','$leer_admin','$modifi_admin',
            '$bora_admin','$reporte_admin')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;       
	       }  
  }
            
          
  

//TALENTO HUMANO
$id_hum=2;
$crear_hum=$_POST['crear_hum']; $leer_hum=$_POST['leer_hum']; $modifi_hum=$_POST['modifi_hum']; 
$bora_hum=$_POST['bora_hum']; $reporte_hum=$_POST['reporte_hum'];
  if($crear_hum==1 || $leer_hum==1 || $modifi_hum==1 || $bora_hum==1 || $reporte_hum==1){
   $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_hum'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_hum', leer='$leer_hum',modificar='$modifi_hum', 
           borrar='$bora_hum',reportes='$reporte_hum' where id_usuario='$id_user' and departamento ='$id_hum'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_hum,'0','$crear_hum','$leer_hum','$modifi_hum',
            '$bora_hum','$reporte_hum')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
	         } 
  }  
      
      

//VENTAS
$id_ven=3;
$crear_ven=$_POST['crear_ven']; $leer_ven=$_POST['leer_ven']; $modifi_ven=$_POST['modifi_ven']; 
$bora_ven=$_POST['bora_ven']; $reporte_ven=$_POST['reporte_ven'];
if($crear_ven==1 || $leer_ven==1 || $modifi_ven==1 || $bora_ven==1 || $reporte_ven==1){
$sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_ven'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_ven', leer='$leer_ven',modificar='$modifi_ven', 
           borrar='$bora_ven',reportes='$reporte_ven' where id_usuario='$id_user' and departamento ='$id_ven'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_ven,'0','$crear_ven','$leer_ven','$modifi_ven',
            '$bora_ven','$reporte_ven')";     
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL; 
	   }
}
 
 
 

//PRODUCCION
$id_pro=4;
$crear_pro=$_POST['crear_pro']; $leer_pro=$_POST['leer_pro']; $modifi_pro=$_POST['modifi_pro'];
$bora_pro=$_POST['bora_pro']; $reporte_pro=$_POST['reporte_pro'];

if($crear_pro==1 || $leer_pro==1 || $modifi_pro==1 || $bora_pro==1 || $reporte_pro==1){
 $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_pro'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_pro', leer='$leer_pro',modificar='$modifi_pro', 
           borrar='$bora_pro',reportes='$reporte_pro' where id_usuario='$id_user' and departamento ='$id_pro'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_pro,'0','$crear_pro','$leer_pro','$modifi_pro',
            '$bora_ven','$reporte_pro')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;        
	    }
}
   
   

//ALMACEN
$id_alm=5;	
$crear_alm=$_POST['crear_alm']; $leer_alm=$_POST['leer_alm']; $modifi_alm=$_POST['modifi_alm']; 
$bora_alm=$_POST['bora_alm']; $reporte_alm=$_POST['reporte_alm'];
   if($crear_alm==1 || $leer_alm==1 || $modifi_alm==1 || $bora_alm==1 || $reporte_alm==1){
   
   $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_alm'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_alm', leer='$leer_alm',modificar='$modifi_alm', 
           borrar='$bora_alm',reportes='$reporte_alm' where id_usuario='$id_user' and departamento ='$id_alm'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_alm,'0','$crear_alm','$leer_alm','$modifi_alm',
            '$bora_alm','$reporte_alm')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;   
       }
   }

 

//LOGISTICA
$id_log=6;
$crear_log=$_POST['crear_log']; $leer_log=$_POST['leer_log']; $modifi_log=$_POST['modifi_log']; 
$bora_log=$_POST['bora_log']; $reporte_log=$_POST['reporte_log'];
   if($crear_log==1 || $leer_log==1 || $modifi_log==1 || $bora_log==1 || $reporte_log==1){
   $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_log'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_log', leer='$leer_log',modificar='$modifi_log', 
           borrar='$bora_log',reportes='$reporte_log' where id_usuario='$id_user' and departamento ='$id_log'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_log,'0','$crear_log','$leer_log','$modifi_log',
            '$bora_log','$reporte_log')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
         }
    
   
   }
    
 

//SEGURIDAD
$id_seg=8;
$crear_seg=$_POST['crear_seg']; $leer_seg=$_POST['leer_seg']; $modifi_seg=$_POST['modifi_seg']; 
$bora_seg=$_POST['bora_seg']; $reporte_seg=$_POST['reporte_seg'];

if($crear_seg==1 || $leer_seg==1 || $modifi_seg==1 || $bora_seg==1 || $reporte_seg==1){

 $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_seg'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_seg', leer='$leer_seg',modificar='$modifi_seg', 
           borrar='$bora_seg',reportes='$reporte_seg' where id_usuario='$id_user' and departamento ='$id_seg'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_seg,'0','$crear_seg','$leer_seg','$modifi_seg',
            '$bora_seg','$reporte_seg')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
}
}

//MARKETING
$id_mak=7;
$crear_mak=$_POST['crear_mak']; $leer_mak=$_POST['leer_mak']; $modifi_mak=$_POST['modifi_mak']; 
$bora_mak=$_POST['bora_mak']; $reporte_mak=$_POST['reporte_mak'];
if($crear_mak==1 || $leer_mak==1 || $modifi_mak==1 || $bora_mak==1 || $reporte_mak==1){

 $sel="SELECT id_usuario,departamento from permisos_usuario where id_usuario='$id_user' and departamento='$id_mak'";
   $res=$mysql->query($sel);
     $datos=$res->fetch_row();
       if($datos[0]!=""&&$datos[1]!=""){
     $upd="UPDATE permisos_usuario set crear='$crear_mak', leer='$leer_mak',modificar='$modifi_mak', 
           borrar='$bora_mak',reportes='$reporte_mak' where id_usuario='$id_user' and departamento ='$id_mak'";
      $update=$mysql->query($upd);   
         if(!$update)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
       }else{
      $ins="INSERT into permisos_usuario values ('$id_user',$id_mak,'0','$crear_mak','$leer_mak','$modifi_mak',
            '$bora_mak','$reporte_mak')"; 
      $insert=$mysql->query($ins);
           if(!$insert)
             echo "errno de depuraci&oacute;n: " . $mysql->connect_errno() . PHP_EOL;  
    }
}



//apartado de permiso
   $existe="SELECT id_usuario,permisos from permisos where id_usuario='$id_user'";
       $si=$mysql->query($existe);
          $da=$si->fetch_row();
          
        if(!$da[0]){
     $insert_p="INSERT INTO permisos  (id_permiso,id_usuario) values('$id_user','$id_user')";
         $in=$mysql->query($insert_p);      
        } 
 
$update_p="UPDATE permisos set permisos = '";
$where=" where id_usuario = '".$id_user."'";
if($crear_admin==1 || $leer_admin==1 || $modifi_admin==1 || $bora_admin==1 || $reporte_admin==1)
   $update_p.="1,";
  
if($crear_hum==1 || $leer_hum==1 || $modifi_hum==1 || $bora_hum==1 || $reporte_hum==1)
   $update_p.="2,";  
          
if($crear_ven==1 || $leer_ven==1 || $modifi_ven==1 || $bora_ven==1 || $reporte_ven==1)
   $update_p.="3,";
   	  
if($crear_pro==1 || $leer_pro==1 || $modifi_pro==1 || $bora_pro==1 || $reporte_pro==1)
   $update_p.="4,";  
     	    	 	
if($crear_alm==1 || $leer_alm==1 || $modifi_alm==1 || $bora_alm==1 || $reporte_alm==1)
   $update_p.="5,";  
                
if($crear_log==1 || $leer_log==1 || $modifi_log==1 || $bora_log==1 || $reporte_log==1)
   $update_p.="6,";
   
 if($crear_mak==1 || $leer_mak==1 || $modifi_mak==1 || $bora_mak==1 || $reporte_mak==1)
   $update_p.="7,"; 
    
if($crear_seg==1 || $leer_seg==1 || $modifi_seg==1 || $bora_seg==1 || $reporte_seg==1)
   $update_p.="8,";

 $update_permi=substr($update_p,0,-1);

$update_permi.="'";


   $res=$mysql->query($update_permi.$where);
	 
$mysql->close();
echo "Listo";

?>