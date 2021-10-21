<?php 
/********************************************************************
    Objetivo: Atualizar dados do cliente no banco de dados
    Data: 13/10/2021
    Autor: Paulo Henrique
*********************************************************************/
// require do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

//function para atualizae dados do cliente
function updateCliente($arrayCliente){
    $slq = "update tbl_cliente set 
                nome ='".$arrayCliente['nome']."',
                rg = '".$arrayCliente['rg']."',
                cpf = '".$arrayCliente['cpf']."',
                telefone = '".$arrayCliente['telefone']."',
                celular = '".$arrayCliente['celular']."',
                email = '".$arrayCliente['email']."',
                obs = '".$arrayCliente['obs']."' 
            
            where id_cliente =". $arrayCliente['id'];
     
    //chamando conexão com o banco
    $conexao = conexaoMysql();

    //Enviando script slq para o BD (retorna true ou false)
    if(mysqli_query($conexao, $slq)){
        return true;
    }
    else{
        return false;
    }
}
?>