<?php
/****************************************************************************************
 *  Objetivo: Arquivo para fazer upload de imagens
 *  Data:03/11/2021
 *  Responsável:
 * *************************************************************************************/ 

 function uploadFile($arrayFile){
     //Validadndo se o arquivo existe no array
    if($arrayFile['size'] > 0 &&  $arrayFile['type'] != ""){
        //recebendo tamanho original do arquivo em byte
        $originalSize =(int) $arrayFile['size'];

        //Convertendo tamanho original em KBytes
        $sizeKB =(int) $originalSize / 1024;

        //Recebendo o tipo do arquivo
        $typeFile = (string) $arrayFile['type'];
        
        //validando tamanho do arquivo
        if($sizeKB > TAMANHO_FILE){
            echo("Erro de tamanho de arquivo");
        }
        //validando extensão do arquivo
        //percorrendo array com in_array e verificando se $typeFile está contido nas $extensoesPermitidas
        elseif(!in_array($typeFile, EXTENSION_ALLOWED)){
            echo("Erro tipo de arquivo");
        }
        else{
            //extraindo apenas o nome do arquivo(sem a extensão) com pathinfo
            //pathinfo(variavel, o que deseja extrair)
            $nameFile = (string) pathinfo($arrayFile['name'], PATHINFO_FILENAME);

             //extraindo apenas a extensão do arquivo(sem o nome) com pathinfo
            $extensionFile = (string) pathinfo($arrayFile['name'], PATHINFO_EXTENSION);
            
            //hash(criptografia,senha) -- uniqid gera uma sequencia númerica com base nas configurações de hardware da maquina
            $nameFileEncrypted = (string) hash("md5",$nameFile.uniqid(time()));

            //monta novo nome do arquivo com a extensão
            $foto = (string) $nameFileEncrypted.".".$extensionFile;

            //recebe o nome do arquivo temporario que foi gerado quando o apache recebeu o arquivo do form
            $fileTemp = (string)  $arrayFile['tmp_name'];

            //movendo o arquivo da pasta temporaria do apache para a pasta do servidor que foi criado
            if(move_uploaded_file($fileTemp, RAIZ.DIRETORIO_FILE.$foto)){
                return $foto;
            }
            else{
                echo("ERRO no upload do arquivo");
            }
        }
    }
   
 }
?>