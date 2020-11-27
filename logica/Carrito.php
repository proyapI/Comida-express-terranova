<?php

require "persistencia/CarritoDAO.php";

class Carrito{
    
    private $id_pedido;
    private $id_prod;
    private $cantidad_und;
    private $conexion;
    private $carritoDAO;
    
    /**
     * @return string
     */
    public function getId_pedido()
    {
        return $this->id_pedido;
    }

    /**
     * @return string
     */
    public function getId_prod()
    {
        return $this->id_prod;
    }

    /**
     * @return string
     */
    public function getCantidad_und()
    {
        return $this->cantidad_und;
    }

    function Carrito ($pid_pedido="", $pid_prod="", $pcantidad_und=""){
        $this -> id_pedido = $pid_pedido;
        $this -> id_prod = $pid_prod;
        $this -> cantidad_und = $pcantidad_und;
        $this -> conexion = new Conexion();
        $this -> carritoDAO = new CarritoDAO($pid_pedido, $pid_prod, $pcantidad_und); 
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> carritoDAO -> agregar());
        $this -> conexion -> cerrar();
    }
    
    function eliminar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> carritoDAO -> eliminar());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> carritoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $carritos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($carritos, new Carrito($resultado[0], $resultado[1], $resultado[2]));
        }
        return $carritos;
    }
    
}

?>