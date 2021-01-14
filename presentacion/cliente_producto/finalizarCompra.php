<?php
if($_SESSION["rol"] == "cliente"){    
   $total = $_GET["total"];
   $carrito = new Cliente_producto();   
   $pedido = new Pedido();
   $domiciliario = new Domiciliario();
   $producto = new Producto();
   $consulta = $carrito -> consultarTodos();
   $consultar = $producto -> consultarTodos();
   $nPedido = rand(1000,2000);
   $nDomiciliario = $domiciliario -> domiciliarioSeleccionado();
   date_default_timezone_set('America/Bogota');
   foreach ($consulta as $c){       
       if ($c -> getId_cliente() == $_SESSION["id"]){                      
           $pedido -> crear($nPedido,$_SESSION["id"],$c -> getId_prod(),$nDomiciliario,date('Y-m-d H:i:s'),$total,"Pedido confirmado","Pendiente");
           foreach ($consultar as $ct){
               if ($c -> getId_prod() == $ct -> getId_prod()){
                   $unidades = $c -> getCantidad_und();
                   $unidadesP = $ct -> getCantidad_und();
                   if ($ct -> getCantidad_und() != 0){
                       $resta = $unidadesP - $unidades;
                   }
                   else{
                       echo "<script>alert('Ya no hay unidades disponibles');window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarCliente_producto.php")."';</script>";
                   }
                   $ct -> editarUnidades($ct -> getId_prod(),$resta);
               }
               $c -> eliminar($_SESSION["id"], $ct -> getId_prod());
           }           
       }  
   }   
   $log = new Log($_SESSION["id"],"comprar","Compra finalizada" , date('Y-m-d'),date('H:i:s'),"cliente");
   $log -> crear();
   echo "<script>alert('Compra finalizada');window.location = 'index.php?pid=".base64_encode("presentacion/pedido/consultarPedido.php")."';</script>";
}else{
    echo "Lo siento. Usted no tiene permisos";
}
?>
