<?php
class DomiciliarioDAO{
    private $idDomiciliario;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $correo;
    private $clave;
    private $estado;
    
    function ClienteDAO ($pIdDomiciliario, $pNombre, $pApellido, $pCiudad, $pDireccion, $pCorreo, $pClave, $pEstado) {
        $this -> idDomiciliario = $pIdDomiciliario;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> estado = $pEstado;
    }
       
    function consultarTodos () {
        return "select idDomiciliario, nombre, apellido, ciudad, direccion, correo, estado
                from Domiciliario";
    }
    
    function cambiarEstado($estado) {
        return "update Domiciliario set estado = '" . $estado . "' 
                where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    
}

?>