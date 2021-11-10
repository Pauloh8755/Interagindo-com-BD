<?php
/********************************************************************************
 * Objetivo: listar todos os estados
 * Responsável: Paulo Henrique
 * Data: 27/10/2021
 * *****************************************************************************/ 
//import do arquivo de select do cliente
require_once(RAIZ . "/bd/listarEstados.php");

//função para listar os clientes
function exibirEstados(){
    //chamando função que busca os dados no banco e recebe os registros de clientes.
   $dados = selectEstado();

   return $dados;
}
?>