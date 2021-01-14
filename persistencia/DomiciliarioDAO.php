<?php

class DomiciliarioDAO{
    private $idDomiciliario;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $imagen;
    private $correo;
    private $clave;
    private $estado;
    
    function DomiciliarioDAO ($pIdDomiciliario, $pNombre, $pApellido, $pCiudad, $pDireccion, $pTelefono, $pImagen, $pCorreo, $pClave, $pEstado) {
        $this -> idDomiciliario = $pIdDomiciliario;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;
        $this -> estado = $pEstado;
    }
    
    function domiciliarioSeleccionado(){
        return "SELECT idDomiciliario FROM Domiciliario ORDER BY RAND() LIMIT 1";
    }
    
    function crear () {
        return "insert into Domiciliario (idDomiciliario, nombre, apellido, ciudad, direccion, telefono, imagen, correo, clave, estado)
                values ('" . $this -> idDomiciliario . "','" . $this -> nombre . "', '" . $this -> apellido . "','" . $this -> ciudad . "',
                '" . $this -> direccion . "','" . $this -> telefono . "','" . $this -> imagen . "','" . $this -> correo . "','" . md5 ($this ->  clave) . "',
                '" . $this -> estado . "')";
    }    
       
    function autenticar () {
        return "select idDomiciliario, estado
                from Domiciliario
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "select nombre, apellido, ciudad, direccion, telefono, imagen, correo, clave, estado
                from Domiciliario where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    function consultarTodos () {
        return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
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
            return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
                from domiciliario
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
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
        return "update domiciliario set estado = '" . $estado . "' 
                where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    function buscar($filtro){
        return "select idDomiciliario, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
                from domiciliario
                where nombre like '" . $filtro . "%'";
    }
    
    function editarFoto() {
        return "update Domiciliario set imagen = '" . $this -> imagen . "'
                where idDomiciliario = '" . $this -> idDomiciliario . "'";
    }
    
    function eliminar(){
        return "delete from domiciliario where idDomiciliario = '".$this -> idDomiciliario."'";
    }   
}
?>