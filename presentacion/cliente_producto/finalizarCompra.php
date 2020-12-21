<?php
if($_SESSION["rol"] == "cliente"){    
   $carrito = new Cliente_producto();
   $consulta = $carrito -> consultarTodos();
    foreach ($consulta as $cP){   
        if ($cP -> getId_cliente() == $_SESSION["id"]){
           $producto = $cP -> getId_prod();
           echo $producto;
           /*$unidades = $cp -> getCantidad_und();
           $restante = $productos -> getCantidad_und() - $unidades;
           $productos -> editarUnidades($producto, $restante);
           $carrito -> eliminar($_SESSION["id"],$producto);*/
        }       
   } 
    //echo "<script>alert('Compra finalizada');window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarProducto.php")."';</script>";
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
