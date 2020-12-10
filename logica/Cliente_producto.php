<?php

require "persistencia/Cliente_productoDAO.php";

class Cliente_producto{
    
    private $id_cliente;
    private $id_prod;
    private $nombre_producto;
    private $cantidad_und;
    private $total;
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
    
    public function getNombre_producto()
    {
        return $this->nombre_producto;
    }

    /**
     * @return mixed
     */
    public function getCantidad_und()
    {
        return $this->cantidad_und;
    }
    
    public function getTotal()
    {
        return $this->total;
    }
    
    function Cliente_producto ($pid_cliente="", $pid_prod="", $pnombre_producto="", $pcantidad_und="",$ptotal=""){
        $this -> id_cliente = $pid_cliente;
        $this -> id_prod = $pid_prod;
        $this -> nombre_producto = $pnombre_producto;
        $this -> cantidad_und = $pcantidad_und;
        $this -> total = $ptotal;
        $this -> conexion = new Conexion();
        $this -> cliente_productoDAO = new Cliente_productoDAO($pid_cliente, $pid_prod, $pnombre_producto, $pcantidad_und,$ptotal);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cliente_productoDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function actualizarUnidadesyTotal($idC,$idP,$unidades,$totalP){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cliente_productoDAO -> actualizarUnidadesyTotal($idC,$idP,$unidades,$totalP));
        $this -> conexion -> cerrar();
    }
    
    function consultar($idC,$idP){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cliente_productoDAO -> consultar($idC,$idP));
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre_producto = $resultado[0];       
        $this -> cantidad_und = $resultado[1];
        $this -> total = $resultado[2];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> cliente_productoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $cliente_productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($cliente_productos, new Cliente_producto($resultado[0], $resultado[1], $resultado[2]),$resultado[3],$resultado[4]);
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