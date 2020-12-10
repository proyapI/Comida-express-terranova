<?php

class Cliente_productoDAO{
    
    private $id_cliente;
    private $id_prod;
    private $nombre_producto;
    private $cantidad_und;
    private $total;
    
    function Cliente_productoDAO($pid_cliente, $pid_prod, $pnombre_producto, $pcantidad_und,$ptotal){
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> nombre_producto = $pnombre_producto;
        $this -> cantidad_und = $pcantidad_und;
        $this -> total = $ptotal; 
    }
    
    function crear(){
        return "insert into cliente_producto (id_cliente,id_prod,nombre_producto,cantidad_und,total)
                values ('".$this -> id_cliente ."','".$this -> id_prod . "','".$this -> nombre_producto . "','".$this -> cantidad_und . "','".$this -> total . "')";
    }
    
    function actualizarUnidadesyTotal($idC,$idP,$unidades,$totalP){        
        return "update cliente_producto
                set cantidad_und = '". $unidades . "' , total ='" . $totalP . "'
                where id_cliente = '" . $idC . "' and id_prod = '" . $idP . "'";
    }
    
    function consultar($idC,$idP){        
        return "select nombre_producto, cantidad_und,total
                from cliente_producto where id_cliente = '" . $idC . "' and id_prod = '" . $idP . "'";
    }
    
    function consultarTodos () {
        return "select id_cliente, id_prod,nombre_producto,cantidad_und, total
                from cliente_producto";
    }
    
    function eliminar(){
        return "delete from cliente_producto where id_cliente = '".$this -> id_cliente."' and id_prod = '".$this -> id_prod."'";
    }
    
}

?>