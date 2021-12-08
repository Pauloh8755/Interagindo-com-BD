<?php
/*****************************************************************
    Objetivo: buscar ou listar os dados de clientes, solicitando ao 
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
//função para buscar clientes através do nome
function buscarClientesPeloNome($nome){
    $dados = selectClienteNome($nome);
    return $dados;
}
//função para tranformar um objeto em uma array
function criarArray($objeto){
    $count = (int) 0;
    //estrutura re repetição para converter objeto de dados em um array
    while($rsDados = mysqli_fetch_assoc($objeto)){
        $arrayDados[$count] = array(
            "id"        => $rsDados['id_cliente'],
            "nome"      => $rsDados['nome'],
            "rg"        => $rsDados['rg'],
            "cpf"       => $rsDados['cpf'],
            "telefone"  => $rsDados['telefone'],
            "celular"   => $rsDados['celular'],
            "email"     => $rsDados['email'],
            "obs"       => $rsDados['obs'],
            "id_estado" => $rsDados['id_estado'],
            "estado"    => $rsDados['sigla'],
            "foto"      => $rsDados['foto']
        );
        $count ++;
    }
    if(isset($arrayDados)){
        return $arrayDados;
    }
    else{
        return false;
    }
}

//funcção para gerar json com base em um array de dados
function criarJson($array){
    //especificando no cabeçalho do PHP que será gerado o json
    header("content-type:application/json");

    //Converte um array em json
    $listJSON = json_encode($array);
    /*
        json_enconde() Converte um array em 
        json_decode() Converte um jSON em formato array
    */
    if(isset($listJSON)){
        return $listJSON;
    }
    else{
        return false;
    }
}

?>