<?php 
if($_SESSION["rol"] == "cliente"){
    $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
    $domiciliario -> consultar();
    ?>
    <div class="modal-header">
    	<h5 class="modal-title" id="exampleModalLabel"> <b> <?php echo "Domiciliario: " ?> </b> <?php echo $domiciliario -> getNombre() . " " . $domiciliario -> getApellido() ?></h5>
    	<button type="button" class="close" data-dismiss="modal"
    		aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
    <div class="modal-body"> 
    	<img src="<?php echo $domiciliario -> getImagen() ?>" width="20%"> <br><b> <?php echo "Ciudad: " ?> </b> <?php echo $domiciliario -> getCiudad() ?> 
    	<br> <b> <?php echo "Telefono: " ?> </b> <?php echo $domiciliario -> getTelefono() ?> <br><b> <?php echo "Correo: " ?> </b> <?php echo $domiciliario -> getCorreo()?>
    </div>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>