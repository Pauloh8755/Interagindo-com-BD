<?php
/************************************************************************************
 *  Objetivo: Arqivo responsável por receber os dados de cliente através da api(POST ou PUT)
 *  Data: 24/11/20201
 *  Responsável: Paulo Henrique
 * ********************************************************************************/
require_once("../functions/config.php");
require_once("../bd/inserirCliente.php");

function inserirClienteAPI($arrayCliente){
    //IMPORTANTE!!! fazer tratamento de dados para consistencia
    if(insertCliente($arrayCliente)){
        return true;
    }
    else{
        return false;
    }
}
?>