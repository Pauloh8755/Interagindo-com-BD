<?php
/************************************************************************************
 *  Objetivo: Arqivo responsável por receber os dados de cliente através da api(POST ou PUT)
 *  Data: 24/11/20201
 *  Responsável: Paulo Henrique
 * ********************************************************************************/
require_once("../functions/config.php");
require_once("../bd/inserirCliente.php");
require_once("../bd/atualizarCliente.php");
require_once("../bd/excluiCliente.php");

function inserirClienteAPI($arrayCliente){
    //IMPORTANTE!!! fazer tratamento de dados para consistencia
    if(insertCliente($arrayCliente)){
        return true;
    }
    else{
        return false;
    }
}
//function para atualizar dados  via put
function atualizarClienteAPI($arrayCliente,$idCliente){
    //criando array de id
    $arrayID = array("id" => $idCliente);
    
    $arrayUpdate =  $arrayCliente + $arrayID;
    //IMPORTANTE!!! fazer tratamento de dados para consistencia
    if(updateCliente($arrayUpdate)){
        return true;
    }
    else{
        
        return false;
    }
}

//function para deletar dados através da api
function deletarClienteAPI($idCliente){
    if(delete($idCliente)){
        return true;
    }
    else{
        return false;
    }
}
?>