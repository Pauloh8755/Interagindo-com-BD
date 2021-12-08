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
    $sql = "select tbl_cliente.*, tbl_estado.sigla from tbl_cliente inner join tbl_estado on tbl_estado.id_estado = tbl_cliente.id_estado order by id_cliente desc";

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //solicita ao BD a execução do script sql e recebe os dados na variavel $select
    $select = mysqli_query($conexao, $sql);

    return $select;
}

//retorna apenas uma instancia, com base no id
function selectInstancia($idCliente){
    //recebendo comamdo slq  para buscar cliente pelo id
    $sql = "select tbl_cliente.*, tbl_estado.sigla from tbl_cliente inner join tbl_estado on tbl_estado.id_estado = tbl_cliente.id_estado where tbl_cliente.id_cliente =" .$idCliente;
    //abindo conexão
    $conexao = conexaoMysql();

    //solicita ao BD a execução do script slq e recebe os dados na variavel $select
    $select = mysqli_query($conexao, $sql);

    return $select;
}
//função para buscar clientes através do nome
function selectClienteNome($nome){
    $sql = "select tbl_cliente.*, tbl_estado.sigla from tbl_cliente inner join tbl_estado on tbl_estado.id_estado = tbl_cliente.id_estado where tbl_cliente.nome like '%".$nome."%'";

    $conexao = conexaoMysql();

    if($select = mysqli_query($conexao, $sql)){
        return $select;
    }
    else{
        return false;
    }

}
?> 