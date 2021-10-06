<?php
    //ativando utilização de variaveis de sessão
    session_start();

    //Declarando variaveis para o formulário
    $id= (string) null;
    $nome = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $rg = (string) null;
    $cpf = (string) null;
    $email = (string) null;
    $obs = (string) null;

    //Invocando arquivo de configuração para utilizar constante RAIZ
    require_once("functions/config.php");

    //Importando arquivo de conexão com o banco
    require_once(RAIZ . "bd/conexaoMysql.php");
    conexaoMysql();
    //Importando arquivo para exibir os dados do cliente
    require_once(RAIZ . "controller/exibeDadosCliente.php");
  
    //verificando se a variavel de seção existe
    if(isset($_SESSION['cliente'])){
        $id = $_SESSION['cliente']['id_cliente'];
        $nome = $_SESSION['cliente']['nome'];
        $telefone = $_SESSION['cliente']['telefone'];
        $rg = $_SESSION['cliente']['rg'];
        $cpf = $_SESSION['cliente']['cpf'];
        $telefone = $_SESSION['cliente']['telefone'];
        $celular = $_SESSION['cliente']['celular'];
        $email = $_SESSION['cliente']['email'];
        $obs = $_SESSION['cliente']['obs'];

        //Elimina um objeto, variavel da memória
        unset($_SESSION['cliente']);
    }

?>
<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="style/style.css">

    </head>
    <body>   
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Contatos </h1>
            </div>
            <div id="cadastroInformacoes">
        
                <form action="controller/recebeDadosCliente.php" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" maxlength="100" placeholder="Digite seu Nome">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> RG: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="<?=$rg?>" maxlength="15" placeholder="Digite seu RG">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> CPF: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCpf" value="<?=$cpf?>" maxlength="30" placeholder="Digite seu CPF">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTel" value="<?=$telefone?>" maxlength="13" placeholder="Digite seu Telefone">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular"  maxlength="13" value="<?=$celular?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" maxlength="100" value="<?=$email?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"><?=$obs?></textarea>
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                <!-- Exibindo tqabela com os dados dos clientes -->
                <?php
                    $dadosClientes = exibirClientes();
                    // Utilizando fetch_assoc para adiministrar a array
                    while ($rsClientes=mysqli_fetch_assoc($dadosClientes)){
                ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsClientes['nome']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['celular']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['email']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editarDadosCliente.php?id=<?=$rsClientes['id_cliente']?>"> 
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <!-- Encaminhando id para o controller através de um link -->
                            <!-- E confirmando através do evento onclick com a função confirm e return(se True o html executa atarefa solicitada ) -->
                            <a onclick="return confirm('Para excluir clique em OK')" href="controller/excluiDadosCliente.php?id=<?=$rsClientes['id_cliente']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            <!-- Encaminhando id para o controller através de um link  -->
                            <a href="controller/exibirInstanciaCliente.php?id=<?=$rsClientes['id_cliente']?>">
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>