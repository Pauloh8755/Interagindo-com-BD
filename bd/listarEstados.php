<?php
/*****************************************************************
    Objetivo: Listar todos os dados de Estados do banco de dados
    Data: 27/10/2021
    Responsavel: Paulo Henrique     
******************************************************************/
//import arquivo de conexão com o banco 
require_once(RAIZ . "bd/conexaoMysql.php");
//Retorna todos os registros existentes no banco
function selectEstado(){
    //recebendo comando slq. Utilizamos order by para ordenar esse select
    //                             ordernar por id do cliente decrescente                    
    $sql = "select * from tbl_estado order by nome";

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //solicita ao BD a execução do script sql e recebe os dados na variavel $select
    $select = mysqli_query($conexao, $sql);

    return $select;
}
?> 