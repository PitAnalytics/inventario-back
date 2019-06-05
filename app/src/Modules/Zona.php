<?php

namespace App\Modules;

//clase madre de conexion a base de datos por inyeccion de dependencias
use App\Primitives\Connection as Connection;
//interface de tabla (metodo index)
use App\Interfaces\TableInterface as TableInterface;

class Zona extends Connection implements TableInterface{

    //mostramos toda la tabla
    public function index(){

       $zonas =  $this->database->select('Zona',['id','zona']);

        for ($i=0; $i <count($zonas); $i++) {

            $zonas[$i]['id']=intval($zonas[$i]['id']);

        }

        return $zonas;

    }

    //obtenemos zona en base a id(numero ordinal)
    public function get($id){

        return $this->database->select('Zona',['id','zona'],['id[=]'=>$id]);

    }

    public function getByName($zona){

        return $this->database->get('Zona',['id'],['zona[=]'=>$zona])['id'];

    }
    
}

?>