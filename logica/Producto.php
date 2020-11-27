<?php

require "persistencia/ProductoDAO.php";

class Producto{
    
    private $id_prod;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $cantidad_und;
    private $valor;
    private $conexion;
    private $productoDAO;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @return mixed
     */
    public function getCantidad_und()
    {
        return $this->cantidad_und;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    
    function ProductoDAO($pid_prod="", $pnombre="", $pdescripcion="", $pimagen="", $pcantidad_und="", $pvalor=""){
        $this -> id_prod = $pid_prod;
        $this -> nombre = $pnombre;
        $this -> descripcion = $pdescripcion;
        $this -> imagen = $pimagen;
        $this -> cantidad_und = $pcantidad_und;
        $this -> valor = $pvalor;
        $this -> conexion = new Conexion();
        $this -> productoDAO = new ProductoDAO($pid_prod, $pnombre, $pdescripcion, $pimagen, $pcantidad_und, $pvalor);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> agregar());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $productos;
    }
    
    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> editar());
        $this -> conexion -> cerrar();
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $productos;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> buscar($filtro));
        $this -> conexion -> cerrar();
        $productos = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $productos;
    }
    
}

?>