<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];

$administrador = new Administrador("", "", "", $correo, $clave);
if($administrador -> autenticar()){
    $_SESSION["id"] = $administrador -> getIdAdministrador();
    $_SESSION["rol"] = "administrador";
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
}else{
    $cliente = new Cliente("", "", "", $correo, $clave);
    if($cliente -> autenticar()){
        if($cliente -> getEstado() == 1){
            $_SESSION["id"] = $cliente -> getIdCliente();
            $_SESSION["rol"] = "cliente";
            header("Location: index.php?pid=" . base64_encode("presentacion/sesionCliente.php"));
        }else{
            header("Location: index.php?error=2");
        }
    }else{
        header("Location: index.php?error=1");
    }
}

