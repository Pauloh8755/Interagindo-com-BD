<?php
/*********************************************************************
    Objetivo: Exibir a instancia de um cliente especifico
    Data: 29/09/2021
    Responsável: Paulo Henrique
 ********************************************************************/
//importando arquivo do script para exibir
require_once("../bd/exibeCliente.php");
//função para exibir todos os dados do cliente
function exibirCliente(){
    //recebendo instancia em uma variavel
    $instancia = exibirInstanciaCliente($idCliente = $_GET['id']);

    return $instancia;
}
?>