<?php
/*************************************************************************
*  Objetivo: Arquivo responsável por buscar e exibir um registro na modal 
*  Data: 21/10/2021
*  Responsável: Paulo Henrique
*************************************************************************/   
     
function visualizarCliente ($id){
    //importando arquivo de configuração
    require_once("functions/config.php");
    //import do arquivo de select do cliente
    require_once(RAIZ . "/bd/listarCliente.php");
    //recebendo id via Argumento
    $idCliente = $id;

    //chamando função para buscar pelo id do cliente e recebendo select
    $dadosCliente = selectInstancia($idCliente);
    /*****************************************************************************
        * convertendo $dadosCliente em array e adiministrando if com fetch
    *****************************************************************************/
    if($rsCliente = mysqli_fetch_assoc($dadosCliente)){
        return $rsCliente;
    }
    else {
        return false;
    }
}
?>