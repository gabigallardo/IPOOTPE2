<?php
// // Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos
//  de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la informa
//  ción correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
// // Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permi
// ta cargar la información del viaje, modificar y ver sus datos.
// // Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, ap
// ellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos 
// de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el
//  viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
//   La clase Viaje debe hacer referencia al responsable de realizar el viaje.
// // Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Lueg
// o implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de 
// los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

class Viaje
{
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajerosArray = [];
    private $objResponsable;
    private $costo;
    private $costosAbonados;

    public function __construct($codigo, $destino, $maxPasajeros, ResponsableV $objResponsable, $costo)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->objResponsable = $objResponsable;
        $this->costo = $costo;
        $this->costosAbonados = 0;
    }

    // Métodos de acceso (getters)
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getMaxPasajeros()
    {
        return $this->maxPasajeros;
    }

    public function getPasajerosArray()
    {
        return $this->pasajerosArray;
    }

    public function getResponsable()
    {
        return $this->objResponsable;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getCostosAbonados()
    {
        return $this->costosAbonados;
    }
    // Métodos de modificación (setters)
    public function setCostosAbonados($costos)
    {
        $this->costosAbonados = $costos;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function setMaxPasajeros($maxPasajeros)
    {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function setPasajerosArray($pasajeros)
    {
        $this->pasajerosArray = $pasajeros;
    }

    public function setResponsable(ResponsableV $responsable)
    {
        $this->objResponsable = $responsable;
    }
    public function venderPasaje($objPasajero)
    {
        $costoFinal = -1;
        if ($this->agregarPasajero($objPasajero)) {
            $costoFinal = $this->getCosto();
            $costoFinal *= (1 + $objPasajero->darPorcentajeIncremento() / 100);
            $this->setCostosAbonados($this->getCostosAbonados() + $costoFinal);
        }
        return $costoFinal;
    }
    public function agregarPasajero(Pasajero $objPasajero)
    {
        $retorno = false;
        if (!$this->existePasajero($objPasajero) && $this->hayPasajesDisponibles()) {
            $this->pasajerosArray[] = $objPasajero;
            $retorno = true;
        }
        return $retorno;
    }
    public function hayPasajesDisponibles()
    {
        $retorno = false;
        $cantidadDePasajeros = count($this->pasajerosArray);
        if ($this->getMaxPasajeros() > $cantidadDePasajeros) {
            $retorno = true;
        }
        return $retorno;
    }
    public function modificarPasajero($documento, $nombre, $apellido, $telefono)
    {
        $retorno = false;
        foreach ($this->pasajerosArray as $pasajero) {
            if ($pasajero->getDocumento() == $documento) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                $retorno = true;
            }
        }
        return $retorno;
    }

    private function existePasajero(Pasajero $objPasajero)
    {
        $retorno = false;
        foreach ($this->pasajerosArray as $p) {
            if ($p->getDocumento() == $objPasajero->getDocumento()) {
                $retorno = true;
            }
        }
        return $retorno;
    }

    public function __toString()
    {
        $info = "Código de Viaje: {$this->codigo}\n";
        $info .= "Destino: {$this->destino}\n";
        $info .= "Cantidad Máxima de Pasajeros: {$this->maxPasajeros}\n";
        $info .= $this->objResponsable . "\n";
        $info .= "Pasajeros:\n";
        foreach ($this->pasajerosArray as $pasajero) {
            $info .= "- " . $pasajero . "\n";
        }
        return $info;
    }
}
