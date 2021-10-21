<?php
    //import do arquivo para buscar dados do cliente
    require_once('controller/visualizarDadosClientes.php');
    //recebe o id enviado pelo ajax na index
    $id = $_GET['id'];

    //chamando função para buscar no banco de dados
    $dadosCliente = visualizarCliente($id);
?>
<html>
    <head>
        <title>Visualizar</title>
    </head>
    <body>
        <table class="tblPesquisar">
            <tr>
                <td id="tblTitulo" colspan="5">
                    <h1> Consulta de Dados </h1>
                </td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">Nome:</td>
                <td class="tblColunas registros"><?=$dadosCliente['nome']?></td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">RG:</td>
                <td class="tblColunas registros"><?=$dadosCliente['rg']?></td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">CPF:</td>
                <td class="tblColunas registros"><?=$dadosCliente['cpf']?></td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">Telefone:</td>
                <td class="tblColunas registros"><?=$dadosCliente['telefone']?></td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">Celular:</td>
                <td class="tblColunas registros"><?=$dadosCliente['celular']?></td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">E-mail:</td>
                <td class="tblColunas registros"><?=$dadosCliente['email']?></td>
            </tr>
            <tr class="tblLinhas">
                <td class="tblColunas">Observações:</td>
                <td class="tblColunas registros"><?=$dadosCliente['obs']?></td>
            </tr>
        </table>
    </body>
</html>