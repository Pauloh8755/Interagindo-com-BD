<?php
/********************************************************************************
    Objetivo: exibir a instância de um cliente em especifico
    Data: 29/09/2021
    Responsável: Paulo Henrique
*********************************************************************************/
//Importando arquivo de conexão com o banco
require_once("conexaoMysql.php");

//função para exibir uma instancia de um cliente em especifico
function exibirInstanciaCliente($idCliente){
    //recebendo comando mysql em uma variavel
    $sql = "select * from tbl_cliente where id_cliente=" . $idCliente;

    //invocando conexão com o banco
    $conexao = conexaoMysql();

    //Enviando script para o banco através do mysqli_query(conexao e script)
    $selecInstancia = mysqli_query($conexao, $sql);

    return $selecInstancia;
     
}
?>