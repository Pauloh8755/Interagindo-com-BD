<?php
    //Invocando arquivo de configuração para utilizar constante RAIZ
    require_once("functions/config.php");

    //Importando arquivo de conexão com o banco
    require_once(RAIZ . "bd/conexaoMysql.php");
    conexaoMysql();
    //Importando arquivo para exibir os dados do cliente
    require_once(RAIZ . "controller/exibeDadosCliente.php");
  
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
                            <input type="text" name="txtNome" value="" maxlength="100" placeholder="Digite seu Nome">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> RG: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="" maxlength="15" placeholder="Digite seu RG">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> CPF: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCpf" value="" maxlength="30" placeholder="Digite seu CPF">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Telefone: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtTel" value="" maxlength="13" placeholder="Digite seu Telefone">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Celular: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtCelular"  maxlength="13" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" maxlength="100" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Observações: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtObs" cols="50" rows="7"></textarea>
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
                <?php
                    $dadosClientes = exibirClientes();
                    while ($rsClientes=mysqli_fetch_assoc($dadosClientes)){
                ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsClientes['nome']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['celular']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['email']?></td>
                        <td class="tblColunas registros">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>