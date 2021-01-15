<?php
session_start();
require "logica/Cliente.php";
require "logica/Domiciliario.php";
require "logica/Producto.php";
require "logica/Pedido.php";
require "persistencia/Conexion.php";

if(isset($_SESSION["id"])){
    $pid = base64_decode($_GET["pid"]);
    include $pid;    
}else{
    header("Location: index.php");
}
?>