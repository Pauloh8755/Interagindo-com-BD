<?php
/*******************************************************************
    Objetivo: Responsável por receber, tratar e validar os dados 
    de clientes.
    Data: 15/09/2021
    Responsavel: Paulo Henrique
********************************************************************/

//import de mensagens de erro e configurações
require_once('../functions/config.php');
//import da função inserir clientes
require_once(RAIZ . '/bd/inserirCliente.php');

//verificando qual request foi encaminhado para o form (GET/POST)
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Declarando Variáveis e recebendo valores via POST
    $nome = (String) $_POST['txtNome'];
    $rg = (String) $_POST['txtRg'];
    $cpf = (String) $_POST['txtCpf'];
    $telefone = (String) $_POST['txtTel'];
    $celular = (String) $_POST['txtCelular'];
    $email = (String) $_POST['txtEmail'];
    $obs = (String) $_POST['txtObs'];
    
    //tratamento para campos vazios
    if($nome == null || $rg == null || $cpf == null){
        echo("<script>
                alert('" . ERRO_CAIXA_VAZIA . "') 
                window.history.back()
            </script>");
    }
    //tratamento para quantidade de caracteres (ideal ser feito no front)
    //strlen retorna a quantidade de caracteres de uma variável
    else if(strlen($nome) > 100 || strlen($rg) > 15 || strlen($cpf) > 20){
        echo("<script> 
                alert('". ERRO_MAXLENGTH . "')
                window.history.back()
            </script>");
    }
    else{
        //Criando array para encaminhar dados a função inserir
        $cliente = array (
            "nome" => $nome,
            "rg" => $rg,
            "cpf" => $cpf,
            "telefone" => $telefone,
            "celular" => $celular,
            "email" => $email,
            "obs" => $obs
        );
        //chamando função do arquivo inserirCliente, e encaminha o array com os dados do cliente
        if(insertCliente($cliente)){
            echo("<script>
                    alert('".BD_INSERIDO."')
                    window.location.href = '../index.php';
                </script>");
        }
        else{
            echo("<script>
                    alert('".BD_ERRO."')
                    window.history.back()
                </script>");
        }
    }
}
?>