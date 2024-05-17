<?php
class PasajeroConNecesidades extends Pasajero
{
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    // Constructor
    public function __construct($n, $a, $doc, $tel, $asiento, $numeroTicket, $sillaDeRuedas, $asistencia, $comidaEspecial)
    {
        parent::__construct($n, $a, $doc, $tel, $asiento, $numeroTicket);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }
    public function getSillaDeRuedas()
    {
        return $this->sillaDeRuedas;
    }
    public function getAsistencia()
    {
        return $this->asistencia;
    }
    public function getComidaEspecial()
    {
        return $this->comidaEspecial;
    }
    public function setSillaDeRuedas($value)
    {
        $this->sillaDeRuedas = $value;
    }
    public function setAsistencia($value)
    {
        $this->asistencia = $value;
    }
    public function setComidaEspecial($value)
    {
        $this->comidaEspecial = $value;
    }
    public function darPorcentajeIncremento()
    {
        $porcentaje = 0;
        if ($this->sillaDeRuedas && $this->asistencia && $this->comidaEspecial) {
            $porcentaje = 30; // Incremento del 30% si se requieren todos los servicios
        } elseif ($this->sillaDeRuedas || $this->asistencia || $this->comidaEspecial) {
            $porcentaje = 15; // Incremento del 15% si se requiere algún servicio
        }
        return $porcentaje;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        if ($this->getSillaDeRuedas()) {
            $cadena .= "El pasajero utiliza silla de ruedas\n";
        } else {
            $cadena .= "El pasajero no utiliza silla de ruedas\n";
        }
        if ($this->getAsistencia()) {
            $cadena .= "El pasajero requiere asistencia para el embarque o desembarque\n";
        } else {
            $cadena .= "El pasajero no requiere asistencia para el embarque o desembarque\n";
        }
        if ($this->getComidaEspecial()) {
            $cadena .= "El pasajero requiere comida especial\n";
        } else {
            $cadena .= "El pasajero no requiere comida especial\n";
        }
        return $cadena;
    }
}
