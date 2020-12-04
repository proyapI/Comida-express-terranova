<?php
$error = 0;
if(isset($_POST["editarFoto"])){
    $foto = $_FILES["foto"];
    $tipo = $foto["type"];
    if($tipo == "image/jpeg" || $tipo == "image/png"){
        $cliente = new Cliente($_GET["idCliente"]);
        $cliente -> consultar();
        if($cliente -> getImagen() == "" || $cliente -> getImagen() == '...'){
            $cliente -> getImagen();
        }else{
            unlink($cliente -> getImagen());
        }
        $urlServidor = "imagenes/" . time() . ".png";
        $urlLocal = $foto["tmp_name"];
        copy($urlLocal, $urlServidor);
        $cliente= new Cliente($_GET["idCliente"], "", "", "", "", "", $urlServidor , "", "");
        $cliente -> editarFoto();
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
					<h3>Editar Foto Cliente</h3>
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
						action="<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/editarFotoCliente.php") . "&idCliente=" . $_GET["idCliente"] ?>"
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