<?php
require "logica/Log.php";
if($_SESSION["rol"] == "domiciliario"){
    $error = 0;
    if(isset($_POST["editarFoto"])){
        $foto = $_FILES["foto"];
        $tipo = $foto["type"];
        if($tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/jpg"){
            $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
            $domiciliario -> consultar();
            if($domiciliario -> getImagen() == "" || $domiciliario -> getImagen() == '...'){
                $domiciliario -> getImagen();
            }
            else{
                unlink($domiciliario -> getImagen());
            }
            $urlServidor = "imagenes/" . time() . ".png";
            $urlLocal = $foto["tmp_name"];
            copy($urlLocal, $urlServidor);
            $domiciliario= new Domiciliario($_GET["idDomiciliario"], "", "", "","", "", "", $urlServidor , "", "", "");
            $domiciliario -> editarFoto();
        }else{
            $error = 1;
        }
        $domiciliario = new Domiciliario($_GET["idDomiciliario"]);
        $domiciliario -> consultar();
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"editar","editar foto domiciliario: " . $domiciliario->getNombre() , date('Y-m-d'),date('H:i:s'),"domiciliario");
        $log -> crear();
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Editar Foto Domiciliario</h3>
    				</div>
    				<div class="card-body">
    					<?php if (isset($_POST["editarFoto"]) && $error == 0) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
                					role="alert">
                					<?php 
                    					echo "Foto editada";
                				        echo "<script>setTimeout(\"location.href = 'index.php?pid=" . base64_encode("presentacion/sesionDomiciliario.php") . "';\",1500);</script>";                						
                				    ?>
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
    						action="<?php echo "index.php?pid=" . base64_encode("presentacion/domiciliario/editarFotoDomiciliario.php") . "&idDomiciliario=" . $_GET["idDomiciliario"] ?>"
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
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>    