<?php
class AdministradorDAO{
    private $idAdministrador;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    
    function AdministradorDAO ($pIdAdministrador, $pNombre, $pApellido, $pCorreo, $pClave) {
        $this -> idAdministrador = $pIdAdministrador;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
    }
    
    function autenticar () {        
        return "select idAdministrador 
                from Administrador 
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')"; 
    }
    
    function consultar () {
        return "select nombre, apellido, correo
                from Administrador
                where idAdministrador = '" . $this -> idAdministrador . "'";
    }

}

?>