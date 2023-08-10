<?php

    function ler_arquivo($dir_arquivo) {
        $arquivo_exists = file_exists($dir_arquivo);

        if (!$arquivo_exists) {
            return "Diretório ".$dir_arquivo." não encontrado!";
        } else {

            $arquivo = fopen($dir_arquivo,'r');
            $arquivo_readed = fread($arquivo, filesize($dir_arquivo));
            fclose($arquivo);
            return $arquivo_readed;
        }

    }

    function get_usuariosDirBd() {
        return "banco_de_dados/usuarios/usuarios.txt";
    }


?>