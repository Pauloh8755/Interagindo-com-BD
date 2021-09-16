<?php
/*******************************************************
    Objetivo: Arquivo para configurar a conexão com o 
    banco de dados MySql
    Data: 15/09/2021
    Responsável: Paulo Henrique
********************************************************/
function conexaoMysql(){
    require_once('../functions/config.php');
    //Declarando variaveis para conexão com BD
    $server = (string) BD_SERVER;
    $user = (string) BD_USER;
    $password = (string) BD_PASSWORD;
    $database = (string) BD_DATABASE;
    
    //Formas de criar a conexão com o BD
    /*
        mysql_connect(); - Bibliotéca mais antiga (segurança fragil)
        mysqli_connect(); - Atualização da anterior (mais segurança, POO e procedural)
        PDO(); - Bibliotéca mais atualizada e segura (qualquer banco e Orientado a Objeto)
    */
    
    if($conexao = mysqli_connect($server, $user, $password, $database)){
        return $conexao;
    }
    else{
        echo(ERRO_CONEXAO);
        return false;
    }
  
}
?>