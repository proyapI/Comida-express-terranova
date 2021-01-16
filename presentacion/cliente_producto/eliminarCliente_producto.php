<?php
if($_SESSION["rol"] == "cliente"){
    $prod = $_GET["id_prod"];
    $carrito = new Cliente_producto();
    $carrito -> consultar($_SESSION["id"], $prod);
    $carrito->eliminar($_SESSION["id"], $prod);
    echo "<script>alert('Producto eliminado del carrito');window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";   
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
