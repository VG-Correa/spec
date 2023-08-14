<?php
    include_once("/wamp64/www/spec/funcoes_php/mensageiro.php");

    global $mensageiro;
    $mensageiro = new Mensageiro();

    function ler_arquivo(String $dir_arquivo): mensagem {

        $arquivo_exists = file_exists($dir_arquivo);
        if (!$arquivo_exists) {
            global $mensageiro;
            return $mensageiro->_Erro("Diretório: ".$dir_arquivo." não foi encontrado", null);
        } else {
            global $mensageiro;

            $arquivo = fopen($dir_arquivo,'r');
            $arquivo_readed = fread($arquivo, filesize($dir_arquivo));
            fclose($arquivo);
            return $mensageiro->_Sucesso("Diretório ".$dir_arquivo." encontrado com sucesso",$arquivo_readed);
        }
 
    }

?>