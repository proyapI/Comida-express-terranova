<?php

class Cliente_productoDAO{
    
    private $id_cliente;
    private $id_prod;
    private $cantidad_und;
    
    function Cliente_productoDAO($pid_cliente, $pid_prod, $pcantidad_und){
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> cantidad_und = $pcantidad_und;
    }
    
    function consultarTodos () {
        return "select id_cliente, id_prod, cantidad_und
                from cliente_producto";
    }
    
    function eliminar(){
        return "delete from cliente_producto where id_cliente = '".$this -> id_cliente."' and id_prod = '".$this -> id_prod."'";
    }
    
}

?>