<?php

class PedidoDAO{
    
    private $id_pedido;
    private $id_cliente;
    private $id_prod;
    private $id_domiciliario;
    private $unidades;
    private $fecha_hora;
    private $valor_unidad;
    private $valor_total;
    private $observaciones;
    private $estado;
    
    function PedidoDAO($pid_pedido, $pid_cliente, $pid_prod, $pid_domiciliario, $punidades, $pfecha_hora, $pvalorU, $pvalor_total, $pobservaciones, $pestado){
        $this -> id_pedido = $pid_pedido;
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> id_domiciliario = $pid_domiciliario;
        $this -> unidades = $punidades;
        $this -> fecha_hora = $pfecha_hora;
        $this -> valor_unidad = $pvalorU;
        $this -> valor_total = $pvalor_total;
        $this -> observaciones = $pobservaciones;
        $this -> estado = $pestado;
    }
    
    function agregar($idPe,$idC,$idP,$idD,$unidades,$fechaH,$valorU,$valorT,$observa,$estado){        
        return "insert into pedido (id_pedido, id_cliente, id_prod, id_domiciliario, unidades, fecha_hora, valor_unidad, valor_total, observaciones, estado)
                values ('".$idPe ."','".$idC . "', '".$idP . "','" . $idD . "','" . $unidades ."', '" . $fechaH ."', '" . $valorU ."', '" . $valorT ."', '".$observa ."' , '".$estado ."')";
    }
    
    function consultarTodos () {
        return "select id_pedido, id_cliente, id_prod, id_domiciliario, unidades, fecha_hora, valor_unidad, valor_total, observaciones, estado
                from pedido";
    }
    
    function consultar() {
        return "select id_cliente, id_prod, id_domiciliario, unidades, fecha_hora, valor_unidad, valor_total, observaciones, estado
                from pedido
                where id_pedido = '" . $this -> id_pedido . "'";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id_pedido, id_cliente, id_prod, id_domiciliario, unidades, fecha_hora, valor_unidad, valor_total, observaciones, estado
                from pedido
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id_pedido, id_cliente,  id_prod, id_domiciliario,unidades, fecha_hora, valor_unidad, valor_total, observaciones, estado
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