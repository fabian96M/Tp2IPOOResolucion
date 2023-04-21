<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'Responsable.php';
echo "inicia codigo";
//creamos instancias de la clase Responsable
// Instancia 1: responsable 1 con número de empleado 1234, número de licencia 5678, nombre Pedro y apellido García
$responsable1 = new Responsable("1234", "5678", "Pedro", "García");
//////////////////////////////////////////////////////////////////
//CREAMOS INSTANCIAS DE LA CLASE VIAJE
// Instancia 1: viaje a la playa con 5 pasajeros y Pedro como responsable
$viaje1 = new Viaje("P001", "Playa del Carmen", 5, $responsable1);
//añadimos los arreglos de pasajeros a los viajes
//instanciamos la coleccion del viaje1
$viaje1->agregarPasajero("Ana", "García", "123456", "5551234");
$viaje1->agregarPasajero("Juan", "Pérez", "789012", "5555678");
$viaje1->agregarPasajero("Laura", "Martínez", "345678", "5559012");
//ahora podemos trabajar con los datos
echo "DATOS DE VIAJES";
echo " \n".$viaje1;
