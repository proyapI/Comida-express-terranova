<?php
class CarritoDAO{
    
    private $id_pedido;
    private $id_prod;
    private $cantidad_und;
    
    function CarritoDAO($pid_pedido, $pid_prod, $pcantidad_und){
        $this -> id_pedido = $pid_pedido;
        $this -> id_prod = $pid_prod;
        $this -> cantidad_und = $pcantidad_und;
    }
    
    function agregar (){
        return "insert into pedido_producto (id_pedido, id_prod, cantidad_und)
                values('".$this -> id_pedido."', '".$this -> id_prod."', '".$this -> cantidad_und."')";
    }
    
    function eliminar(){
        return "delete from pedido_producto where id_pedido = '".$this -> id_pedido."'";
    }
    
    function consultarTodos(){
        return "select id_pedido, id_prod, cantidad_und
                from pedido_producto";
    }
    
}
?>