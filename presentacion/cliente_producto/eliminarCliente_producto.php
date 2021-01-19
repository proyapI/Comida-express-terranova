<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "cliente"){
    $prod = $_GET["id_prod"];
    $carrito = new Cliente_producto();
    $carrito -> consultar($_SESSION["id"], $prod);
    $carrito->eliminar($_SESSION["id"], $prod);
    echo "<script>alert('Producto eliminado del carrito');window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";   
    $log = new Log($_SESSION["id"],"eliminar","eliminar producto del carrito" , date('Y-m-d'),date('H:i:s'),"cliente");
    $log -> crear();
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
