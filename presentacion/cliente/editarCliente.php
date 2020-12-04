<?php

    $editado = false;
    if(isset($_POST["editar"])){
        $cliente = new Cliente($_GET["idCliente"]);
        $cliente -> consultar();
        if($_POST["clave"] == $cliente -> getClave()){
            if ($cliente ->getImagen() == '' || $cliente ->getImagen() == '...'){
                $cliente = new Cliente($_GET["idCliente"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["direccion"], $_POST["telefono"], '...', $_POST["correo"], $_POST["clave"]);
                $cliente -> editar();
                $editado = true;
            }
            else{
                $cliente = new Cliente($_GET["idCliente"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["direccion"], $_POST["telefono"], $_POST["imagen"], $_POST["correo"], $_POST["clave"]);
                $cliente -> editar();
                $editado = true;
            }
            
        }else{
            if ($cliente ->getImagen() == '' || $cliente ->getImagen() == '...'){
                $cliente = new Cliente($_GET["idCliente"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["direccion"], $_POST["telefono"], '...', $_POST["correo"], md5($_POST["clave"]));
                $cliente -> editar();
                $editado = true;
            }
            else{
                $cliente = new Cliente($_GET["idCliente"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["direccion"], $_POST["telefono"], $_POST["imagen"], $_POST["correo"], md5($_POST["clave"]));
                $cliente -> editar();
                $editado = true;
            }
        }
        
        
    }else{
        $cliente = new Cliente($_GET["idCliente"]);
        $cliente -> consultar();
    }
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h3>Editar Cliente</h3>
				</div>
				<div class="card-body">
					<?php if ($editado) { ?>						
						<div class="alert alert-success alert-dismissible fade show"
							role="alert">
							<?php 
    							 echo "Datos editados"; 
    							 session_destroy();
    							 echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
    						?>
						</div>
					<?php } ?>
					<form
						action="<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/editarCliente.php") . "&idCliente=" . $_GET["idCliente"] ?>"
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" value="<?php echo $cliente -> getNombre() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="Apellido" value="<?php echo $cliente -> getApellido() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="ciudad" class="form-control"
								placeholder="Ciudad" value="<?php echo $cliente -> getCiudad() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="direccion" class="form-control"
								placeholder="Direccion" value="<?php echo $cliente -> getDireccion() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="telefono" class="form-control"
								placeholder="Telefono" value="<?php echo $cliente -> getTelefono() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="hidden" name="imagen" class="form-control"
								value="<?php echo $cliente -> getImagen() ?>">
						</div>
						<div class="form-group">
							<input type="text" name="correo" class="form-control"
								placeholder="Correo" value="<?php echo $cliente -> getCorreo() ?>" required="required">
						</div>	
						<div class="form-group">
							<input type="password" name="clave" class="form-control"
								placeholder="Clave" value="<?php echo $cliente -> getClave() ?>" required="required">
						</div>							
						<div class="form-group">
							<button type="submit" name="editar" class="btn btn-primary">Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
