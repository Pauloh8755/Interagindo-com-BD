<?php
/*******************************************************
    Objetivo: Arquivo para configurar a conexão com o 
    banco de dados MySql
    Data: 15/09/2021
    Responsável: Paulo Henrique
********************************************************/
function conexaoMysql(){
    //Declarando variaveis para conexão com BD
    $server = (string) 'localhost';
    $user = (string) 'root';
    $password = (string) 'bcd127';
    $database = (string) 'db_contatos_2021_2t';
    
    //Formas de criar a conexão com o BD
    /*
        mysql_connect(); - Bibliotéca mais antiga (segurança fragil)
        mysqli_connect(); - Atualização da anterior (mais segurança, POO e procedural)
        PDO(); - Bibliotéca mais atualizada e segura (qualquer banco e Orientado a Objeto)
    */
    
    if($conexao = mysqli_connect($server, $user, $password, $database)){
        echo('Conexão com sucesso')
    }
    else{
        echo('falha ao conectar ao BD')
    }
}
?>