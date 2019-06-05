<?php

namespace App\Modules;

//clase madre de conexion a base de datos por inyeccion de dependencias
use App\Primitives\Connection as Connection;
//interface de tabla (metodo index)
use App\Interfaces\TableInterface as TableInterface;

class User extends Connection implements TableInterface{

    //mostramos toda la tabla
    public function index(){



    }

    //obtenemos zona en base a id(numero ordinal)
    public function get($id){

        

    }
    
}

?>