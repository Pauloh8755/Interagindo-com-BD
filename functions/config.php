<?php
/********************************************************************
    Objetivo: arquivo de configuração de variaveis e costantes que 
    serão utilizadas no sistema
    Data: 15/09/2021
    Autor: Paulo Henrique
*********************************************************************/

//Declarando contante para indicar o diretório $_SERVER -> mostra caminho da raiz
define ('RAIZ', $_SERVER['DOCUMENT_ROOT']. '/ds2t20212/paulo1/Interagindo-com-BD/');

//Declarando constantes para conexão com o banco de dados MySql
const BD_SERVER = 'localhost';
const BD_USER = 'root';
const BD_PASSWORD = 'bcd127';
const BD_DATABASE = 'db_contatos_2021_2t';

//Declarando constantes de ERRO
const ERRO_CONEXAO = 'Não foi possivel realizar a conexão com o Banco de Dados, por favor entre em contato com o administrador do sistemas';
const ERRO_CAIXA_VAZIA = 'Não foi possível realizar a operação, pois existem campos obrigatórios a serem preenchidos';
const ERRO_MAXLENGTH = 'Não foi possível realizar a operação, pois a quantidade de caracteres ultrapassou o limite.';

//Declarando constantes de realização do insert e delete
const BD_INSERIDO = 'Registro salvo com sucesso no Banco de Dados!!';
const BD_ERRO = 'ERRO: Não foi possivel manipular os dados no Banco de Dados';
const BD_EXCLUIDO = 'Registro excluído com sucesso!!';

//Declarando constantes para Upload de arquivos
const DIRETORIO_FILE = 'files/';
//recebendo extensões permitidas em uma array
$extensoesPermitidas = array ("image/png","image/jpg","image/jpeg");
//recebendo array em uma contante
define('EXTENSION_ALLOWED', $extensoesPermitidas);
const TAMANHO_FILE = "5120";



?>