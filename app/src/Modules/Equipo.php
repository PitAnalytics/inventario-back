<?php

namespace App\Modules;

use App\Primitives\Connection as Connection;

use App\Interfaces\TableInterface as TableInterface;

class Equipo extends Connection implements TableInterface{

    public function index(){

        return $this->database->select('Equipo',['codigo','descripcion']);

    }

    public function get($codigo){

        return $this->database->get('Equipo',['codigo','descripcion','img'],['codigo[=]'=>$codigo]);

    }
    
}

?>