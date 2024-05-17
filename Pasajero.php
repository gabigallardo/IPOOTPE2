<?php

class Pasajero
{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numAsiento;
    private $numTicket;

    public function __construct($nombre, $apellido, $documento, $telefono, $numAsiento, $numTicket)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getNumAsiento()
    {
        return $this->numAsiento;
    }
    public function getNumTicket()
    {
        return $this->numTicket;
    }
    public function setNumAsiento($numAsiento)
    {
        $this->numAsiento = $numAsiento;
    }
    public function setNumTicket($numTicket)
    {
        $this->numTicket = $numTicket;
    }
    public function darPorcentajeIncremento()
    {
        return 10;
    }
    public function __toString()
    {
        return "{$this->getNombre()} {$this->getApellido()} \nDocumento: {$this->getDocumento()}\nTeléfono: {$this->getTelefono()}\nNumero de asiento:{$this->getNumAsiento()}\nNumero de ticket:{$this->getNumTicket()} ";
    }
}
