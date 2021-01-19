<?php
require "persistencia/SolicitudDAO.php";

class Solicitud{
    private $id;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $telefono;    
    private $conexion;
    private $solicitudDAO;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getApellido()
    {
        return $this->apellido;
    }
    
    public function getCiudad()
    {
        return $this->ciudad;
    }
    
    public function getDireccion()
    {
        return $this->direccion;
    }
    
    public function getTelefono()
    {
        return $this->telefono;
    }
        
    
    function Solicitud($pId="", $pNombre="", $pApellido="", $pCiudad="", $pDireccion="", $pTelefono="") {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> conexion = new Conexion();
        $this -> solicitudDAO = new SolicitudDAO($pId, $pNombre, $pApellido, $pCiudad, $pDireccion, $pTelefono);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> crear());
        $this -> conexion -> cerrar();
    }        
    
    function consultar(){        
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> ciudad = $resultado[2];
        $this -> direccion = $resultado[3];
        $this -> telefono = $resultado[4];       
    }
        
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new Solicitud($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], 
                $resultado[5]));
        }
        return $solicitudes;
    }
        
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){        
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $solicitudes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($solicitudes, new Solicitud($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4],
                $resultado[5]));
        }
        return $solicitudes;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function eliminar($id){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> solicitudDAO -> eliminar($id));
        $this -> conexion -> cerrar();
    }  
}
?>