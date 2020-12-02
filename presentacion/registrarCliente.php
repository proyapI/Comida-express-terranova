<?php  
    $creado = false;
    if(isset($_POST["registrar"])){
        $cliente = new Cliente ($_POST["id"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["direccion"], $_POST["telefono"], $_POST["correo"],$_POST["clave"]);
        $cliente -> crear();
        $creado = true;
    }
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Registrar cliente</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($creado) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
    							role="alert">
    							<?php 
    							 echo "Datos ingresados"; 
    							 echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
    							?>
    						</div>
    					<?php } ?>
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/registrarCliente.php") ?>
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
    							<input type="text" name="clave" class="form-control"
    								placeholder="Clave" required="required">
    						</div>
    						<div class="form-group">
    							<button  type="submit" name="registrar" class="btn btn-primary btn-block"> Registrar</button>   							
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>