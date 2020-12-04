<?php
$editado = false;
if(isset($_POST["editar"])){
    $producto = new Producto($_GET["id_prod"]);
    $producto -> consultar();
    if ($producto-> getImagen()== '' || $producto ->getImagen() == '...'){
        $producto = new Producto($_GET["id_prod"], $_POST["nombre"], $_POST["descripcion"],'...',$_POST["unidades"], $_POST["valor"]);
        $producto -> editar();
        $editado = true;
    } else{
        $producto = new Producto($_GET["id_prod"], $_POST["nombre"], $_POST["descripcion"],$_GET["imagen"],$_POST["unidades"], $_POST["valor"]);
        $producto -> editar();
        $editado = true;
    }
}else{
    $producto = new Producto($_GET["id_prod"]);
    $producto -> consultar();
}
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h3>Editar Producto</h3>
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
						action="<?php echo "index.php?pid=" . base64_encode("presentacion/producto/editarProducto.php") . "&id_prod=" . $_GET["id_prod"] ?>"
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" value="<?php echo $producto -> getNombre() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="descripcion" class="form-control"
								placeholder="Descripcion" value="<?php echo $producto -> getDescripcion() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="unidades" class="form-control"
								placeholder="Unidades" value="<?php echo $producto -> getCantidad_und() ?>" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="valor" class="form-control"
								placeholder="Valor" value="<?php echo $producto -> getValor() ?>" required="required">
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