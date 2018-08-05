<?
$user=$_SESSION['user'];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" href="inicio.php"><? echo "System Genius"?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li ><a href="genius.php?aplication=config&modulo=principal">Lista de empleados</a></li>
        <li ><a href="genius.php?aplication=config&modulo=registro_nuevo">Registro nuevo</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="genius.php?aplication=config&modulo=registro_nuevo">Registro nuevo</a></li>
            <!-- <li role="separator" class="divider"></li>
             <li><a href="genius.php?aplication=config&modulo=delete_user">Editar / Eliminar</a></li> -->
            <li role="separator" class="divider"></li>
            <li><a href="genius.php?aplication=config&modulo=asig_permisos">Asignaci&oacute;n de permisos</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" onclick="window.history.back();">Regresar</a></li>
<li><a href=""><b> <?echo $user;?></b></a></li>
          <li><a href="logout.php">Cerrar sesi&oacute;n</a></li>
      </ul>

      <!--  futuro funcionamiento de busqueda de archivos usuarios etc...
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <button type="" class="btn btn-default">Buscar</button>
      </form>  -->


    </div>
  </div>
</nav>
