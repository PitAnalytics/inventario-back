<?php

namespace App\Modules;

//clase madre de coneccion a base de datos
use App\Primitives\Connection as Connection;
//interface de tabla (metodo index)
use App\Interfaces\TableInterface as TableInterface;

class Inventario extends Connection implements TableInterface{

    //toda la tabla
    public function index(){

        $sql="SELECT Inventario.id, Zona.zona, Inventario.codigoEquipo, Inventario.usando ".
        "FROM Inventario ".
        "INNER JOIN Zona ".
        "ON Inventario.idZona = Zona.id ".
        "WHERE 1=1";

        $result = $this->database->query($sql)->fetchAll(2);

        for ($i=0; $i < count($result); $i++) { 

            $result[$i]['id']=intval($result[$i]['id']);
            $result[$i]['usando']=boolval($result[$i]['usando']);

        }

        return $result;

    }

    //buscamos en base a id de zona(ordinal)  y codigoequipo(string)
    public function search($zona,$codigoEquipo){

        $sql='';

        //comodin zona = 0
        //comodin equipo = 1
        if($zona!=='*'&&$codigoEquipo!=='*'){

            $sql="SELECT Inventario.id, Zona.zona, Inventario.codigoEquipo, Inventario.usando ".
            "FROM Inventario ".
            "INNER JOIN Zona ".
            "ON Inventario.idZona = Zona.id ".
            "WHERE ".
            "zona='$zona' ".
            "AND ".
            "codigoEquipo='$codigoEquipo'";

        }
        else if($zona!=='*'&&$codigoEquipo==='*'){

            $sql="SELECT Inventario.id, Zona.zona, Inventario.codigoEquipo, Inventario.usando ".
            "FROM Inventario ".
            "INNER JOIN Zona ".
            "ON Inventario.idZona = Zona.id ".
            "WHERE ".
            "zona='$zona'";

        }
        else if($zona==='*'&&$codigoEquipo!=='*'){

            $sql="SELECT Inventario.id, Zona.zona, Inventario.codigoEquipo, Inventario.usando ".
            "FROM Inventario ".
            "INNER JOIN Zona ".
            "ON Inventario.idZona = Zona.id ".
            "WHERE ".
            "codigoEquipo='$codigoEquipo'";

        }
        else{

            $sql="SELECT Inventario.id, Zona.zona, Inventario.codigoEquipo, Inventario.usando ".
            "FROM Inventario ".
            "INNER JOIN Zona ".
            "ON Inventario.idZona = Zona.id ".
            "WHERE 1=1";
        }

        $result = $this->database->query($sql)->fetchAll(2);

        for ($i=0; $i < count($result); $i++) { 

            $result[$i]['id']=intval($result[$i]['id']);
            $result[$i]['usando']=boolval($result[$i]['usando']);

        }

        return $result;

    }

    public function get($id){

        $sql="SELECT Inventario.id, Zona.zona, Inventario.codigoEquipo, Inventario.usando ".
        "FROM Inventario ".
        "INNER JOIN Zona ".
        "ON Inventario.idZona = Zona.id ".
        "WHERE Inventario.id=$id";

        $result = $this->database->query($sql)->fetch(2);

        if(count($result)){

            $result['id']=intval($result['id']);
            $result['usando']=boolval($result['usando']);

        }

        return $result;

    }

    public function update($id,$idZona,$usando){

        $this->database->update('Inventario',['idZona'=>$idZona,'usando'=>$usando],['id[=]'=>$id]);

    }
    
}

?>