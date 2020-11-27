<?php

class PedidoDAO{
    
    private $id_pedido;
    private $id_cliente;
    private $id_prod;
    private $id_domiciliario;
    private $fecha_hora;
    private $valor_total;
    private $observaciones;
    private $estado;
    
    function PedidoDAO($pid_pedido, $pid_cliente, $pid_prod, $pid_domiciliario, $pfecha_hora, $pvalor_hora, $pobservaciones, $pestado){
        $this -> id_pedido = $pid_pedido;
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> id_domiciliario = $pid_domiciliario;
        $this -> fecha_hora = $pfecha_hora;
        $this -> valor_total = $pvalor_hora;
        $this -> observaciones = $pobservaciones;
        $this -> estado = $pestado;
    }
    
    function consultarTodos () {
        return "select id_pedido, id_cliente, id_prod, id_domiciliario, fecha_hora, valor_total, observaciones, estado
                from pedido";
    }
    
    function consultar() {
        return "select id_cliente, id_prod, id_domiciliario, fecha_hora, valor_total, observaciones, estado
                from pedido
                where id_pedido = '" . $this -> id_pedido . "'";
    }
    
    function cambiarEstado($estado) {
        return "update pedido set estado = '" . $estado . "'
                where id_pedido = '" . $this -> id_pedido . "'";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id_pedido, id_cliente, id_prod, id_domiciliario, fecha_hora, valor_total, observaciones, estado
                from pedido
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id_pedido, id_cliente,  id_prod, id_domiciliario,fecha_hora, valor_total, observaciones, estado
                from pedido
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id_pedido)
                from pedido";
    }
    
}

?>