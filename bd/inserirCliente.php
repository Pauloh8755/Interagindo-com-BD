<?php
/********************************************************************
    Objetivo: Inserir dados do cliente no banco de dados
    Data: 16/09/2021
    Autor: Paulo Henrique
*********************************************************************/
// require do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

//function para inserir dados do cliente
function insertCliente($arrayCliente){
    $sql = "insert into tbl_cliente(
                nome,
                rg, 
                cpf,
                telefone,
                celular,
                email,
                obs
            )
            values('". $arrayCliente['nome']."',
                    '".$arrayCliente['rg']."',
                    '".$arrayCliente['cpf']."',
                    '".$arrayCliente['telefone']."',
                    '".$arrayCliente['celular']."',
                    '".$arrayCliente['email']."',
                    '".$arrayCliente['obs']."'
            )";
    //chamando fiunção que estabelece a conexão com o BD
    $conexao = conexaoMysql();
    
    //envia o script slq para o BD
    mysqli_query($conexao, $sql);
}

?>