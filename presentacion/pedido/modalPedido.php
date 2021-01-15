<?php 
if($_SESSION["rol"] == "cliente" || $_SESSION["rol"] == "domiciliario"){    
    $producto = new Producto($_GET["idProducto"]);    
    $producto -> consultar();
    $pedido = new Pedido($_GET["idPedido"]);
    $pedido -> consultar();
    ?>
    <div class="modal-header">
    	<h5 class="modal-title" id="exampleModalLabel"><b><?php echo "Pedido #" . $pedido -> getId_pedido() ?></b></h5>
    	<button type="button" class="close" data-dismiss="modal"
    		aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
    <div class="modal-body">     	
    	<img src="<?php echo $producto -> getImagen() ?>" width="20%"> <br><b> <?php echo "Nombre del producto: " ?> </b> 
    	<?php  echo $producto -> getNombre() ?><br><b> <?php echo "Descripcion del producto: " ?> </b> <?php  echo $producto -> getDescripcion() ?> 
    	<br><b> <?php echo "Valor por unidad: " ?> </b> <?php  echo $pedido -> getValor_unidad() ?>
    </div>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>