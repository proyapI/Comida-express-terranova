<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<?php 
require "logica/Administrador.php";
require "logica/Cliente.php";
require "logica/Cliente_producto.php";
require "logica/Domiciliario.php";
require "logica/Pedido.php";
require "logica/Producto.php";
require "logica/Log.php";
require "persistencia/Conexion.php";

$pid = base64_decode($_GET["pid"]);
include $pid;
?>