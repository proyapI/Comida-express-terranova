<?php
class ClienteDAO{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $imagen;
    private $correo;
    private $clave;
    
    function ClienteDAO ($pIdCliente, $pNombre, $pApellido, $pCiudad, $pDireccion, $pTelefono, $pImagen, $pCorreo, $pClave) {
        $this -> idCliente = $pIdCliente;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;
        $this -> imagen = $pImagen;
        $this -> correo = $pCorreo;
        $this -> clave = $pClave;        
    }
    
    function crear () {
        return "insert into Cliente (idCliente, nombre, apellido, ciudad, direccion, telefono, imagen, correo, clave)
                values ('" . $this -> idCliente . "','" . $this -> nombre . "', '" . $this -> apellido . "','" . $this -> ciudad . "', 
                '" . $this -> direccion . "','" . $this -> telefono . "','" . $this -> imagen . "','" . $this -> correo . "','" . md5 ($this ->  clave) . "')";        
    }
    
    function autenticar () {
        return "select idCliente from Cliente
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
       
    function consultar(){
        return "select idCliente, nombre, apellido, ciudad, direccion, telefono, imagen, correo
                from Cliente where idCliente = '" . $this -> idCliente . "'";
    }
    
    function consultarTodos () {
        return "select idCliente, nombre, apellido, ciudad, direccion, telefono, imagen, correo
                from Cliente";
    }
    
    function editar(){
        return "update Cliente
                set nombre = '".$this -> nombre . "', apellido ='" . $this -> apellido . "', ciudad ='" .
                $this -> ciudad . "',direccion = '".$this -> direccion . "', telefono = '" . $this -> telefono . "'
                correo = '" . $this -> correo . "' ,clave = '" . $this -> clave . "'
                where idCliente = '" . $this -> idCliente . "'";
    }
    
    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select idCliente, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
                from cliente
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select idCliente, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
                from cliente
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(idCliente)
                from cliente";
    }
    
    function buscar($filtro){
        return "select idCliente, nombre, apellido, ciudad, direccion, telefono, imagen, correo, estado
                from cliente
                where nombre like '" . $filtro . "%'";
    }
    
    function editarFoto() {
        return "update Cliente set imagen = '" . $this -> imagen . "'
                where idCliente = '" . $this -> idCliente . "'";
    }
   
}

?>