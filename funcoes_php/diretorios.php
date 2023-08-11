<?php

    function ler_arquivo(String $dir_arquivo): String {
        $arquivo_exists = file_exists($dir_arquivo);
        if (!$arquivo_exists) {
            return "Erro - Diretório: ".$dir_arquivo." não encontrado!";
        } else {

            $arquivo = fopen($dir_arquivo,'r');
            $arquivo_readed = fread($arquivo, filesize($dir_arquivo));
            fclose($arquivo);
            return $arquivo_readed;
        }
 
    }

?>