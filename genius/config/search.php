<?php
  $buscar_pais = $_POST['b_p'];
   $buscar_colonia=$_POST['b_c'];
   $buscar_estado=$_POST['b_e'];
       
      if(!empty($buscar_pais) || !empty($buscar_colonia) || !empty($buscar_estado)) {
            buscar_pais($buscar_pais);
			buscar_colonia($buscar_colonia);
			buscar_estado($buscar_estado);
      }
       
      function buscar_pais($b_p) {
            $con = mysql_connect('localhost','gfwsyste_web_gen', '123genius');
            mysql_select_db('gfwsyste_System_Genius', $con);
       
            $sql = mysql_query("SELECT Municipio FROM CodigosPostales WHERE CodigoPostal LIKE '".$b_p."%'limit 1",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  //echo "No se han encontrado resultados para '<b>".$b_p."</b>'.";
				  echo "";
            }else{
                  while($row=mysql_fetch_array($sql)){
                        $pais = $row['Municipio'];
              
                         
                        echo utf8_encode($pais)."<br /><br />";    
                  }
            }
      }
	  
	 
	   function buscar_colonia($b_c) {
            $con_c = mysql_connect('localhost','gfwsyste_web_gen', '123genius');
            mysql_select_db('gfwsyste_System_Genius', $con_c);
       
            $sql_c = mysql_query("SELECT Colonia FROM CodigosPostales WHERE CodigoPostal LIKE '".$b_c."%'limit 1",$con_c);
             
            $contar_c = mysql_num_rows($sql_c);
             
            if($contar_c == 0){
                  //echo "No se han encontrado resultados para '<b>".$b_c."</b>'.";
				  echo "";
            }else{
                  while($row_c=mysql_fetch_array($sql_c)){
                        $colonia = $row_c['Colonia'];
                   
                         
                        echo utf8_encode($colonia)."<br /><br />";    
                  }
            }
      }
	  
	    function buscar_estado($b_e) {
            $con_e = mysql_connect('localhost','gfwsyste_web_gen', '123genius');
            mysql_select_db('gfwsyste_System_Genius', $con_e);
       
            $sql_e = mysql_query("SELECT Estado FROM CodigosPostales WHERE CodigoPostal LIKE '".$b_e."%'limit 1",$con_e);
             
            $contar_e = mysql_num_rows($sql_e);
             
            if($contar_e== 0){
                  //echo "No se han encontrado resultados para '<b>".$b_c."</b>'.";
				  echo "";
            }else{
                  while($row_e=mysql_fetch_array($sql_e)){
                        $estado = $row_e['Estado'];
                   
                         
                        echo utf8_encode($estado)."<br /><br />";    
                  }
            }
      }
	  
	  
	  
?>