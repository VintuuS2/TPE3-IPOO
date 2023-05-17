<?php 

class Pasajero{
    private $nombre;
    private $apellido;
    private $dni;
    private $numTelefono;
    private $numAsiento;
    private $numTicket;

    function __construct($nombre,$apellido,$dni,$numTelefono, $numAsiento, $numTicket){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->numTelefono = $numTelefono;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
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

    function getDni(){
        return $this->dni;
    }

    function setDni($dni){
        $this->dni = $dni;
    }

    function getNumTelefono(){
        return $this->numTelefono;
    }

    function setNumTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }

    function getNumAsiento(){
        return $this->numAsiento;
    }

    function setNumAsiento($numAsiento){
        $this->numAsiento = $numAsiento;
    }

    function getNumTicket(){
        return $this->numTicket;
    }

    function setNumTicket($numTicket){
        $this->numTicket = $numTicket;
    }

    function __toString(){
        return "(".$this->nombre."\n".$this->apellido."\n".$this->dni."\n".$this->numTelefono."\n".$this->numAsiento."\n".$this->numTicket.")\n";
    }

    function darPorcentajeIncremento(){
        $incremento = 1.10;
        return $incremento;
    }
}

?>