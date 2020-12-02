<?php
$editado = false;
if(isset($_POST["editar"])){
    $administrador = new Administrador($_GET["idAdministrador"]);
    $administrador -> consultar();
    if ($administrador ->getImagen() == '' || $administrador ->getImagen() == '...' || $administrador -> getClave() == ''){
        $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"],'...',$_POST["correo"],'');
        $administrador -> editar();
        $editado = true;
    }
    else{
        $administrador = new Administrador($_GET["idAdministrador"], $_POST["nombre"], $_POST["apellido"],$_GET["imagen"],$_POST["correo"],$_GET["clave"]);
        $administrador -> editar();
        $editado = true;
    }
}else{
    $administrador = new Administrador($_GET["idAdministrador"]);
    $administrador -> consultar();
}
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h3>Editar Administrador</h3>
				</div>
				<div class="card-body">
					<?php if ($editado) { ?>						
						<div class="alert alert-success alert-dismissible fade show"
							role="alert">
							<strong>Datos editados</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
					<form
						action="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/editarAdministrador.php") . "&idAdministrador=" . $_GET["idAdministrador"] ?>"
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" value="<?php echo $administrador -> getNombre() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="Apellido" value="<?php echo $administrador -> getApellido() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="correo" class="form-control"
								placeholder="correo" value="<?php echo $administrador -> getCorreo() ?>" required="required">
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