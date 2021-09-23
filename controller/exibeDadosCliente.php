<?php
/*****************************************************************
    Objetivo: buscar ou listaros dados de clientes, solicitando ao 
    banco de dados.
    Data: 23/09/2021
    Responsavel: Paulo Henrique     
******************************************************************/

//import do arquivo de select do cliente
require_once(RAIZ . "/bd/listarCliente.php");

//função para listar os clientes
function exibirClientes(){
    //chamando função que busca os dados no banco e recebe os registros de clientes.
   $dados = selectCliente();

   return $dados;
}
?>

