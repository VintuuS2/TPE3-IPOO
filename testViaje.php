<?php 

include_once 'viaje.php';
include_once 'pasajero.php';
include_once 'pasajeroEspecial.php';
include_once 'pasajeroVIP.php';
include_once 'responsableV.php';

$contTicket = 0;
$contNumAsiento = 0;
$numViajeroFrecuenteAux = 0;

echo "****************************************************************\n";
echo "Bienvenido al creador de viaje.\n";
echo "****************************************************************\n";
echo "Ingrese el código del viaje: ";
$codigo = trim(fgets(STDIN));
echo "Ingrese el destino del viaje: ";
$destino = trim(fgets(STDIN));
echo "Ingrese el cupo del viaje: ";
$cupo = trim(fgets(STDIN));
echo "Ingrese el costo del viaje: ";
$costo = trim(fgets(STDIN));

$viaje = new Viaje($codigo,$destino,$cupo, $costo);

echo "================================================================\n";
echo "Ingrese el nombre del responsable del viaje: ";
$nombre = trim(fgets(STDIN));
echo "Ingrese el apellido del responsable del viaje: ";
$apellido = trim(fgets(STDIN));
echo "Ingrese el número de empleado: ";
$numEmpleado = trim(fgets(STDIN));
echo "Ingrese el número de licencia: ";
$numLicencia = trim(fgets(STDIN));

$responsable = new ResponsableV($nombre, $apellido, $numEmpleado, $numLicencia);

$opcion = 99;

while ($opcion!=0){
    echo "================================================================\n";
    echo "Menu de opciones\n";
    echo "1) Modificar código del viaje\n";
    echo "2) Modificar destino del viaje\n";
    echo "3) Modificar el cupo del viaje\n";
    echo "4) Agregar pasajeros\n";
    echo "5) Modificar pasajeros\n";
    echo "6) Eliminar pasajeros\n";
    echo "7) Ver pasajeros\n";
    echo "8) Ver monto recaudado\n";
    echo "9) Ver datos del responsable del viaje\n";
    echo "10) Ver datos del viaje\n";
    echo "0) Salir\n";
    echo "================================================================\nIngrese una opción: ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion){
        case 1:
            echo "Ingrese el nuevo código del viaje: ";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            break;
        
        case 2:
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            break;

        case 3:
            echo "Ingrese el nuevo cupo del viaje: ";
            $cupo = trim(fgets(STDIN));
            $viaje->setCupo($cupo);
            break;

        case 4:
            $millasAux = 0;
            $cuidadoAux = 0;
            $tipoPasajero = 0;
            if ($viaje->hayPasajesDisponible()){
                echo "1:Pasajero Normal\n2:Pasajero VIP\n3:Pasajero Especial\nIngrese según corresponda: ";
                $tipoPasajero = trim(fgets(STDIN));
                if ($tipoPasajero == 2){
                    echo "Cuantas millas tiene? ";
                    $millasAux = trim(fgets(STDIN));
                } else if ($tipoPasajero != 1){
                    echo "cuantos cuidados necesita? ";
                    $cuidadoAux = trim(fgets(STDIN));
                }
                echo "Ingrese su nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese su apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese su DNI: ";
                $dni = trim(fgets(STDIN));
                echo "Ingrese su número de teléfono: ";
                $numTelefono = trim(fgets(STDIN));
                switch ($tipoPasajero) {
                    case '1':
                        $pasajero = new Pasajero ($nombre, $apellido, $dni, $numTelefono,$contNumAsiento,$contTicket);
                        break;
                
                    case '2':
                        $pasajero = new PasajeroVIP ($nombre, $apellido, $dni, $numTelefono,$contNumAsiento,$contTicket,$numViajeroFrecuenteAux,$millasAux);
                        break;

                    case '3':
                        $pasajero = new PasajeroEspecial ($nombre, $apellido,$dni,$numTelefono,$contNumAsiento,$contTicket,$cuidadoAux);
                        break;
                }
                if ($tipoPasajero!=1 && $tipoPasajero!=2 && $tipoPasajero!=3){
                    echo "Error: No Existe ese tipo de pasajero";
                } else {
                    $costeAux = $viaje->venderPasaje($pasajero);
                    echo "El pasajero deberá pagar: " . $costeAux."\n";
                    $viaje->agregarPasajero($pasajero);
                    $contNumAsiento++;
                    $contTicket++;
                }
            }
            break;

        case 5:
            echo "Ingrese el número de DNI del pasajero a modificar: ";
            $dniIndice = trim(fgets(STDIN));
            if ($viaje->existePasajero($dni)){
                echo "Ingrese el nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el DNI: ";
                $dni = trim(fgets(STDIN));
                echo "Ingrese el número de teléfono: ";
                $numTelefono = trim(fgets(STDIN));
                $persona = new Pasajero($nombre,$apellido,$dni,$numTelefono);
                $viaje->modificarPasajero($persona,$dniIndice);

            } else {
                echo "No existe el pasajero con ese DNI.\n";
            }
            break;

        case 6:
            echo "Ingrese el número de documento del pasajero que desea eliminar: ";
            $dniIndice = trim(fgets(STDIN));
            if ($viaje->existePasajero($dniIndice)){
                $viaje->eliminarPasajero($dniIndice);
            } else {
                echo "No existe pasajero con ese DNI\n";
            }
            break;

        case 7:
            if ($viaje->getCantPasajeros()==0){
                echo "No hay pasajeros para mostrar.\n";
            } else {
                print_r($viaje->getListaPasajeros());
            }
            break;

        case 8:
            $recaudadoTotal = $viaje->getRecaudado();
            echo "El monto total recaudado hasta ahora es de: " . $recaudadoTotal."\n";
            break;

        case 9:
            echo $responsable;
            break;
        
        case 10:
            echo $viaje;
            break;
    }
}
?>