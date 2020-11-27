<?php
class ClienteDAO{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $correo;
    private $clave;
    
    function ClienteDAO ($pIdCliente, $pNombre, $pApellido, $pCiudad, $pDireccion, $pCorreo, $pClave) {
        $this -> idCliente = $pIdCliente;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
    }
    
    function crear () {
        return "insert into Cliente (idCliente, nombre, apellido, ciudad, direccion, correo, clave)
                values ('" . $this -> idCliente . "','" . $this -> nombre . "', '" . $this -> apellido . "','" . $this -> ciudad . "', 
                '" . $this -> direccion . "','" . $this -> correo . "','" . md5 ($this ->  clave) . "')";
    }
    
    function autenticar () {
        return "select idCliente from Cliente
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
       
    function consultarTodos () {
        return "select idCliente, nombre, apellido, ciudad, direccion, correo
                from Cliente";
    }
   
}

?>