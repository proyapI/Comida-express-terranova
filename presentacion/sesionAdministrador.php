<?php
$administrador = new Administrador($_SESSION["id"]);
$administrador -> consultar();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<h3>Bienvenido</h3>
				</div>
				<div class="card-body">
					Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?>
				</div>
			</div>
		</div>
	</div>
</div>