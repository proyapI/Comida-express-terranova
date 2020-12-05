<?php
class LogDAO{
    private $idLog;
    private $accion;
    private $datos;
    private $fecha;
    private $hora;
    private $actor;
    
    function LogDAO ($pIdLog, $pAccion, $pDatos, $pFecha, $pHora, $pActor) {
        $this -> idLog = $pIdLog;
        $this -> accion = $pAccion;
        $this -> datos = $pDatos;
        $this -> fecha = $pFecha;
        $this -> hora = $pHora;
        $this -> actor = $pActor;
    }
    
    function agregar(){
        return "insert into log (idLog, accion, datos,  fecha, hora, actor)
                values ('".$this -> idLog ."','".$this -> accion . "', '".$this -> datos . "','" . $this -> fecha . "','" . $this -> hora ."', '".$this -> actor ."')";
    }
    
    function consultarTodos () {
        return "select idLog, accion, datos, fecha, hora, actor from log";
    }
}
?>