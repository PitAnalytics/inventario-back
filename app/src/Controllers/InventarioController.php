<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class InventarioController extends Controller{

    private $inventario;
    private $zona;

    public function __construct(Container $container){

        $this->container=$container;
        $this->config=$this->container['config'];
        $this->database=$this->container['database']($this->config->database());
        $this->inventario=$this->container['inventario']($this->database);
        $this->zona=$this->container['zona']($this->database);

        
    }

    public function index($request,$response,$args){

        $inventario = $this->inventario->index();
        $response1 = $response->withJson($inventario);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;
        
    }

    public function search($request,$response,$args){

        $inventario = $this->inventario->search($args['zona'],$args['codigoEquipo']);

        $response1 = $response->withJson($inventario);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;
    }

    public function get($request,$response,$args){

        //
        $inventario = $this->inventario->get($args['id']);
        //
        $response1 = $response->withJson($inventario);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;
    }

    public function update($request,$response,$args){

        $idZona=$this->zona->getByName($args['zona']);

        $this->inventario->update(intval($args['id']),$idZona,intval($args['usando']));

        $response1 = $response->withJson(['status'=>'success']);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;

    }

}

?>