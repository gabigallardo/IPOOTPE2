<?php
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
include_once 'Viaje.php';
include_once 'PasajeroVip.php';
include_once 'PasajerosConNecesidades.php';

while (true) {
    echo "\nMenú:\n";
    echo "1. Cargar informacion del viaje\n";
    echo "2. Modificar informacion del viaje\n";
    echo "3. Ver datos del viaje\n";
    echo "4. Modificar Pasajero\n";
    echo "5. Agregar Pasajero\n";
    echo "6. Salir\n";
    $opcion = readline("Ingrese la opción deseada: ");

    switch ($opcion) {
        case '1':
            $codigo = readline("Ingrese el codigo del nuevo viaje: ");
            $destino = readline("Ingrese el destino del nuevo viaje: ");
            $maxPasajeros = readline("Ingrese la cantidad maxima de pasajeros del nuevo viaje: ");
            $numEmpleado = readline("Ingrese el numero de empleado del responsable del nuevo viaje: ");
            $numLicencia = readline("Ingrese el numero de licencia del responsable del nuevo viaje: ");
            $nombreResponsableV = readline("Ingrese el Nombre del responsable del nuevo viaje: ");
            $apellidoResponsableV  = readline("Ingrese el apellido del responsable del nuevo viaje: ");
            $costoDelViaje = readline("Ingrese el costo del viaje: ");
            $nuevoResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombreResponsableV, $apellidoResponsableV);
            $viaje = new Viaje($codigo, $destino, $maxPasajeros, $nuevoResponsable, $costoDelViaje);
            break;
        case '2':
            while (true) {
                echo "\nDesea modificar:\n";
                echo "1. Modificar codigo del viaje\n";
                echo "2. Modificar destino del viaje\n";
                echo "3. Modificar maximo de pasajeros del viaje\n";
                echo "4. Modificar responsable del viaje\n";
                echo "5. Modificar costos del viaje\n";
                echo "6. Volver al menu anterior\n";
                $opcion = readline("Ingrese la opción deseada: ");
                switch ($opcion) {
                    case '1':
                        echo "Este es el codigo actual del viaje: " . $viaje->getCodigo() . "\n";
                        $viaje->setCodigo(readline("Ingrese el codigo del nuevo viaje: "));
                        break;
                    case '2':
                        echo "Este es el Destino actual del viaje: " . $viaje->getDestino() . "\n";
                        $viaje->setDestino(readline("Ingrese el destino del viaje: "));
                        break;
                    case '3':
                        echo "Esta es la cantidad maxima actual del viaje: " . $viaje->getMaxPasajeros() . "\n";
                        $viaje->setMaxPasajeros(readline("Ingrese la cantidad maxima de pasajeros del viaje: "));
                        break;
                    case '4':
                        $nombreResponsableV = readline("Ingrese el Nombre del responsable del viaje: ");
                        $apellidoResponsableV  = readline("Ingrese el apellido del responsable del viaje: ");
                        $nuevoResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombreResponsableV, $apellidoResponsableV);
                        $viaje->setResponsable($nuevoResponsable);
                        break;
                    case '5':
                        echo "Este es el Costo actual del viaje: " . $viaje->getCosto() . "\n";
                        $viaje->setCosto(readline("Ingrese el nuevo costo del viaje: "));
                        break;
                    case '6':
                        echo "Regresando al menú principal...\n";
                        break 2;
                    default:
                        echo "Opción inválida. Por favor, seleccione una opción válida.\n";
                        break;
                }
            }
            break;
        case '3':
            echo  $viaje;
            break;

        case '4':
            $documento = readline("Ingrese el número de documento del pasajero a modificar: ");
            $nombre = readline("Nuevo nombre del pasajero: ");
            $apellido = readline("Nuevo apellido del pasajero: ");
            $telefono = readline("Nuevo teléfono del pasajero: ");
            if ($viaje->modificarPasajero($documento, $nombre, $apellido, $telefono)) {
                echo "Datos del pasajero modificados con exito.\n ";
            } else {
                echo "El pasajero no existe en este viaje. \n";
            }
            break;
        case '5':
            if ($viaje->hayPasajesDisponibles()) {
                while (true) {
                    echo "\nDesea Agregar:\n";
                    echo "1. Pasajero estandar\n";
                    echo "2. Pasajero VIP\n";
                    echo "3. Pasajero con necesidades especiales\n";
                    echo "4. Volver al menu anterior\n";
                    $opcion = readline("Ingrese la opción deseada: ");
                    switch ($opcion) {
                        case '1':
                            $nombre = readline("Nombre del pasajero: ");
                            $apellido = readline("Apellido del pasajero: ");
                            $documento = readline("Número de documento del pasajero: ");
                            $telefono = readline("Teléfono del pasajero: ");
                            $asiento = (count($viaje->getPasajerosArray()) + 1);
                            $ticket = readline("Ingrese el numero de ticket:");
                            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono, $asiento, $ticket);
                            if ($viaje->venderPasaje($pasajero)) {
                                echo "Pasajero agregado al viaje con exito.\n";
                            } else {
                                echo "El pasajero ya existe en este viaje.\n";
                            }
                            break;
                        case '2':
                            $nombre = readline("Nombre del pasajero: ");
                            $apellido = readline("Apellido del pasajero: ");
                            $documento = readline("Número de documento del pasajero: ");
                            $telefono = readline("Teléfono del pasajero: ");
                            $asiento = (count($viaje->getPasajerosArray()) + 1);
                            $ticket = readline("Ingrese el numero de ticket:");
                            $numeroDeViajeroFrecuente = readline("Ingrese el numero de viajero frecuente: ");
                            $millas = readline("Ingrese la cantidad de millas de viajero frecuente:");
                            $pasajero = new PasajeroVip($nombre, $apellido, $documento, $telefono, $asiento, $ticket, $numeroDeViajeroFrecuente, $millas);
                            if ($viaje->venderPasaje($pasajero)) {
                                echo "Pasajero agregado al viaje con exito.\n";
                            } else {
                                echo "El pasajero ya existe en este viaje.\n";
                            }
                            break;
                        case '3':
                            $nombre = readline("Nombre del pasajero: ");
                            $apellido = readline("Apellido del pasajero: ");
                            $documento = readline("Número de documento del pasajero: ");
                            $telefono = readline("Teléfono del pasajero: ");
                            $asiento = (count($viaje->getPasajerosArray()) + 1);
                            $ticket = readline("Ingrese el numero de ticket:");
                            $silla = readline("El pasajero utiliza silla de ruedas? responda con True/False");
                            $asistencia = readline("El Pasajero necesita asistencia para el embarque o desembarque? responda con True/False");
                            $comida = readline("El pasajero requiere comida especial? responda con True/False");
                            $pasajero = new PasajeroConNecesidades($nombre, $apellido, $documento, $telefono, $asiento, $ticket, $silla, $asistencia, $comida);
                            if ($viaje->venderPasaje($pasajero)) {
                                echo "Pasajero agregado al viaje con exito.\n";
                            } else {
                                echo "El pasajero ya existe en este viaje.\n";
                            }
                            break;
                        case '4':
                            echo "Regresando al menú principal...\n";
                            break 2;
                        default:
                            echo "Opción inválida. Por favor, seleccione una opción válida.\n";
                            break;
                    }
                }
            } else {
                echo "No hay mas pasajes disponibles para la venta.\n";
            }
            break;
        case '6':
            echo "Saliendo del programa...\n";
            exit;
        default:
            echo "Opción inválida. Por favor, seleccione una opción válida.\n";
            break;
    }
}
