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
				location.href = 'genius.php?aplication=config&modulo=principal';
				     // window.opener.document.location= 'genius.php?aplication=config&modulo=principal';
                       //self.close();
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




$("#guardar").click(function(){

         


$('*').removeClass('invalid');

	if($("#user_usu").val()==""){
		$dialog2.dialog('open');
		failField('user_usu');
	
	}else{
		$dialog.dialog('close');
		$dialog2.dialog('close');
		
		var id_user_numero=$("#empleado").val();
		 var usuario=$("#user_usu").val();
		var password=$("#pass_usu").val();
		 var cpassword=$("#passc_usu").val();
		 var nombre=$("#nombre_usu").val();
		 var apellidop=$("#app_usu").val();
		 var apellidom=$("#apm_usu").val();
		 var fecha_nac=$("#nacimineto_usu").val();
		 var edad=$("#edad_usu").val();
		 var direccion=$("#direccion_usu").val();
		 var colonia=$("#colonia_usu").val();
		 var ciudad=$("#ciudad_usu").val();
		 var estado=$("#estado_usu").val();
		 var pais=$("#pais_usu").val();
		 var codigo=$("#codigo_usu").val();
		 var celular=$("#movil_usu").val();
		 var correop=$("#correo_usu").val();
		 var telp=$("#telp_usu").val();
		 var correoo=$("#correoo_usu").val();
		 var telo=$("#telo_usu").val();
		 var foto=$("#foto_usu").val();
		 var area=$("#area_usu").val();
		 var curp=$("#curp_usu").val();
		 var puesto=$("#puesto_usu").val();
		 var nss=$("#nss_usu").val();
		 var nemple=$("#nemple_usu").val();
		 var ife=$("#ife_usu").val();
		 var rfc=$("#rfc_usu").val();
		 var cuenta_u=$("#cuenta_usu").val();
		 var banco=$("#banco_usu").val();
		 var clave=$("#clave_usu").val();
		 var id_empleado=$("#empleado").val();

                   var path_foto = localStorage.getItem("photo");
		   var pathh_curp = localStorage.getItem("curp_dir");
	           var pathh_tarjeta = localStorage.getItem("tarjeta_dir");
		   var pathh_ife = localStorage.getItem("ife_dir");

	    // alert( "foto: "+path_foto+" - curp: "+pathh_curp+ " - tarjeta: "+pathh_tarjeta+" - ife: "+pathh_ife );

	             //MANIPULACION PATH FOTO 
	              if(path_foto!=null || path_foto!=""){
			     var po = path_foto.split("\\");  
			             if(po.length > 1){ dir_photo=po[2]; }else{ dir_photo=po[0]; }
			     }else{ dir_photo="nula";}
	             
		        //MANIPULACION PATH CURP
			         if(pathh_curp!="nula" || pathh_curp!=null ){
			            var path2_curp = pathh_curp.split("\\"); 
				       if(path2_curp.length > 1){path_curp=path2_curp[2]; }else{  path_curp=path2_curp[0]; }	  
			         }else{path_curp="nula";}
		   
			//MANIPULACION PATH TARJETA
			     if(pathh_tarjeta!="nula" || pathh_tarjeta!=null){
			     var path2_tarjeta = pathh_tarjeta.split("\\"); 
			      if(path2_tarjeta.length > 1){path_tarjeta=path2_tarjeta[2]; }else{path_tarjeta=path2_tarjeta[0];}
			     }else{path_tarjeta="nula";}
		     
		    //MANIPUYLACION PATH IFE
			    if(pathh_ife!="nula" || pathh_ife!=null ){
			    var path2_ife = pathh_ife.split("\\");  
			    if(path2_ife.length > 1){  path_ife=path2_ife[2]; }else{  path_ife=path2_ife[0]; }
			    }else{ path_ife="nula";}
		    

		 bootbox.confirm("Actualizar empleado G"+ id_user_numero +" ... CONTINUAR? ",function(result){
		    if(result){
		    	$.post("config/add_edita.php",{"id_user_numero":id_user_numero,"usuario":usuario,"password":password,"cpassword":cpassword,"nombre":nombre,"apellidop":apellidop,"apellidom":apellidom,
"fecha_nac":fecha_nac,"edad":edad,"direccion":direccion,"colonia":colonia,"ciudad":ciudad,"estado":estado,"pais":pais,"codigo":codigo,"celular":celular,
"correop":correop,"telp":telp,"correoo":correoo,"telo":telo,"dir_photo":dir_photo,"area":area,"curp":curp,"puesto":puesto,"nss":nss,
"nemple":nemple,"ife":ife,"rfc":rfc,"cuenta_u":cuenta_u,"banco":banco,"clave":clave,"path_curp":path_curp,"path_tarjeta":path_tarjeta,
"path_ife":path_ife,"id_empleado":id_empleado},function(data){
		    	if(data){
		    	     bootbox.alert("Empleado "+id_user_numero+" actualizado!!!");
		    	}
		    	});
		    }
		 });
	
	
	}
          
	
});
function failField(CampoNombre){
	$("#"+CampoNombre).removeClass('invalid');
	$("#"+CampoNombre).addClass('invalid');
	
}


 	var consulta_pais;
	var consulta_colonia;
	var consulta_municipio;
	var consulta_estado;

    consulta_pais="";
	consulta_colonia="";
	consulta_municipio="";
	consulta_estado="";                                                         
        
        $("#codigo_usu").keyup(function(e){               
              consulta_municipio = $("#codigo_usu").val(); 
               consulta_colonia=0;
	            consulta_pais="Mèxico";
	               consulta_estado=0; 			                                                         
              $.ajax({
                    type: "POST",
                    url: "./config/search.php",
				   data:{b_p:consulta_municipio,b_c:consulta_colonia,b_e:consulta_estado},
                    dataType: "html",
                    beforeSend: function(){
                          $("#ciudad_usu").html("");
                    },
                    error: function(){
                          location.reload();
                    },
                    success: function(data){                                                    
                          $("#ciudad_usu").empty();
                          $("#ciudad_usu").append(data);
                                                             
                    }
              });
                                                                              
                                                                           
        });
		
      /*  $("#codigo_usu").keyup(function(e){               
              consulta_colonia = $("#codigo_usu").val();  
          consulta_pais="Mèxico";
	          consulta_municipio=0;
	          consulta_estado=0; 			                                                            
              $.ajax({
                    type: "POST",
                    url: "./config/search.php",
                     data:{b_c:consulta_colonia,b_p:consulta_municipio,b_e:consulta_estado},
					dataType: "html",
                    beforeSend: function(){
                          $("#colonia_usu").html("");
                    },
                    error: function(){
                       location.reload();
                    },
                    success: function(data){                                                    
                          $("#colonia_usu").empty();
                           var colo =data.split(";"); 
                        var ini="<option";
                        var cer="</option>";
                        var colonias=[];    
                       for (var i=0; i <= (colo.length)-1; i++){
                       colonias[i]=ini+" value='"+colo[i]+"'>"+colo[i]+cer; 
                          $("#colonia_usu").html(colonias);   
                     }  
                                                             
                    }
              });
                                                                                
                                                                           
        });*/
		
		  $("#codigo_usu").keyup(function(e){               
              consulta_estado = $("#codigo_usu").val();  
     consulta_colonia=0;
	consulta_municipio=0;
 consulta_pais="Mèxico";			                                                           
              $.ajax({
                    type: "POST",
                    url: "./config/search.php",
                     data:{b_e:consulta_estado,b_c:consulta_colonia,b_p:consulta_municipio},
					dataType: "html",
                    beforeSend: function(){
                          $("#estado_usu").html("");
                    },
                    error: function(){
                         location.reload();
                    },
                    success: function(data){                                                    
                          $("#estado_usu").empty();
                          $("#estado_usu").append(data);
                                                             
                    }
              });
                                                                                  
                                                                          
        });
		
		$("#codigo_usu").keyup(function(e){
		 consulta_pais="México";
		$("#pais_usu").val(consulta_pais);
		});

});