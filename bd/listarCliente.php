<?php
/*****************************************************************
    Objetivo: Listar todos os dados de clientes do banco de dados
    Data: 23/09/2021
    Responsavel: Paulo Henrique     
******************************************************************/
//import arquivo de conexão com o banco 
require_once("bd/conexaoMysql.php");

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

?> 