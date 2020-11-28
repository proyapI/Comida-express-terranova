<?php  
if($_SESSION["rol"] == "administrador"){
    $creado = false;
    if(isset($_POST["crear"])){
        $producto = new Producto($_POST["id"], $_POST["nombre"], $_POST["descripcion"],$_POST["imagen"],$_POST["cantidad_und"], $_POST["valor"]);
        $producto -> crear();
        $creado = true;
    }
}
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Crear producto</h3>
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
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/producto/crearProducto.php") ?>
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
    							<input type="text" name="descripcion" class="form-control"
    								placeholder="Descripcion" required="required">
    						</div>
    					<div class="form-group">
    							<input type="text" name="imagen" class="form-control"
    								placeholder="Imagen" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="cantidad_und" class="form-control"
    								placeholder="Cantidad_unidades" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="valor" class="form-control"
    								placeholder="Valor" required="required">
    						</div>
    						<div class="form-group">
    							<button  type="submit" name="crear" class="btn btn-primary btn-block"> Crear</button>   							
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
