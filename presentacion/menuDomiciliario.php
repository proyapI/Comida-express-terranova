<?php
$domiciliario = new Domiciliario($_SESSION["id"]);
$domiciliario -> consultar();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionDomiciliario.php")?>"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedido
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Consultar</a>
        </div>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Resumen
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Consultar</a>
        </div>
      </li>
    </ul>
	<ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Domiciliario: <?php echo $domiciliario -> getNombre() . " " . $domiciliario -> getApellido(); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">        
          <a class="dropdown-item" href="index.php?pid= <?php echo base64_encode("presentacion/domiciliario/editarDomiciliario.php")."&idDomiciliario=".$_SESSION["id"]?>">Editar Perfil</a>
          <a class="dropdown-item" href="index.php?pid= <?php echo base64_encode("presentacion/domiciliario/editarFotoDomiciliario.php")."&idDomiciliario=".$_SESSION["id"]?>">Editar Foto</a>
        </div>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="index.php?sesion=0">Cerrar Sesión</a>
      </li>      
    </ul>	
  </div>
</nav>
