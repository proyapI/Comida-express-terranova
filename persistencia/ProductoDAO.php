<?php

class ProductoDAO {
    
    private $id_prod;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $cantidad_und;
    private $valor;
    
    function ProductoDAO($pid_prod, $pnombre, $pdescripcion, $pimagen, $pcantidad_und, $pvalor){
        $this -> id_prod = $pid_prod;
        $this -> nombre = $pnombre;
        $this -> descripcion = $pdescripcion;
        $this -> imagen = $pimagen;
        $this -> cantidad_und = $pcantidad_und;
        $this -> valor = $pvalor;
    }
    
    function agregar(){
        return "insert into Producto (nombre, descripcion, imagen, cantidad_und, valor)
                values ('".$this -> nombre."', '".$this -> descripcion."','".$this -> imagen."', '".$this -> cantidad_und."', '".$this -> valor."')";
    }
    
    function consultarTodos(){
        return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor 
                from producto";
    }
    
    function editar(){
        return "update producto
                set nombre = '".$this -> nombre."', '".$this -> descripcion."', '".$this -> imagen."','".$this -> cantidad_und."', '".$this -> valor."'
                where id_prod = '".$this -> id_prod."'";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor
                from producto
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor
                from producto
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id_prod)
                from producto";
    }
    
    function buscar($filtro){
        return "select id_prod, nombre, descripcion, imagen, cantidad_und, valor
                from producto
                where nombre like '" . $filtro . "%'";
    }
    
    
}

?>