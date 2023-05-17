<?php 

include_once 'pasajero.php';

class PasajeroVIP extends Pasajero {
    private $nViajeroFrecuente;
    private $cantMillas;

    function __construct($nombre,$apellido,$dni,$numTelefono,$numAsiento,$numTicket,$nViajeroFrecuente,$cantMillas){
        parent::__construct($nombre,$apellido,$dni,$numTelefono,$numAsiento,$numTicket);
        $this->nViajeroFrecuente = $nViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }

    function getNViajeroFrecuente(){
        return $this->nViajeroFrecuente;
    }

    function setNViajeroFrecuente($nViajeroFrecuente){
        $this->nViajeroFrecuente = $nViajeroFrecuente;
    }

    function getCantMillas(){
        return $this->cantMillas;
    }

    function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    function __toString(){
        $cadena = parent::__toString();
        $cadena .= "\n".$this->nViajeroFrecuente."\n".$this->cantMillas;
        return $cadena;
    }

    function darPorcentajeIncremento(){
        $millasAux = $this->getCantMillas();
        $incremento = 1.35;
        if ($millasAux > 300){
            $incremento = 1.30;
        }
        return $incremento;
    }
}

?>