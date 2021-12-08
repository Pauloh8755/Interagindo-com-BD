<?php
    //import para o start do slim php - quem vai tratar nossas requisições 
    require_once("vendor/autoload.php");
    
    //instancia da classe Slim\App utilizada para nos dar acesso aos métodos da classe
    $app = new \Slim\App();

    $app->get('/estados', function($request, $response, $args){

        return $response    ->withStatus(200)
                            ->withHeader('Content-Type','application/json')
                            ->write('"message":"Listar Estados"');
    
    });
    $app->run();
?>