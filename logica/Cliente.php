<?php
require "persistencia/ClienteDAO.php";

class Cliente{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $correo;
    private $clave;    
    private $conexion;
    private $clienteDAO;
    
    public function getIdCliente()
    {
        return $this->idCliente;
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
    
    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function getClave()
    {
        return $this->clave;
    }
    
    function Cliente ($pIdCliente="", $pNombre="", $pApellido="", $pCiudad="", $pDireccion="", $pTelefono="", $pCorreo="", $pClave="") {
        $this -> idCliente = $pIdCliente;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;          
        $this -> conexion = new Conexion();
        $this -> clienteDAO = new ClienteDAO($pIdCliente, $pNombre, $pApellido, $pCiudad, $pDireccion,  $pTelefono, $pCorreo, $pClave);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function autenticar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> autenticar());
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> idCliente = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> ciudad = $resultado[2];
        $this -> direccion = $resultado[3];
        $this -> telefono = $resultado[4];
        $this -> correo = $resultado[5];        
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $clientes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($clientes, new Cliente($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6],""));
        }
        return $clientes;
    }
    
}


?>