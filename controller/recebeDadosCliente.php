<?php
/*******************************************************************
    Objetivo: Responsável por receber, tratar e validar os dados 
    de clientes.
    Data: 15/09/2021
    Responsavel: Paulo Henrique
********************************************************************/

//verificando request POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Declarando Variáveis
    $nome = (String) $_POST['txtNome'];
    $rg = (String) $_POST['txtRG'];
    $cpf = (String) $_POST['txtCPF'];
    $telefone = (String) $_POST['txtTel'];
    $celular = (String) $_POST['txtCelular'];
    $email = (String) $_POST['txtEmail'];
    $obs = (String) $_POST['txtObs'];
    
    echo($nome . $rg . $cpf . $telefone . $celular . $email . $obs);
}
?>