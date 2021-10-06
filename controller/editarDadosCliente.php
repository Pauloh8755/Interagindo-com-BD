<?php
/*********************************************************************
    Objetivo: Editar uma instancia de um cliente através do id
    Data: 06/09/2021
    Responsável: Paulo Henrique
 *********************************************************************/
//importando arquivo de configuração
require_once("../functions/config.php");
//import do arquivo de select do cliente
require_once(RAIZ . "/bd/listarCliente.php");
$idCliente = $_GET['id'];

//chamando função para buscar pelo id do cliente e recebendo select
$dadosCliente = selectInstancia($idCliente);
    /*****************************************************************************
        * convertendo $dadosCliente em array e adiministrando if com fetch
    *****************************************************************************/
    if($rsCliente = mysqli_fetch_assoc($dadosCliente)){
        //Ativa a utilização de variaveis de sessão
        //Variaveis globais
        session_start();
        //criando variavel global de sessão
        $_SESSION['cliente'] = $rsCliente;
        //Similar ao href, permite chamar um arquivo como se fosse um link, através do php
        header('location:../index.php');
    }
    else{
        echo("<script>
            alert('teste')
            window.location.history.back()
        </script>");
    }
 
?>