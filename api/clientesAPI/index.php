<?php
    //import para o start do slim php - quem vai tratar nossas requisições 
    require_once("vendor/autoload.php");
    //import do arquivo de configuração do sistema
    // require_once("../functions/config.php");

    //instancia da classe Slim\App utilizada para nos dar acesso aos métodos da classe
    $app = new \Slim\App();

    //EndPoint - Um ponto de parada da API, ou seja, serão as formas de requisição
    //que a api irá responder

    //endPoint para responder API de clientes através do método get
        //calback request, response, args
        //request: pegar algo que sera enviado para api
        //response: para quando a api devolver algo (mensagem, status, body, header etc).
        //args: serão os argumentos que podem ser encaminhados para api
    
    //Endpoint: GET, retorna todos os dados de clientes
    $app->get('/clientes', function($request, $response, $args){
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type','aplication/json')
                            ->write('{"message":"Requisição com sucesso"}');
    });
    //EndPoint: Post, envia um novo cliente para o BD
    $app->post('/clientes', function($request, $response, $args){
        return $response    ->withStatus(201)
                            ->withHeader('Content-Type','aplication/json')
                            ->write('{"message":"Item criado com sucesso"}');
    });
    //EndPoint: PUT, atualiza um cliente no BD
    $app->put('/clientes', function($request, $response, $args){
        return $response    ->withStatus(201)
                            ->withHeader('Content-Type','aplication/json')
                            ->write('{"message":"Item atualizado com sucesso"}');
    });
    //EndPoint: DELETE, exclui um cliente no BD
    $app->delete('/clientes', function($request, $response, $args){
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type','aplication/json')
                            ->write('{"message":"Item deletado com sucesso"}');
    });

    //Carrega todos os endPoints para execução
    $app->run();
?>