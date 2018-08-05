$("#envia_permiso").click(function(){

    var id_user=$("#empleado").val();
    var nom_user=$("#nom_empleado").val();
    // ADMINISTRACION
    var crear_admin=0,leer_admin=0, modifi_admin=0, bora_admin=0, reporte_admin=0;
   if($("#crear_administracion").is(':checked')){
     crear_admin=1;
   }if($("#leer_administracion").is(':checked')){
     leer_admin=1;
   }if($("#modificar_administracion").is(':checked')){
    modifi_admin=1;
  }if($("#borrar_administracion").is(':checked')){
    bora_admin=1;
  }if($("#reportes_administracion").is(':checked')){
    reporte_admin=1;
  }
  
  //alert(crear_admin+"-"+leer_admin+"-"+modifi_admin+"-"+bora_admin+"-"+reporte_admin);

  //TALENTO HUMANO
  var crear_hum=0,leer_hum=0, modifi_hum=0, bora_hum=0, reporte_hum=0;
 if($("#crear_humano").is(':checked')){
   crear_hum=1;
 }if($("#leer_humano").is(':checked')){
   leer_hum=1;
 }if($("#modificar_humano").is(':checked')){
  modifi_hum=1;
}if($("#borrar_humano").is(':checked')){
  bora_hum=1;
}if($("#reportes_humano").is(':checked')){
  reporte_hum=1;
}
//alert(crear_hum+"-"+leer_hum+"-"+modifi_hum+"-"+bora_hum+"-"+reporte_hum);

    //VENTAS
    var crear_ven=0,leer_ven=0, modifi_ven=0, bora_ven=0, reporte_ven=0;
   if($("#crear_ventas").is(':checked')){
     crear_ven=1;
   }if($("#leer_ventas").is(':checked')){
     leer_ven=1;
   }if($("#modificar_ventas").is(':checked')){
    modifi_ven=1;
  }if($("#borrar_ventas").is(':checked')){
    bora_ven=1;
  }if($("#reportes_ventas").is(':checked')){
    reporte_ven=1;
  }
  //alert(crear_ven+"-"+leer_ven+"-"+modifi_ven+"-"+bora_ven+"-"+reporte_ven);

  //PRODUCCION
  var crear_pro=0,leer_pro=0, modifi_pro=0, bora_pro=0, reporte_pro=0;
 if($("#crear_produccion").is(':checked')){
   crear_pro=1;
 }if($("#leer_produccion").is(':checked')){
   leer_pro=1;
 }if($("#modificar_produccion").is(':checked')){
  modifi_pro=1;
}if($("#borrar_produccion").is(':checked')){
  bora_pro=1;
}if($("#reportes_produccion").is(':checked')){
  reporte_pro=1;
}
//alert(crear_pro+"-"+leer_pro+"-"+modifi_pro+"-"+bora_pro+"-"+reporte_pro);

//ALMACEN
var crear_alm=0,leer_alm=0, modifi_alm=0, bora_alm=0, reporte_alm=0;
if($("#crear_almacen").is(':checked')){
 crear_alm=1;
}if($("#leer_almacen").is(':checked')){
 leer_alm=1;
}if($("#modificar_almacen").is(':checked')){
modifi_alm=1;
}if($("#borrar_almacen").is(':checked')){
bora_alm=1;
}if($("#reportes_almacen").is(':checked')){
reporte_alm=1;
}
//alert(crear_alm+"-"+leer_alm+"-"+modifi_alm+"-"+bora_alm+"-"+reporte_alm);

//LOGISTICA
var crear_log=0,leer_log=0, modifi_log=0, bora_log=0, reporte_log=0;
if($("#crear_logistica").is(':checked')){
 crear_log=1;
}if($("#leer_logistica").is(':checked')){
 leer_log=1;
}if($("#modificar_logistica").is(':checked')){
modifi_log=1;
}if($("#borrar_logistica").is(':checked')){
bora_log=1;
}if($("#reportes_logistica").is(':checked')){
reporte_log=1;
}
//alert(crear_log+"-"+leer_log+"-"+modifi_log+"-"+bora_log+"-"+reporte_log);

//SEGURIDAD
var crear_seg=0,leer_seg=0, modifi_seg=0, bora_seg=0, reporte_seg=0;
if($("#crear_seguridad").is(':checked')){
 crear_seg=1;
}if($("#leer_seguridad").is(':checked')){
 leer_seg=1;
}if($("#modificar_seguridad").is(':checked')){
modifi_seg=1;
}if($("#borrar_seguridad").is(':checked')){
bora_seg=1;
}if($("#reportes_seguridad").is(':checked')){
reporte_seg=1;
}
//alert(crear_seg+"-"+leer_seg+"-"+modifi_seg+"-"+bora_seg+"-"+reporte_seg);

//MARKETING
var crear_mak=0,leer_mak=0, modifi_mak=0, bora_mak=0, reporte_mak=0;
if($("#crear_marketing").is(':checked')){
 crear_mak=1;
}if($("#leer_marketing").is(':checked')){
 leer_mak=1;
}if($("#modificar_marketing").is(':checked')){
modifi_mak=1;
}if($("#borrar_marketing").is(':checked')){
bora_mak=1;
}if($("#reportes_marketing").is(':checked')){
reporte_mak=1;
}
    if(id_user!=null){
bootbox.confirm("Asignarle permisos al empleado "+nom_user,function(result){
    if(result){
      $.post("config/configg_permisos.php",{"id_user":id_user,
"crear_admin":crear_admin,"leer_admin":leer_admin,"modifi_admin":modifi_admin,"bora_admin":bora_admin,"reporte_admin":reporte_admin,
"crear_hum":crear_hum,"leer_hum":leer_hum,"modifi_hum":modifi_hum,"bora_hum":bora_hum,"reporte_hum":reporte_hum,
"crear_ven":crear_ven,"leer_ven":leer_ven,"modifi_ven":modifi_ven,"bora_ven":bora_ven,"reporte_ven":reporte_ven,
"crear_pro":crear_pro,"leer_pro":leer_pro,"modifi_pro":modifi_pro,"bora_pro":bora_pro,"reporte_pro":reporte_pro,
"crear_alm":crear_alm,"leer_alm":leer_alm,"modifi_alm":modifi_alm,"bora_alm":bora_alm,"reporte_alm":reporte_alm,
"crear_log":crear_log,"leer_log":leer_log,"modifi_log":modifi_log,"bora_log":bora_log,"reporte_log":reporte_log,
"crear_seg":crear_seg,"leer_seg":leer_seg,"modifi_seg":modifi_seg,"bora_seg":bora_seg,"reporte_seg":reporte_seg,
"crear_mak":crear_mak,"leer_mak":leer_mak,"modifi_mak":modifi_mak,"bora_mak":bora_mak,"reporte_mak":reporte_mak 
      },function(data){
          if(data){
            bootbox.alert("Permisos asignados!!! CORRECTAMENTE...",function(){
             location.reload();
           });
          }else{
            alert("ERROR!!! No se asignaron los permisos... 2.0");
            location.reload();
          }

        });
    }
});
    }else{
      bootbox.alert("Ingrese un empleado valido...",function(){
        
      });
    }
});
