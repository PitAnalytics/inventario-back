<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface as Container;

class ZonaController extends Controller{

    private $zona;

    public function __construct(Container $container){

        $this->container=$container;
        $this->config=$this->container['config'];
        $this->database=$this->container['database']($this->config->database());
        $this->zona=$this->container['zona']($this->database);
        
    }

    public function index($request,$response,$args){

        $zonas = $this->zona->index();
        $response1 = $response->withJson($zonas);
        $response2 = $response1->withHeader("Access-Control-Allow-Origin","*");

        return $response2;
        
    }


}

?>