<?php
    //ativando utilização de variaveis de sessão
    session_start();

    //Declarando variaveis para o formulário
    $id= (string) null;
    $nome = (string) null;
    $estado = (String) null;
    $telefone = (string) null;
    $celular = (string) null;
    $rg = (string) null;
    $cpf = (string) null;
    $email = (string) null;
    $obs = (string) null;
    $foto= (string) null;

    //Será utilizada para definir o modo de manipulação dos dados
    //Salvar -> Insert
    //Atualizar -> Update
    $modo = (string) "Salvar";

    //Invocando arquivo de configuração para utilizar constante RAIZ
    require_once("functions/config.php");

    //Importando arquivo de conexão com o banco
    require_once(RAIZ . "bd/conexaoMysql.php");
    conexaoMysql();
    //Importando arquivo para exibir os dados do cliente
    require_once(RAIZ . "controller/exibeDadosCliente.php");

    //Importando arquivo para listar estados
    require_once(RAIZ . "controller/listarDadosEstado.php");
  
    //verificando se a variavel de seção existe
    if(isset($_SESSION['cliente'])){
        $id = $_SESSION['cliente']['id_cliente'];
        $nome = $_SESSION['cliente']['nome'];
        $estado = $_SESSION['cliente']['id_estado'];
        $telefone = $_SESSION['cliente']['telefone'];
        $rg = $_SESSION['cliente']['rg'];
        $cpf = $_SESSION['cliente']['cpf'];
        $telefone = $_SESSION['cliente']['telefone'];
        $celular = $_SESSION['cliente']['celular'];
        $email = $_SESSION['cliente']['email'];
        //recebendo foto de preview
        $foto = $_SESSION['cliente']['foto'];
        $obs = $_SESSION['cliente']['obs'];

        $modo = "Atualizar";
        //Elimina um objeto, variavel da memória
        unset($_SESSION['cliente']);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("#container-modal").css('display', 'none');
                $("#fechar").css('display', 'none');

                // Abre Modal
                $(".pesquisar").click(function(){
                     // recebendo id do html- trabalhamos com this para referenciar elemento clicado
                     let idCliente = $(this).data('id');
                        //Realiza uma requisição para consumir dados de otra pagina
                        $.ajax({
                            type: "GET", //Tipo de requisição (GET, POST,PUT, etc)
                            url: "visualizarDados.php", //URL dapágina que sera consumida
                            data: {id: idCliente},

                            //se a requisição der certo, recebemos conteúdo na variavel dados
                            success: function(dados){ 
                                $(".modal-contato").html(dados)//exibe dentro da div modal
                            }
                        });

                    $("#container-modal").fadeIn(400).ready(function(){
                        $(".modal-contato").slideToggle(700);
                        $("#fechar").slideToggle(700);
                        
                       
                    });
                });
                // Fecha Modal
                $("#fechar").click(function(){
                    $('.modal-contato').fadeOut(400);
                    $("#container-modal").fadeOut(400);
                    $("#fechar").fadeOut(400);
                    
                });
            });
        </script>
    </head>
    <body>
        <div id="container-modal">
            
            <div class="modal-contato">

            </div>
            <span id="fechar">
                X
            </span>
        </div>   
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Contatos </h1>
            </div>
            <div id="cadastroInformacoes">
                <!-- 
                    Passando variaveis modo e id por get, sendo id para identificar o registro a ser atualizado 
                    * e modo para identificar a ação de manipulção de dados que sera executada(insert ou update) 
                -->
                <form enctype="multipart/form-data" action="controller/recebeDadosCliente.php?modo=<?=$modo?>&id=<?=$id?>&foto=<?=$foto?>" name="frmCadastro" method="post" >
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
                            <label> Foto: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <!-- Input para envios de arquivos -->
                            <input type="file" name="fileFoto" accept="image/jpeg,image/png,image/jpg">
                            
                        </div>
                        <!-- container para foto de preview -->
                        <div class="container-foto">
                            <img src="files/<?=$foto?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Estado: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <select name="selectEstado">
                                <option value="">Selecione seu Estado</option>
                                <?php
                                    $dadosEstado = exibirEstados();
                                    // echo("</select>" . $estado);
                                    while($rsEstado = mysqli_fetch_assoc($dadosEstado)){
                                        
                                ?>
                                <option value="<?=$rsEstado['id_estado']?>"<?=$rsEstado['id_estado'] == $estado?'selected' : ''?>><?=$rsEstado['nome']?></option>
                                <?php
                                    }
                                ?>
                                <!-- <option selected>Teste</option> OBS: precisamos colocar enctype="multipart/form-data" -->
                            </select>
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
                            <input type="submit" name="btnEnviar" value="<?=$modo?>">
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
                    <td class="tblColunas destaque"> Foto </td>
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
                        <td class="tblColunas registros"><img class="img-perfil"src="files/<?=$rsClientes['foto']?>"></td>
                        <td class="tblColunas registros"><?=$rsClientes['celular']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['email']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editarDadosCliente.php?id=<?=$rsClientes['id_cliente']?>"> 
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <!-- Encaminhando id e nome da imagem do cliente para o controller através de um link  -->
                            <!-- E confirmando através do evento onclick com a função confirm e return(se True o html executa atarefa solicitada ) -->
                            <a onclick="return confirm('Para excluir clique em OK')" href="controller/excluiDadosCliente.php?id=<?=$rsClientes['id_cliente']?>&foto=<?=$rsClientes['foto']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            <!-- Encaminhando id para o controller através de um link  -->
                            <!-- <a href="controller/exibirInstanciaCliente.php?id=<?=$rsClientes['id_cliente']?>"> -->
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar" data-id="<?=$rsClientes['id_cliente']?>">
                            <!-- </a> -->
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>