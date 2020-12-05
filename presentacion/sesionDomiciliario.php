<?php
$domiciliario = new Domiciliario($_SESSION["id"]);
$domiciliario -> consultar();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<h3>Bienvenido</h3>
				</div>
				<div class="card-body">
					Domiciliario: <?php echo $domiciliario -> getNombre() . " " . $domiciliario -> getApellido() ?>
				</div>
				<div class="card-body">
					<?php echo "<img src='" . $domiciliario -> getImagen() . "' width='30%' />";?>
				</div>
			</div>
		</div>
	</div>
</div>