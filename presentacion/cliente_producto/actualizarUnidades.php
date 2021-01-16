<?php
require "logica/Log.php";
if($_SESSION["rol"] == "cliente"){
    $prod = $_GET["id_prod"];
    $carrito = new Cliente_producto();
    $carrito -> consultar($_SESSION["id"], $prod);
    if ($_GET["accion"] == "eliminar"){
        if ($carrito -> getCantidad_und()!=0){
            $resta = $carrito -> getCantidad_und() - 1;
            if ($resta==0){
                $carrito->eliminar($_SESSION["id"], $prod);
                echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";
            }else{
                $valorTotalP = ($_GET["total"]/$_GET["unidades"])* $resta;
                $carrito -> actualizarUnidadesyTotal($_SESSION["id"], $prod, $resta ,$valorTotalP);
                echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";
                date_default_timezone_set('America/Bogota');
            }
            $log = new Log($_SESSION["id"],"actualizar","quitar una unidad del carrito" , date('Y-m-d'),date('H:i:s'),"cliente");
            $log -> crear();            
        }   
    }
    elseif ($_GET["accion"] == "agregar"){
        $suma = $carrito -> getCantidad_und() + 1;
        if ($suma > 0 && $suma <= $carrito -> getCantidad_und()){
            $valorTotalP = ($_GET["total"]/$_GET["unidades"])* $suma;
            $carrito -> actualizarUnidadesyTotal($_SESSION["id"], $prod, $suma ,$valorTotalP);
            echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";
            date_default_timezone_set('America/Bogota');
            $log = new Log($_SESSION["id"],"actualizar","agregar una unidad al carrito" , date('Y-m-d'),date('H:i:s'),"cliente");
            $log -> crear();
        }else{
            echo "<script>alert('Stock no disponible, no puede agregar mas unidades');window.location = 'index.php?pid=".base64_encode("presentacion/cliente_producto/consultarCliente_producto.php")."';</script>";
        }
    }
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>    