<?php

    include_once("/XAMP/htdocs/spec/funcoes_php/diretorios.php");
    
    /**
     * Faz a leitura do banco de dados que contém todos os usuários do sistema
     * Retorna uma lista com os dados do usuário em cada linha
     * Em caso de Erro, retorna array 
     */
    function Usuarios_readBD(): array {

        $arquivo = ler_arquivo('usuarios.txt');

        if (str_starts_with($arquivo,"Erro")) {
            return ["Status"=>"Erro","Mensagem"=>"Não foi possível localizar o diretório usuarios.txt"];
        } else {
                        
            $arquivo = str_getcsv($arquivo,separator: "\n");
            
            foreach ($arquivo as $index => $linha) {

                $arquivo[$index] = str_getcsv($arquivo[$index],',');
                
            }
            
            $arquivo = array_slice($arquivo,1);
            $quantidade_valores = array_key_last($arquivo)+1;


            return   ["Status"=>"OK", "Quantidade_valores"=>$quantidade_valores, "Valores"=>$arquivo];
        }

    }

    function Usuarios_get_UserByID(String $id): Array{
        
        $usuarios = Usuarios_readBD()["Valores"];
        $user_find = [];

        foreach ($usuarios as $usuario) {
            // echo $id;
            echo $usuario[0]."<br>" == $id;
            
            if ($usuario[0] == $id) {
                $user_find = $usuario;
            }

        }

        if ($user_find) {
            return ["Status"=>"OK", "Mensagem"=>"Usuario localizado", "Valores"=>$usuario];   
        } else {
            return ["Status"=>null,"Mensagem"=>"Usuario não localizado", "Valores"=>null];
        }
    }

    $user = Usuarios_get_UserByID(0);
    var_dump($user);

?>