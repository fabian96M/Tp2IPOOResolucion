<?php
include_once "Responsable.php";
include_once "Pasajero.php";
class Viaje {
    //atributos
    private $codViaje;
    private $destino;
    private $maxPasajeros;
    private $pasajeros = array();
    private $responsable;
    //metodo constructor
    public function __construct($cViaje, $dest, $maxP,Responsable $responsable) {
        $this->pasajeros = array();
        $this->codViaje = $cViaje;
        $this->destino = $dest;
        $this->maxPasajeros = $maxP;
        $this->responsable = $responsable;
    }
    //metododos de acceso
    //setters
    public function setPasajero($nPasajero, $pos) {
        $this->pasajeros[$pos] = $nPasajero;
    }
    public function setCodViaje($nCodViaje) {
        $this->codViaje = $nCodViaje;
    }
    public function setDestino($ndestino) {
        $this->destino = $ndestino;
    }
    public function setMaxPasajeros($nMaxPasajeros) {
        $this->maxPasajeros = $nMaxPasajeros;
    }
    //getters
    public function getPasajeros() {
        return $this->pasajeros;
    }
    public function getCodViaje() {
        return $this->codViaje;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }
    //Funcion para agregar un pasajero
    public function agregarPasajero($nombre, $apellido, $dni, $telefono) {
        //Se aprovecha la funcion de buscar indice para saber si el pasajero ingresado ya esta cargado (en caso de que no este cargado devuelve -1 ) y en caso de que el arreglo este vacio omitira esta busqueda
        $confirmacion = false;
        if (count($this->pasajeros)> 0 && $this->buscarIndPasajero($dni) != -1) {
            //el pasajero ya esta cargado en el arreglo
            $confirmacion = false;
            //si el arreglo de pasajeros es menor al maximo estipulado
        } elseif (count($this->pasajeros) < $this->maxPasajeros) {
            //se crea un objeto pasajero
            $pasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
            //se añade el nuevo objeto al arreglo en la posicion liberada
            $this->pasajeros[] = $pasajero;
            $confirmacion = true;
        }
        return $confirmacion;
    }
    //funcion para obtener el indice que coincide con el dni que ingresa por parametro
    public function buscarIndPasajero($dniPasajero) {
        $ind = -1;
        $bandera = true;
        $i = 0;
        //mientras la bandera lo permita y la iterancia sea menor a el tamaño del arreglo pasajeros se ejecuta el bucle
        while ($bandera && $i < count($this->pasajeros)) {
            //si hay coincidencia con el dni del objeto pasajero y el dni que ingresa por parametro 
            if ($this->pasajeros[$i]->getDocumento() == $dniPasajero) {
                //se guarda el indice
                $ind = $i;
                //se corta el ciclo para dejar de buscar
                $i = count($this->pasajeros);
                $bandera = false;
            }
        }
        //se retorna el indice o en caso de no encontrarlo se retorna -1
        return $ind;
    }
    public function ModificarDatosPasajero($dniPasajero, $nombre, $apellido, $telefono) {
        $confirmacion = false;
        /** recibe por parametro los datos del pasajero a ingresar, busca la ubicacion del pasajero segun el dni ingresado y reemplaza los datos por el nombre y apellido ingresados*/
        $indice = $this->buscarIndPasajero($dniPasajero);
        //si el indice se contempla entre los valores que puede abarcar el arreglo de pasajeros
        if ($indice >= 0 && $indice < count($this->pasajeros)) {
            //Se asigna al pasajero en la posicion encontrada en el respectivos indice que se desea asignar con el respectivo metodo
            $this->pasajeros[$indice]->setNombre($nombre);
            $this->pasajeros[$indice]->setApellido($apellido);
            $this->pasajeros[$indice]->setTelefono($telefono);
            $confirmacion = true;
        }
        return  $confirmacion;
    }
    //recibe por parametros los datos de un responsable y retorna un objeto tipo Responsable
    public function CargarResponsable($numEmpleado, $numLicencia, $nombre, $apellido) {
        $this->responsable = new Responsable($numEmpleado, $numLicencia, $nombre, $apellido);
    }
    //Devuelve un string con los datos del responsable en una cadena de string
    public function mostrarDatosResponsable() {
        return "\n Nombre Responsable : ".$this->responsable->getNombre()."\n
        Apellido Responsable: ".$this->responsable->getApellido()." \n
        Numero de empleado de Responsable: ".$this->responsable->getNumEmpleado()." \n
        Numero de licencia de responsable: ".$this->responsable->getNumLicencia();
    }
    public function __toString() {
       return "\n 
                  Codigo viaje: " . $this->codViaje . " \n 
                  Destino: " . $this->destino . " \n
                  maximo de pasajeros: " . $this->maxPasajeros . " \n
                  Cantidad de pasajeros: " . count($this->pasajeros) . "\n
                  ".$this->mostrarDatosResponsable();
    }
}
