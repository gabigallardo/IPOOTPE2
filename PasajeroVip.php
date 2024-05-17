<?php
class PasajeroVip extends Pasajero
{
    private $numViajeroFrecuente;
    private $cantidadMillas;
    public function  __construct($nombre, $apellido, $documento, $telefono, $numAsiento, $numTicket, $numViajeroFrecuente, $cantidadMillas)
    {
        parent::__construct($nombre, $apellido, $documento, $telefono, $numAsiento, $numTicket);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->cantidadMillas = $cantidadMillas;
    }
    public function getNumViajeroFrecuente()
    {
        return $this->numViajeroFrecuente;
    }
    public function getCantidadMillas()
    {
        return $this->cantidadMillas;
    }
    public function setNumViajeroFrecuente($num)
    {
        $this->numViajeroFrecuente = $num;
    }
    public function setCantidadMillas($cantidad)
    {
        $this->cantidadMillas = $cantidad;
    }
    public function darPorcentajeIncremento()
    {
        $porcentaje = 35;
        if ($this->getCantidadMillas() > 300) {
            $porcentaje += 30;
        }
        return $porcentaje;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Numero de viajero frecuente:" . $this->getNumViajeroFrecuente() . "\n";
        $cadena .= "Cantidad de millas de viajero :" . $this->getCantidadMillas() . "\n";
        return $cadena;
    }
}
