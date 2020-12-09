<?php

if($_SESSION["rol"] == "administrador"){
    $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
    $domiciliario -> eliminar();
    echo "<script>alert('Domiciliario Eliminado');window.location = 'index.php?pid=".base64_encode("presentacion/domiciliario/consultarDomiciliario.php")."';</script>";
}else{
    echo "Lo siento. Usted no tiene permisos";
}

?>
