<?php
$error = 0;
if(isset($_POST["editarFoto"])){
    $foto = $_FILES["foto"];
    $tipo = $foto["type"];
    if($tipo == "image/jpeg" || $tipo == "image/png"){
        $administrador = new Administrador($_GET["idAdministrador"]);
        $administrador -> consultar();
        if($administrador -> getImagen() == "" || $administrador -> getImagen() == '...'){
            $administrador -> getImagen();
        }else{
            unlink($administrador -> getImagen());
        }
        $urlServidor = "imagenes/" . time() . ".png";
        $urlLocal = $foto["tmp_name"];
        copy($urlLocal, $urlServidor);
        $administrador= new Administrador($_GET["idAdministrador"], "", "", $urlServidor , "", "");
        $administrador -> editarFoto();
    }else{
        $error = 1;
    }
}
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h3>Editar Foto Administrador</h3>
				</div>
				<div class="card-body">
					<?php if (isset($_POST["editarFoto"]) && $error == 0) { ?>						
						<div class="alert alert-success alert-dismissible fade show"
							role="alert">
							<strong>Foto editada</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } else if(isset($_POST["editarFoto"]) && $error == 1) { ?>
						<div class="alert alert-danger alert-dismissible fade show"
							role="alert">
							<strong>Error. El archivo debe ser png o jpg</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>					
					<?php } ?>
					<form
						action="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/editarFotoAdministrador.php") . "&idAdministrador=" . $_GET["idAdministrador"] ?>"
						method="post" enctype="multipart/form-data" >
						<div class="form-group">
							<input type="file" name="foto" class="form-control-file" required="required">
						</div>
						<div class="form-group">
							<button type="submit" name="editarFoto" class="btn btn-primary">Editar Foto</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>