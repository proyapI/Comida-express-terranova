<?php 
$error = 0;
if (isset($_GET["error"])){
    $error = $_GET["error"];
}
?>
<div class="container">
	<?php include "presentacion/encabezado.php";?>
	<div class="row mt-3">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h3>Comida Express Terranova</h3>
				</div>
				<div class="card-body">
					<img src="img/img1.jpg" width="100%">
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h3>Autenticación</h3>
				</div>
				<div class="card-body">
					<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/autenticar.php") ?>
						method="post">
						<?php if ($error == 1) { ?>						
						<div class="alert alert-danger alert-dismissible fade show"
							role="alert">
							<strong>Error de correo o clave</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php } else if ($error == 2) { ?>
						<div class="alert alert-danger alert-dismissible fade show"
							role="alert">
							<strong>Domiciliario deshabilitado</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>												
						<?php } ?>
						<div class="form-group">
							<input type="email" name="correo" class="form-control"
								placeholder="Correo" required="required">
						</div>
						<div class="form-group">
							<input type="password" name="clave" class="form-control"
								placeholder="Clave" required="required">
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Autenticar</button>
							<button type="submit" class="btn btn-primary">Registrarse</button>
						</div>		
						<p class="text-center">
							<a href="<?php echo "index.php?pid=" . base64_encode("presentacion/recuperarClave.php") ?>"> &#191&#211lvido
								la clave?</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>