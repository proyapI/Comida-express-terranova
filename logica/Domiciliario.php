<?php
require "persistencia/DomiciliarioDAO.php";

class Domiciliario{
    private $idDomiciliario;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $correo;
    private $clave;
    private $estado;
    private $conexion;
    private $domiciliarioDAO;
    
    public function getIdDomiciliario()
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
    
    public function getEstado()
    {
        return $this->estado;
    }
    
    function Domiciliario ($pIdDomiciliario="", $pNombre="", $pApellido="", $pCiudad="", $pDireccion="", $pTelefono="",$pCorreo="", $pClave="", $pEstado="") {
        $this -> idCliente = $pIdDomiciliario;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> estado = $pEstado;
        $this -> conexion = new Conexion();
        $this -> domiciliarioDAO = new DomiciliarioDAO ($pIdDomiciliario, $pNombre, $pApellido, $pCiudad, $pDireccion, $pTelefono, $pCorreo, $pClave, $pEstado);
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> domiciliarioDAO -> crear());
        $this -> conexion -> cerrar();
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
        $this -> telefono = $resultado[4];
        $this -> correo = $resultado[5];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> DomiciliarioDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $domiciliarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($domiciliarios, new Domiciliario($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], 
                $resultado[5], $resultado[6],"",$resultado[7]));
        }
        return $domiciliarios;
    }
    
    function editar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> domiciliarioDAO -> editar());
        $this -> conexion -> cerrar();
    }
    
    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> domiciliarioDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $domiciliarios = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($domiciliarios, new Domiciliario($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], 
                $resultado[5]),$resultado[6],"",$resultado[7]);
        }
        return $domiciliarios;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> domiciliarioDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    function cambiarEstado($estado){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> DomiciliarioDAO -> cambiarEstado($estado));
        $this -> conexion -> cerrar();
    }
    
}


?>