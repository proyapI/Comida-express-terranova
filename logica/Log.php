<?php

require "persistencia/LogDAO.php";

class Log{
    private $idLog;
    private $accion;
    private $datos;
    private $fecha;
    private $hora;
    private $actor;
    private $conexion;
    private $logDAO;

    /**
     * @return mixed
     */
    public function getIdLog()
    {
        return $this->idLog;
    }

    /**
     * @return mixed
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * @return mixed
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor;
    }

    function Log($pidLog="", $paccion="", $pdatos="", $pfecha="", $phora="", $pactor=""){
        $this->idLog = $pidLog;
        $this->accion = $paccion;
        $this->datos = $pdatos;
        $this->fecha = $pfecha;
        $this->hora = $phora;
        $this->actor = $pactor;
        $this->conexion = new Conexion();
        $this->logDAO = new LogDAO($pidLog, $paccion, $pdatos, $pfecha, $phora, $pactor);
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $log = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($log, new Cliente_producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5]));
        }
        return $log;
    }

}
    
?>
