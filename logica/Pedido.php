<?php

require "persistencia/PedidoDAO.php";

class Pedido{
    private $id_pedido;
    private $id_cliente;
    private $id_prod;
    private $id_domiciliario;
    private $fecha_hora;
    private $valor_total;
    private $observaciones;
    private $estado;
    private $conexion;
    private $pedidoDAO;
    
    /**
     * @return mixed
     */
    public function getId_pedido()
    {
        return $this->id_pedido;
    }

    /**
     * @return mixed
     */
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return mixed
     */
    public function getId_prod()
    {
        return $this->id_prod;
    }

    /**
     * @return mixed
     */
    public function getId_domiciliario()
    {
        return $this->id_domiciliario;
    }

    /**
     * @return mixed
     */
    public function getFecha_hora()
    {
        return $this->fecha_hora;
    }

    /**
     * @return mixed
     */
    public function getValor_total()
    {
        return $this->valor_total;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    function PedidoDAO($pid_pedido="", $pid_cliente="", $pid_prod="", $pid_domiciliario="", $pfecha_hora="", $pvalor_hora="", $pobservaciones="", $pestado=""){
        $this -> id_pedido = $pid_pedido;
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> id_domiciliario = $pid_domiciliario;
        $this -> fecha_hora = $pfecha_hora;
        $this -> valor_total = $pvalor_hora;
        $this -> observaciones = $pobservaciones;
        $this -> estado = $pestado;
        $this -> conexion = new Conexion();
        $this -> pedidoDAO = new PedidoDAO($pid_pedido, $pid_cliente, $pid_prod, $pid_domiciliario, $pfecha_hora, $pvalor_hora, $pobservaciones, $pestado);
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $pedidos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($pedidos, new Pedido($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7]));
        }
        return $pedidos;
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> id_cliente = $resultado[0];
        $this -> id_prod = $resultado[1];
        $this -> id_domiciliario = $resultado[2];
        $this -> fecha_hora = $resultado[3];
        $this -> valor_total = $resultado[4];
        $this -> observaciones = $resultado[5];
        $this -> estado = $resultado[6];
    }
    
    function cambiarEstado($estado){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> cambiarEstado($estado));
        $this -> conexion -> cerrar();
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $pedidos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($pedidos, new Pedido($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7]));
        }
        return $pedidos;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pedidoDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
}

?>