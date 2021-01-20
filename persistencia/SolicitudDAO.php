<?php

class SolicitudDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $ciudad;
    private $localidad;
    private $direccion;
    private $telefono;    
    
    function SolicitudDAO ($pId, $pNombre, $pApellido, $pCiudad, $pLocalidad, $pDireccion, $pTelefono) {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> apellido = $pApellido;
        $this -> ciudad = $pCiudad;
        $this -> localidad = $pLocalidad;
        $this -> direccion = $pDireccion;
        $this -> telefono = $pTelefono;        
    }       
    
    function crear () {
        return "insert into Solicitud (id, nombre, apellido, ciudad, localidad, direccion, telefono)
                values ('" . $this -> id . "','" . $this -> nombre . "', '" . $this -> apellido . "','" . $this -> ciudad . "',
                '" . $this -> localidad . "','" . $this -> direccion . "','" . $this -> telefono . "')";
    }    
           
    function consultar(){
        return "select nombre, apellido, ciudad, localidad, direccion, telefono
                from Solicitud where id = '" . $this -> id . "'";
    }
    
    function consultarTodos () {
        return "select id, nombre, apellido, ciudad, localidad, direccion, telefono
                from Solicitud";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "select id, nombre, apellido, ciudad, localidad, direccion, telefono
                from Solicitud
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "select id, nombre, apellido, ciudad, localidad, direccion, telefono
                from Solicitud
                order by " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }
    
    function consultarTotalRegistros(){
        return "select count(id)
                from Solicitud";
    }
    
    function eliminar($id){
        return "delete from solicitud where id = '".$id."'";
    }   
  }
?>