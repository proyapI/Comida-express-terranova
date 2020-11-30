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
    
    function DomiciliarioDAO ($pIdDomiciliario, $pNombre, $pApellido, $pCiudad, $pDireccion, $pTelefono, $pCorreo, $pClave, $pEstado) {
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
    
    function crear () {
        return "insert into Domiciliario (idDomiciliario, nombre, apellido, ciudad, direccion, telefono, correo, clave, estado)
                values ('" . $this -> idDomiciliario . "','" . $this -> nombre . "', '" . $this -> apellido . "','" . $this -> ciudad . "',
                '" . $this -> direccion . "','" . $this -> telefono . "','" . $this -> correo . "','" . md5 ($this ->  clave) . "',
                '" . $this -> estado . "')";
    }    
       
    function autenticar () {
        return "select idDomiciliario, estado
                from Domiciliario
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "select nombre, apellido, ciudad, direccion, telefono, correo, estado
                from Domiciliario where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    function consultarTodos () {
        return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, correo, estado
                from Domiciliario";
    }
    
    function editar(){
        return "update Domiciliario
                set nombre = '".$this -> nombre . "', apellido ='" . $this -> apellido . "', ciudad ='" .
                $this -> ciudad . "',direccion = '".$this -> direccion . "', telefono = '" . $this -> telefono . "'
                correo = '" . $this -> correo . "' ,clave = '" . $this -> clave . "'
                where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, correo, estado
                from domiciliario
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, correo, estado
                from domiciliario
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(idDomiciliario)
                from domiciliario";
    }
    
    function cambiarEstado($estado) {
        return "update Domiciliario set estado = '" . $estado . "' 
                where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    
}

?>