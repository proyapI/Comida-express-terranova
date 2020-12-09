<?php

if($_SESSION["rol"] == "administrador"){
    $producto = new Producto($_GET["id_prod"]);
    $producto -> eliminar();
    $mensaje = "Producto Eliminado";
    echo "<script>alert('Producto Eliminado');window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarProducto.php")."';</script>";
}else{
    echo "Lo siento. Usted no tiene permisos";
}

?>
