<?php
/*********************************************************************
    Objetivo: Exluir uma instancia de um cliente através do id
    Data: 29/09/2021
    Responsável: Paulo Henrique
 *********************************************************************/
//importando arquivo de configuração
require_once("../functions/config.php");
//Importando arquivo com script de esclusão
require_once(RAIZ . "/bd/excluiCliente.php");

    /*****************************************************************************
        * invocando função para deletar uma instancia do cliente
        * com o id sendo encaminhado pela index através do link contido no botão exluir
        * e validando se ela foi bem sucedida.
    *****************************************************************************/
    //resgatando parametros passados via get
    $idCliente = $_GET['id'];
    $fotoName = $_GET['foto'];

    //invocando função e testando return a fim de tratamentos de mensagens
    if(delete($idCliente)){
        //apagando foto do usuario ao exluir instancia no bd
        unlink(RAIZ.DIRETORIO_FILE.$fotoName);
        echo("<script>
                    alert('".BD_EXCLUIDO."')
                    window.location.href = '../index.php';
            </script>");
    }
    else{
        echo("<script>
            alert('".BD_ERRO."')
            window.location.history.back()
        </script>");
    }
 
?>