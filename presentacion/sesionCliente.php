<?php
$cliente = new Cliente($_SESSION["id"]);
$cliente -> consultar();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<h3>Bienvenido</h3>
				</div>
				<div class="card-body">
					Cliente: <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?>
				</div>
				<div class="card-body">
					<?php echo "<img src='" . $cliente -> getImagen() . "' width='30%' />";?>
				</div>
			</div>
		</div>
	</div>
</div>