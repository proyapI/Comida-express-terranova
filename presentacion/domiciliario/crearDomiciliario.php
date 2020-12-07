<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    $creado = false;
    if(isset($_POST["crear"])){
        $domiciliario = new Domiciliario($_POST["id"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["direccion"], $_POST["telefono"], '...' , $_POST["correo"],$_POST["clave"], $_POST["estado"]);
        $domiciliario -> crear();
        $creado = true;
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"crear","crear domiciliario: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();
    }
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6"> 
    			<div class="card">
    				<div class="card-header">
    					<h3>Registrar domiciliario</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($creado) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
    							role="alert">
    							<strong>Datos ingresados</strong>
    							<button type="button" class="close" data-dismiss="alert"
    								aria-label="Close">
    								<span aria-hidden="true">&times;</span>
    							</button>
    						</div>
    					<?php } ?>
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/domiciliario/crearDomiciliario.php") ?>
    						method="post">
    						<div class="form-group">
    							<input type="text" name="id" class="form-control"
    								placeholder="ID" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="nombre" class="form-control"
    								placeholder="Nombre" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="apellido" class="form-control"
    								placeholder="Apellido" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="ciudad" class="form-control"
    								placeholder="Ciudad" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="direccion" class="form-control"
    								placeholder="Direccion" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="telefono" class="form-control"
    								placeholder="Telefono" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="correo" class="form-control"
    								placeholder="Correo" required="required">
    						</div>
    						<div class="form-group">
    							<input type="password" name="clave" class="form-control"
    								placeholder="Clave" required="required">    						
    						</div>
    						<div class="form-group">
    							<input type="text" name="estado" class="form-control"
    								placeholder="Estado" required="required">    						
    						</div>			
    						<div class="form-group">
    							<button  type="submit" name="crear" class="btn btn-primary btn-block"> Registrar </button>   							
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>    
