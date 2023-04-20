<?php
class Pasajero{
    //atributos
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    //constructor
    public function __construct($nombre, $apellido, $documento,$telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }
    //metodos de acceso
     // métodos get
     public function getNombre()
     {
         return $this->nombre;
     }
 
     public function getApellido()
     {
         return $this->apellido;
     }
 
     public function getDocumento()
     {
         return $this->documento;
     }
 
     public function getTelefono()
     {
         return $this->telefono;
     }
 
     // métodos set
     public function setNombre($nombre)
     {
         $this->nombre = $nombre;
     }
 
     public function setApellido($apellido)
     {
         $this->apellido = $apellido;
     }
 
     public function setDocumento($documento)
     {
         $this->documento = $documento;
     }
 
     public function setTelefono($telefono)
     {
         $this->telefono = $telefono;
     }
 }

/**Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase Responsable que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje. */