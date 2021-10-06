<?php
/***************************************************************************
    Objetivo: Ecluir dados dos clientes no banco de dados
    Data: 29/09/2021
    Responsável: Paulo Henirque
****************************************************************************/
//Importando arquivo  de conexão do banco
require_once(RAIZ . "bd/conexaoMysql.php");

//função para inserir script de exclusão de dados 
function delete($idCliente){
    //Recebendo script para excluir cliente através do id
    $sql = "delete from tbl_cliente where id_cliente =". $idCliente;
    
    //invocando conexão com o banco
    $conexao = conexaoMysql();

    //Enviando script para o banco através do mysqli_query(conexao e script)
    //E testando se a operação foi realizada com sucesso.
    if(mysqli_query($conexao,$sql)){
        return true;
    }
    else{
        return false;
    }
}
?>