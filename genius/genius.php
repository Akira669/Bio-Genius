<?php
require_once('connectionDB.php');
require_once('verifica.php');

login('login.php');

// variable que designa el modulo a iniciar

if(isset($_GET['aplication'])){
 $app=$_GET['aplication'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>System Genius</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
   
   <script src="js/jquery-1.12.2.min.js"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
  
   <link rel="stylesheet" type="text/css" href="bootstrap3/dist/css/bootstrap.min.css">
  
   <script src="bootstrap3/dist/js/bootstrap.min.js"></script>
   
   <script src="js/bootbox.min.js"></script>

   <link rel="stylesheet" type="text/css" href="css/jquery.dynatable.css">
   <script src="js/jquery.dynatable.js"></script>

  <link rel="stylesheet" href="css/jquery.ui.all.css"/>
  <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

  <script src="js/jquery.ui.core.js"></script>
  <script src="js/jquery.ui.widget.js"></script>
  <script src="js/jquery.ui.position.js"></script>
  <script src="js/jquery.ui.dialog.js"></script> 
  <script src="js/fileinput.min.js" ></script>

 
  <style type="text/css">
body  {
    background-color: #908D8D;
}
</style>

</head>
<body>
  <?php
      if($app==='production'){
        include $app.'/index.php';

      }elseif ($app==='ventas') {
        include $app.'/index.php';

      }elseif ($app==='talen_humano') {
        include $app.'/index.php';

      }elseif ($app==='admin') {
        include $app.'/index.php';

      }elseif ($app==='stock') {
        include $app.'/index.php';

      }elseif ($app==='pensamiento') {
        include $app.'/index.php';

      }elseif ($app==='publicidad') {
        include $app.'/index.php';

      }elseif ($app==='config') {
        include $app.'/index.php';
       
      }else {
        header("Location: logout.php");
      }
      
     //include './pie.php'; //futuro descarga de excel  
   ?>

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script> 
</body>
</html>
