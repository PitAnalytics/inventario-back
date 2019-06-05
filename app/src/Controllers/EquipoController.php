<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class EquipoController extends Controller{

    private $equipo;

    public function __construct(Container $container){

        $this->container=$container;
        $this->config=$this->container['config'];
        $this->database=$this->container['database']($this->config->database());
        $this->equipo=$this->container['equipo']($this->database);
        
    }

    public function index($request,$response,$args){

        $equipos = $this->equipo->index();

        $response1 = $response->withJson($equipos);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;
                
    }

    public function get($request,$response,$args){

        $descripcion = $this->equipo->get($args['codigo']);

        $response1 = $response->withJson($descripcion);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;

    }

}

?>