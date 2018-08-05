<?php
include 'submenu.php';

if(isset($_GET['modulo'])){
  include $_GET['modulo'].'.php';
}else{
  include 'principal.php';
}

//if(isset($_GET['modulo'])){
  //$modulo=$_GET['modulo'];
  ?>
  <!--   <script type="text/javascript">
     $(document).ready(function(){
        submenu();
        $("#sub<?echo $modulo;?>").addClass("active");
     });
   </script> -->
<?
$var="";
// }?>
