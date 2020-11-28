<?php
class DomiciliarioDAO{
    private $idDomiciliario;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $correo;
    private $clave;
    private $estado;
    
    function ClienteDAO ($pIdDomiciliario, $pNombre, $pApellido, $pCiudad, $pDireccion, $pTelefono, $pCorreo, $pClave, $pEstado) {
        $this -> idDomiciliario = $pIdDomiciliario;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> estado = $pEstado;
    }
       
    function autenticar () {
        return "select idDomiciliario, estado
                from Domiciliario
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultarTodos () {
        return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, correo, estado
                from Domiciliario";
    }
    
    function cambiarEstado($estado) {
        return "update Domiciliario set estado = '" . $estado . "' 
                where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    
}

?>