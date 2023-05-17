<?php 

class ResponsableV{
    private $nombre;
    private $apellido;
    private $numEmpleado;
    private $numLicencia;

    function __construct($nombre,$apellido,$numEmpleado,$numLicencia){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getApellido(){
        return $this->apellido;
    }

    function setApellido($apellido){
        $this->apellido = $apellido;
    }

    function getNumEmpleado(){
        return $this->numEmpleado;
    }

    function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    function getNumLicencia(){
        return $this->numLicencia;
    }

    function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    function __toString(){
        return "(".$this->nombre."\n".$this->apellido."\n".$this->numEmpleado."\n".$this->numLicencia.")\n";
    }
}

?>