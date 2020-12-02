<?php
$idDomiciliario = $_GET["idDomiciliario"];
$domiciliario = new Domiciliario($idDomiciliario);
$domiciliario -> consultar();
if($domiciliario -> getEstado() == 1){
    $domiciliario -> cambiarEstado(0);
    echo "<i class='fas fa-times-circle' data-toggle='tooltip' data-placement='bottom' title='Deshabilitado'></i>";
}else{
    $domiciliario -> cambiarEstado(1);
    echo "<i class='fas fa-check-circle' data-toggle='tooltip' data-placement='bottom' title='Habilitado'></i>";
}
?>

