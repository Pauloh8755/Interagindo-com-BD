<?php
    //permissões e configurações para o consumo da api por outras aplicações
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Header: Content-Type');
    header('Content-Type: application/json');
    //import do arquivo de configuração do sistema
    require_once("../functions/config.php");

    $url = (string) null;

    //recebendo escrita da url
    $url = explode("/",$_GET['url']);

    switch ($url[0]){
        case 'clientes':
            //import do arquivo de api de clientes.
            require_once('clientesAPI/index.php');
            break;

        case 'estados':
            //import do arquivo de api de estados.
            require_once('estadosAPI/index.php');
            break;
    }

 
?>