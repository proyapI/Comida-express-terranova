<?php
require "persistencia/DomiciliarioDAO.php";

class Domiciliario{
    private $idDomiciliario;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $correo;
    private $clave;
    private $estado;
    private $conexion;
    private $domiciliarioDAO;
    
    public function getIdCliente()
    {
        return $this->idDomiciliario;
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
    
    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function getClave()
    {
        return $this->clave;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }
    
    function Cliente ($pIdDomiciliario="", $pNombre="", $pApellido="", $pCiudad="", $pDireccion, $pCorreo="", $pClave="", $pEstado="") {
        $this -> idCliente = $pIdDomiciliario;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> estado = $pEstado;
        $this -> conexion = new Conexion();
        $this -> domiciliarioDAO = new DomiciliarioDAO ($pIdDomiciliario, $pNombre, $pApellido, $pCiudad, $pDireccion, $pCorreo, $pClave, $pEstado);
    }
    
    function autenticar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> domiciliarioDAO -> autenticar());
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> idDomiciliario = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> DomiciliarioDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> ciudad = $resultado[2];
        $this -> direccion = $resultado[3];
        $this -> correo = $resultado[4];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> DomiciliarioDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $domiciliarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($domiciliarios, new Cliente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], 
                $resultado[5], "", $resultado[6]));
        }
        return $domiciliarios;
    }
    
    function cambiarEstado($estado){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> DomiciliarioDAO -> cambiarEstado($estado));
        $this -> conexion -> cerrar();
    }
    
}


?>