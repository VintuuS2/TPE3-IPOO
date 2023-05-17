<?php 

include_once 'pasajero.php';

class PasajeroEspecial extends Pasajero {
    private $servicioEspeciales;

    function __construct($nombre,$apellido,$dni,$numTelefono,$numAsiento,$numTicket,$servicioEspeciales){
        parent::__construct($nombre,$apellido,$dni,$numTelefono,$numAsiento,$numTicket);
        $this->servicioEspeciales = $servicioEspeciales;
    }

    function getServicioEspeciales(){
        return $this->servicioEspeciales;
    }

    function setServicioEspeciales($servicioEspeciales){
        $this->servicioEspeciales = $servicioEspeciales;
    }

    function __toString(){
        $cadena = parent::__toString();
        $cadena .= "\n".$this->servicioEspeciales;
        return $cadena;
    }

    function darPorcentajeIncremento(){
        $cantServicios = $this->servicioEspeciales;
        $incremento = 1.15;
        if ($cantServicios > 1){
            $incremento = 1.30;
        }
        return $incremento;
    }
}

?>