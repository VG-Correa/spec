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
            return $mensageiro->_Sucesso("Arquivo do diretório ".$dir_arquivo." encontrado com sucesso",$arquivo);
        }
    }

    function Transform_Arquivo_to_String($arquivo="", $dir_arquivo=""): mensagem { 
        global $mensageiro;

        if ($arquivo and $dir_arquivo) {

            $arquivo_readed = fread($arquivo, filesize($dir_arquivo));
            fclose($arquivo);
            return $mensageiro->_Sucesso("Diretório ".$dir_arquivo." encontrado com sucesso",$arquivo_readed);
        
        } else if ($arquivo and !$dir_arquivo) {
            return $mensageiro->_Erro("Diretório não atribuido!", null);

        } else if (!$arquivo and $dir_arquivo) {
            $arquivo = ler_arquivo($dir_arquivo);

            if ($arquivo->get_status() == "Sucesso") {
                
                $arquivo_readed = fread($arquivo->get_objeto(), filesize($dir_arquivo));
                fclose($arquivo->get_objeto());
                return $mensageiro->_Sucesso("Diretório ".$dir_arquivo." encontrado com sucesso",$arquivo_readed);
                
            } else {
                return $mensageiro->_Erro("Arquivo não foi localizado no diretório: $dir_arquivo", null);
            }

        } else if (!$arquivo and !$dir_arquivo) {

            return $mensageiro->_Erro("Critérios não atribuidos!!", null);

        } else {
            return $mensageiro->_Erro("Erro inesperado", null);
        }
    }
 

    function Inserir_novo_usuario(Array $usuarios) {




    }

?>