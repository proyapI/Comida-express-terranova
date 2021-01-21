<?php

class cambioClaveDAO{
    
    private $correo;
    
    function cambioClaveDAO ($pCorreo) {        
        $this -> correo = $pCorreo;        
    }

    function crear () {
        return "insert into cambio_clave (correo)
                values ('" . $this -> correo . "')";
    }    
          
    function consultar(){
        return "select correo from cambio_clave";
    }
          
}
?>