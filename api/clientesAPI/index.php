<?php
    //import para o start do slim php - quem vai tratar nossas requisições 
    require_once("vendor/autoload.php");
    //import do arquivo de configuração do sistema
    require_once("../functions/config.php");
     
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
        //import do arquivo que solicita requisições de busca no BD
        require_once("../controller/exibeDadosCliente.php");
        //validando chegada de dados como parametro
        if(isset($request ->getQueryParams()['nome'])){
            //Recebendo dados pela queryString
            $nome = (string) null;
            //recebe variavél se ela for passada como parametro
            $nome = $request ->getQueryParams()['nome'];

            //recebendo dados dos clientes buscados
            if($listaDados = buscarClientesPeloNome($nome)){
                if($arrayDados = criarArray($listaDados)){
                    $jsonCliente = criarJson($arrayDados);
                }
            }
        }
        else{
            //chamando função para requisitar os dados do BD (na psta Controller)
            if($listaDados = exibirClientes()){
                if($arrayDados = criarArray($listaDados)){
                    $jsonCliente = criarJson($arrayDados);
                    
                }
            } 
        }
        //validação para tratar BD sem conteúdo
        if($arrayDados){
            return $response    ->withStatus(200)
                                ->withHeader('Content-Type','application/json')
                                ->write($jsonCliente);
        }
        else{ 
            return $response    ->withStatus(204);
                                               
        }
    });

    //Endpoint: GET, retorna um cliente através do id
    $app->get('/clientes/{id}', function($request, $response, $args){
        //import do arquivo que solicita requisições de busca no BD
        require_once("../controller/visualizarDadosClientes.php");

        require_once("../controller/exibeDadosCliente.php");
        
        //recebendo id passado através do $args, que por sua vez esta pegando o valor da variavel criada na URL
        $id = $args['id'];
       
         //chamando função para requisitar os dados do BD (na psta Controller)
         if($arrayDados = visualizarCliente($id)){
                 $jsonCliente = criarJson($arrayDados);
         } 
         //validação para tratar BD sem conteúdo
         if($arrayDados){
             return $response    ->withStatus(200)
                                 ->withHeader('Content-Type','application/json')
                                 ->write($jsonCliente);
         }
         else{ 
             return $response    ->withStatus(204);               
         }
     });
    //EndPoint: Post, envia um novo cliente para o BD
    $app->post('/clientes', function($request, $response, $args){
        //recebendo content type do header para verificar se o padrão do body será json
        $contentType = $request->getHeaderLine('Content-Type');
        //Validadando se o tipo de arquivo é json
        if($contentType == 'application/json'){
            //recebe o conteudo enviado no body
            $dadosBodyJson = $request->getParsedBody();
            //validando se o corpo do arquivo está vazio
            if($dadosBodyJson == "" || $dadosBodyJson == null){
                return $response    ->withStatus(406)
                                    ->withHeader('Content-Type','application/json')
                                    ->write('{"message":"Conteúdo enviado pelo body não contém dados válidos"}');
            }
            else{
                //import do arquivo para manipular dados a serem inseridos
                require_once(RAIZ. "/controller/recebeDadosClientesAPI.php");
               
                //inserindo e validando se os dados foram inseridos com sucesso
                if(inserirClienteAPI($dadosBodyJson)){
                    return $response    ->withStatus(201)
                                        ->withHeader('Content-Type','application/json')
                                        ->write('{"message":"Cliente inserido com sucesso"}');
                }
                else{
                    return $response    ->withStatus(400)
                                        ->withHeader('Content-Type','application/json')
                                        ->write('{"message":"Erro ao inserir dados no banco"}');
                }
            }
        }
        else{
            return $response    ->withStatus(406)
                                ->withHeader('Content-Type','application/json')
                                ->write('{"message":"Formato de dados do header não é compativel com o json"}');
        }
    });
    //EndPoint: PUT, atualiza um cliente no BD
    $app->put('/clientes/{id}', function($request, $response, $args){
       //recebendo content type do header para verificar se o padrão do body será json
       $contentType = $request->getHeaderLine('Content-Type');
       //Validadando se o tipo de arquivo é json
       if($contentType == 'application/json'){
           //recebe o conteudo enviado no body
           $dadosBodyJson = $request->getParsedBody();

           //validando se o corpo do arquivo está vazio
           if($dadosBodyJson == "" || $dadosBodyJson == null || !isset($args['id']) || !is_numeric($args['id'])){
               return $response    ->withStatus(406)
                                   ->withHeader('Content-Type','application/json')
                                   ->write('{"message":"Conteúdo enviado pelo body não contém dados válidos"}');
           }
           else{
               
               $id = $args['id'];
               
               //import do arquivo para manipular dados a serem inseridos
               require_once(RAIZ. "/controller/recebeDadosClientesAPI.php");
               
               //inserindo e validando se os dados foram inseridos com sucesso
               if(atualizarClienteAPI($dadosBodyJson, $id)){
                
                   return $response    ->withStatus(201)
                                       ->withHeader('Content-Type','application/json')
                                       ->write('{"message":"Cliente Atualizado com sucesso"}');
               }
               else{
               
                   return $response    ->withStatus(400)
                                       ->withHeader('Content-Type','application/json')
                                       ->write('{"message":"Erro ao atualizar dados no banco"}');
               }
           }
       }
       else{
       
           return $response    ->withStatus(406)
                               ->withHeader('Content-Type','application/json')
                               ->write('{"message":"Formato de dados do header não é compativel com o json"}');
       }

    });
    //EndPoint: DELETE, exclui um cliente no BD
    $app->delete('/clientes/{id}', function($request, $response, $args){
        if(isset($args['id']) && is_numeric($args['id'])){

            //import do arquivo para manipular dados a serem inseridos
            require_once(RAIZ. "/controller/recebeDadosClientesAPI.php");

            if(deletarClienteAPI($args['id'])){
                return $response    ->withStatus(200)
                                    ->withHeader('Content-Type','application/json')
                                    ->write('{"message":"Item deletado com sucesso"}');
            }
            else{
                return $response    ->withStatus(400)
                                    ->withHeader('Content-Type','application/json')
                                    ->write('{"message":"Falha ao deletadar cliente"}');
            }
        }
        else{
            return $response    ->withStatus(406)
                                   ->withHeader('Content-Type','application/json')
                                   ->write('{"message":"ID não encaminhado"}');
        }

        
    });

    //Carrega todos os endPoints para execução
    $app->run();
?>


