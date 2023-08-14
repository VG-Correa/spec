<?php

    // include_once("/XAMP/htdocs/spec/funcoes_php/diretorios.php");
    include_once("/wamp64/www/spec/funcoes_php/diretorios.php");
    include_once("/wamp64/www/spec/banco_de_dados/usuarios/Usuario_class.php");
    include_once("/wamp64/www/spec/funcoes_php/mensageiro.php");

    global $mensageiro;
    $mensageiro = new Mensageiro();

    /**
     * Faz a leitura do banco de dados que contém todos os usuários do sistema
     * Retorna uma lista com os dados do usuário em cada linha
     * Em caso de Erro, retorna array
     */
    function Usuarios_readBD(): mensagem {

        $arquivo = ler_arquivo('usuarios.txt')->objeto;

        if (str_starts_with($arquivo,"Erro")) {
            global $mensageiro;
            return $mensageiro->_Erro("Não foi possível localizar o diretório usuarios.txt",null);
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

    function Usuarios_get_UserByID(String $id): mensagem {


        $usuarios = Usuarios_readBD()["Valores"];
        $user_find = [];

        foreach ($usuarios as $usuario) {

            if ($usuario[0] == $id) {
                $user_find = $usuario;
            }

        }



        if ($user_find) {
            $user_find = new Usuario($user_find[0],$user_find[1],$user_find[2],$user_find[3],$user_find[4]);

            global $mensageiro;
            $mensageiro->_Sucesso("Usuario encontrado", null);

            return $mensageiro->_Sucesso("Usuario encontrado",$user_find);
        } else {
            global $mensageiro;
            $user_find = null;
            return $mensageiro->_Erro("Usuario não encontrado", $user_find);
        }
    }

    function Logar(String $email, String $senha, String $nome=''): Usuario {
        $usuarios = Usuarios_readBD();

        foreach ($usuarios["Valores"] as $usuario) {

            if (($usuario[2] == $email || $usuario[1] == $nome) && $usuario[3] == $senha) {
                $user_localizado = Usuarios_get_UserByID($usuario[0]);

                return $user_localizado->get_objeto();
            }
        }

        $usuario = new Usuario('','','','','');
        return  $usuario;

    }

    $user = Logar('teste@teste.caom', "123@", 'Victor');
    $user->toggle_logado();

    echo $user->get_nome();
    echo "<hr>";
    echo $user->get_email();
    echo "<hr>";
    echo $user->get_senha();
    echo "<hr>";
    echo $user->get_status();
    echo "<hr>";
    echo var_dump($user->get_logado());
    echo "<hr>";

?>