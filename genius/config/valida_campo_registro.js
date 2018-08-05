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
				 location.href = 'genius.php?aplication=config&modulo=registro_nuevo_dd'
			},
			'Cancelar':function(){
				$dialog.dialog('close');
			}
		}
	});
	
	
	
var $dialog2=$('<div > </div>')
.html('<p style="font-size:14px; display:inline;"><img style="float:left; margin-top:5px; margin-right:2px; display:inline; vertical-align:middle; height:50px; width:50px;" src="img/warning.png"/><span style="float:right; margin-top:15px; margin-right:15px;"><b>Complete la informaci&oacute;n solicitada</b><span></p>')
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

$("#valida").click(function(){

$('*').removeClass('invalid');

	if($("#user_usu").val()==""){
		$dialog2.dialog('open');
		failField('user_usu');
	}if($("#pass_usu").val()==""){
		$dialog2.dialog('open');
		failField('pass_usu');
	} if($("#passc_usu").val()==""){
		$dialog2.dialog('open');
		failField('passc_usu');
	}if($("#app_usu").val()==""){
		$dialog2.dialog('open');
		failField('app_usu');
	}if($("#apm_usu").val()==""){
		$dialog2.dialog('open');
		failField('apm_usu');
	}if($("#nacimineto_usu").val()==""){
		$dialog2.dialog('open');
		failField('nacimineto_usu');
	}if($("#edad_usu").val()==""){
		$dialog2.dialog('open');
		failField('edad_usu');
	}if($("#direccion_usu").val()==""){
		$dialog2.dialog('open');
		failField('direccion_usu');
	}if($("#colonia_usu").val()==""){
		$dialog2.dialog('open');
		failField('colonia_usu');
	}if($("#ciudad_usu").val()==""){
		$dialog2.dialog('open');
		failField('ciudad_usu');
	}if($("#estado_usu").val()==""){
		$dialog2.dialog('open');
		failField('estado_usu');
	}if($("#pais_usu").val()==""){
		$dialog2.dialog('open');
		failField('pais_usu');
	}if($("#codigo_usu").val()==""){
		$dialog2.dialog('open');
		failField('codigo_usu');
	}if($("#movil_usu").val()==""){
		$dialog2.dialog('open');
		failField('movil_usu');
	}if($("#correo_usu").val()==""){
		$dialog2.dialog('open');
		failField('correo_usu');
	}if($("#telp_usu").val()==""){
		$dialog2.dialog('open');
		failField('telp_usu');
	}if($("#correoo_usu").val()==""){
		$dialog2.dialog('open');
		failField('correoo_usu');
	}if($("#telo_usu").val()=="" || $("#nombre_usu").val()==""){
		$dialog2.dialog('open');
		if($("#telo_usu").val()=="") failField('telo_usu');
		if($("#nombre_usu").val()=="") failField('nombre_usu');
	}

	else{
	  $dialog.dialog('close');
	  $dialog2.dialog('close');
	  
	        var valida=1;     
                 var foto_dir=$("#archivos").val();
		 var id_user_numero=$("#id_numero_user").val();
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
		 
	         var foto_ruta = $("#archivos").val();
	         if(foto_ruta!=""){
	          localStorage.setItem("photo", foto_ruta);
	        }
	       var path_foto = localStorage.getItem("photo");
	    //   alert(path_foto);
	 if(path_foto==null){
		bootbox.confirm("Faltan algunos datos... !!! continuar?",function(result){
                      if(result){
		$.get("config/registro_nuevo.php",{"valida":valida,"id_user_numero":id_user_numero,"usuario":usuario,"password":password,"cpassword":cpassword,"nombre":nombre,"apellidop":apellidop,"apellidom":apellidom,"fecha_nac":fecha_nac,"edad":edad,"direccion":direccion,"colonia":colonia,"ciudad":ciudad,"estado":estado,"pais":pais,"codigo":codigo,"celular":celular,"correop":correop,"telp":telp,"correoo":correoo,"telo":telo,"path_foto":path_foto } );
		   localStorage.clear();
		   document.form.submit();
	location.href = 'genius.php?aplication=config&modulo=registro_nuevo_dd';
		   }    	          
		}); 
	     }else{
	      var po = path_foto.split("\\");  
	        dir_photo=po[2];
	     bootbox.confirm("Informacion correcta!!!",function(result){
	         if(result){
	         $.get("config/registro_nuevo.php",{"valida":valida,"id_user_numero":id_user_numero,"usuario":usuario,"password":password,"cpassword":cpassword,"nombre":nombre,"apellidop":apellidop,"apellidom":apellidom,"fecha_nac":fecha_nac,"edad":edad,"direccion":direccion,"colonia":colonia,"ciudad":ciudad,"estado":estado,"pais":pais,"codigo":codigo,"celular":celular,"correop":correop,"telp":telp,"correoo":correoo,"telo":telo,"dir_photo":dir_photo} );
	           localStorage.clear();
	         document.form.submit();
	location.href = 'genius.php?aplication=config&modulo=registro_nuevo_dd';
				   
	            }
	        });
	     }
            
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
                    alert("ERROR en la peticion de localidades, reiniciando la conexion");
                          location.reload();
                    },
                    success: function(data){                                                    
                          $("#ciudad_usu").empty();
                          $("#ciudad_usu").append(data);                                      
                    }
              });                                                               
        });
		
        $("#codigo_usu").keyup(function(e){               
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
                    alert("ERROR en la peticion de localidades, reiniciando la conexion");
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
        });
		
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
                    alert("ERROR en la peticion de localidades, reiniciando la conexion");
                         location.reload();
                    },
                    success: function(data){                                                    
                          $("#estado_usu").empty();
                          $("#estado_usu").append(data);
                                                             
                    }
              });                                                            
        });
		
		$("#codigo_usu").keyup(function(e){
		 consulta_pais="Mexico";
		$("#pais_usu").val(consulta_pais);
		});

});