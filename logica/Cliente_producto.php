<?php

require "persistencia/Cliente_productoDAO.php";

class Cliente_producto{
    
    private $id_cliente;
    private $id_prod;
    private $cantidad_und;
    private $conexion;
    private $cliente_productoDAO;
    
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
    public function getCantidad_und()
    {
        return $this->cantidad_und;
    }
    
    function Cliente_productoDAO($pid_cliente="", $pid_prod="", $pcantidad_und=""){
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> cantidad_und = $pcantidad_und;
        $this -> conexion = new Conexion();
        $this -> cliente_productoDAO = new Cliente_productoDAO($pid_cliente, $pid_prod, $pcantidad_und);
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cliente_productoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $cliente_productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($cliente_productos, new Cliente_producto($resultado[0], $resultado[1], $resultado[2]));
        }
        return $cliente_productos;
    }
    
    function eliminar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cliente_productoDAO -> eliminar());
        $this -> conexion -> cerrar();
    }
    
}

?>