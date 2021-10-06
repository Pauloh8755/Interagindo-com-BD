<?php
/*****************************************************************
    Objetivo: Listar todos os dados de clientes do banco de dados
    Data: 23/09/2021
    Responsavel: Paulo Henrique     
******************************************************************/
//import arquivo de conexão com o banco 
require_once(RAIZ . "bd/conexaoMysql.php");
//Retorna todos os registros existentes no banco
function selectCliente(){
    //recebendo comando slq. Utilizamos order by para ordenar esse select
    //                             ordernar por id do cliente decrescente                    
    $sql = "select * from tbl_cliente order by id_cliente desc";

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //solicita ao BD a execução do script sql e recebe os dados na variavel $select
    $select = mysqli_query($conexao, $sql);

    return $select;
}

//retorna apenas uma instancia, com base no id
function selectInstancia($idCliente){
    //recebendo comamdo slq  para buscar cliente pelo id
    $sql = "select * from tbl_cliente where id_cliente =" .$idCliente;
    //abindo conexão
    $conexao = conexaoMysql();

    //solicita ao BD a execução do script slq e recebe os dados na variavel $select
    $select = mysqli_query($conexao, $sql);

    return $select;
}
?> 