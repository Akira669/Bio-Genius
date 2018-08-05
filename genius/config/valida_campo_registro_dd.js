		var $dialog=$('<div></div>')
	.html('<p style="font-size:14px; dispaly:inline;"><img style="float:left; margin-top:5px; margin-right:2px; dispaly:inline; width:30px; height:30px; vertical-align:middle;" src="img/agregar.gif"/><span style="style:float:right; margin-top:15px; margin-left:2px;" ><b>informaci&oacute;n correcta</b></span></p>')
	.dialog({
		autoOpen:false,
		title:'<b style="font:14px Verdana,Arial; font-weight:bold;"> Es correcto</b>',
		bgiframe:true,
		resizable:false,
		height:170,
		width:390,
		buttons:{
			'Aceptar':function(){
				document.form.submit();
				 location.href = 'genius.php?aplication=config&modulo=asig_perimisos',100000;
			}	
		}
	});
	
	
	
var $dialog2=$('<div > </div>')
.html('<p style="font-size:14px; display:inline;"><img style="float:left; margin-top:5px; margin-right:2px; display:inline; vertical-align:middle;" src="img/eliminar.gif"/><span style="float:right; margin-top:15px; margin-right:15px;"><b>Complete la informaci&oacute;n solicitada</b><span></p>')
.dialog({
	autoOpen:false,
	title:'<b style="font:12px Verdana,Arial; font-weight:bold;">Validar informaci&oacute;n</b>',
	bgiframe:true,
	resizable:false,
	height:170,
	width:390,
	 buttons: {
		 "Aceptar":function() {
           
           $dialog2.dialog('close');
     
        }
	 }
});



$(document).ready(function(){
	 
                 $("#cancelar").click(function(){
      bootbox.confirm("Cancelar el ingreso de nuevo empleado?",function(result){ 
               if(result){
		 location.href = 'genius.php?aplication=config&modulo=principal';
                  }
           });
	});
           
	

$("#valida").click(function(){

$('*').removeClass('invalid');


	if($("#area_usu").val()==""){
		$dialog2.dialog('open');
		failField('area_usu');
	}
	if($("#curp_usu").val()==""){
		$dialog2.dialog('open');
		failField('curp_usu');
	}
	if($("#puesto_usu").val()==""){
		$dialog2.dialog('open');
		failField('puesto_usu');
	}
	if($("#nss_usu").val()==""){
		$dialog2.dialog('open');
		failField('nss_usu');
	}
	if($("#nemple_usu").val()==""){
		$dialog2.dialog('open');
		failField('nemple_usu');
	}
	if($("#ife_usu").val()==""){
		$dialog2.dialog('open');
		failField('ife_usu');
	}
	if($("rfc_usu").val()==""){
		$dialog2.dialog('open');
		failField('rfc_usu');
	}
	if($("#cuenta_usu").val()==""){
		$dialog2.dialog('open');
		failField('cuenta_usu');
	}
	if($("#banco_usu").val()==""){
		$dialog2.dialog('open');
		failField('banco_usu');
	}
	if($("#clave_usu").val()==""){
		$dialog2.dialog('open');
		failField('clave_usu');
	}
	
	else{
		$dialog.dialog('close');
		$dialog2.dialog('close');
		
		 var nemple=$("#nemple_usu").val(); 
		 var area=$("#area_usu").val();
		 var curp=$("#curp_usu").val();
		 alert(curp);
		 var puesto=$("#puesto_usu").val();
		 var nss=$("#nss_usu").val();
		 var ife=$("#ife_usu").val();
		 var rfc=$("#rfc_usu").val();
		 var cuenta=$("#cuenta_usu").val();
		 var banco=$("#banco_usu").val();
		 var clave=$("#clave_usu").val();
		 
		 var valida=1;
	          
	       var pathh_curp = localStorage.getItem("curp_dir");
	       var pathh_tarjeta = localStorage.getItem("tarjeta_dir");
	       var pathh_ife = localStorage.getItem("ife_dir");

                    var path2_curp="";
                    var path2_tarjeta=""; 
                    var path2_ife="";

              if(pathh_curp!=null && pathh_tarjeta!=null && pathh_ife !=null){
                path2_curp = pathh_curp.split("\\");  
	        path_curp=path2_curp[2];
	       
	        path2_tarjeta = pathh_tarjeta.split("\\");  
	        path_tarjeta=path2_tarjeta[2];
	        
	        path2_ife = pathh_ife.split("\\");  
	        path_ife=path2_ife[2];
              bootbox.confirm("Informacion Correcta!!!",function(result){ 
	            if(result){
        $.get("config/registro_fase.php",{"area":area,"curp":curp,"puesto":puesto,"nss":nss,"ife":ife,"rfc":rfc,
	            "cuenta":cuenta,"banco":banco,"clave":clave,"nemple":nemple,"path_curp":path_curp,"path_tarjeta":path_tarjeta,"path_ife":path_ife });
			localStorage.clear();
			document.form.submit();
			location.href = 'genius.php?aplication=config&modulo=action_permisos&id_user='+nemple;
	            }  
	        }); 
              }else if( ( pathh_ife==null || pathh_ife!=null ) && ( pathh_curp==null || pathh_curp!=null ) && ( pathh_tarjeta ==null || pathh_tarjeta !=null ) ) {
	       
	             if (pathh_ife!=null){
	        path2_ife = pathh_ife.split("\\");  
	        path_ife=path2_ife[2];
	             }else{path_ife="nula";}
	           
	           if( pathh_curp!=null){
	        path2_curp = pathh_curp.split("\\");  
	        path_curp=path2_curp[2];
	           }else {path_curp="nula"; }
	        
	         if(pathh_tarjeta !=null){
	          path2_tarjeta = pathh_tarjeta.split("\\");  
	        path_tarjeta=path2_tarjeta[2];
	         }else{ path_tarjeta="nula";}
	         
                bootbox.confirm("Aun faltan archivos CONTINUAR?!!!",function(result){ 
	            if(result){  
	          
	            $.get("config/registro_fase.php",{"area":area,"curp":curp,"puesto":puesto,"nss":nss,"ife":ife,"rfc":rfc,
	            "cuenta":cuenta,"banco":banco,"clave":clave,"nemple":nemple,"path_curp":path_curp,"path_tarjeta":path_tarjeta,"path_ife":path_ife });
	        localStorage.clear();
		document.form.submit();
		location.href = 'genius.php?aplication=config&modulo=action_permisos&id_user='+nemple;
	            }

	        }); 
              }else if(pathh_ife==null &&  pathh_curp==null && pathh_tarjeta ==null ) {
              
             alert( pathh_ife + pathh_curp + pathh_tarjeta );
	        path_curp="nula"; 
	        path_tarjeta="nula";
	        path_ife="nula";
                bootbox.confirm("No se ha seleccionado ningun archivo CONTINUAR?!!!",function(result){ 
	            if(result){  
	          
	            $.get("config/registro_fase.php",{"area":area,"curp":curp,"puesto":puesto,"nss":nss,"ife":ife,"rfc":rfc,
	            "cuenta":cuenta,"banco":banco,"clave":clave,"nemple":nemple,"path_curp":path_curp,"path_tarjeta":path_tarjeta,"path_ife":path_ife });
	        localStorage.clear();
		document.form.submit();
		location.href = 'genius.php?aplication=config&modulo=action_permisos&id_user='+nemple;
	            }

	        }); 
              }
              
	}	
});
function failField(CampoNombre){
	$("#"+CampoNombre).removeClass('invalid');
	$("#"+CampoNombre).addClass('invalid');	
}

});