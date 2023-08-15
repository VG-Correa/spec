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

        $arquivo = Transform_Arquivo_to_String(ler_arquivo('usuarios.txt')->get_objeto());
        
        if ($arquivo->get_status() == "Erro") {
            global $mensageiro;
            return $mensageiro->_Erro("Não foi possível localizar o diretório usuarios.txt",null);
        } else {
            $arquivo = $arquivo->get_objeto();

            $arquivo = str_getcsv($arquivo,separator: "\n");

            foreach ($arquivo as $index => $linha) {

                $arquivo[$index] = str_getcsv($arquivo[$index],',');

            }

            $arquivo = array_slice($arquivo,1);
            $quantidade_valores = array_key_last($arquivo)+1;

            global $mensageiro;
            return $mensageiro->_Sucesso("Banco de dados localizado! valores encontrados: ".$quantidade_valores,$arquivo);
        }

    }

    function Usuarios_ultimoID(): mensagem {
        $usuarios = Usuarios_readBD();

        if ($usuarios->get_status() == "Sucesso") {

            $ultimo_user = array_key_last($usuarios->get_objeto());
            $ultimo_id = (int) $usuarios->get_objeto()[$ultimo_user][0];

            global $mensageiro;


            return $mensageiro->_Sucesso("Último Id localizado", $ultimo_id);

        } else {
            global $mensageiro;

            return $mensageiro->_Erro("Erro ao ler banco de dados do usuário", null); 
        }


    }

    function Usuarios_get_UserByID(String $id): mensagem {


        $usuarios = Usuarios_readBD()->get_objeto();
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

    /**
     * Recebe email, senha e nome de usuário para logar
     * Ele tentará logar com Email e Senha ou Nome e Senha
     * Retornará uma mensagem com o objeto de usuário com status logado = false
     * usado apenas para autenticar as credenciais e não para logar!
     */
    function Autenticar(String $email, String $senha, String $nome=''): mensagem {
        $usuarios = Usuarios_readBD();
        
        if ($usuarios->get_status() == "Sucesso") {
            
            $usuarios = $usuarios->get_objeto();

            foreach ($usuarios as $usuario) {

                if (($usuario[2] == $email || $usuario[1] == $nome) && $usuario[3] == $senha) {
                    $user_localizado = Usuarios_get_UserByID($usuario[0]);

                    global $mensageiro;
                    return $mensageiro->_Sucesso("Usuário ".$usuario[1]." localizado", $user_localizado->get_objeto());
                }
            }

            global $mensageiro;
            return  $mensageiro->_Erro("Usuário não autenticado! Credenciais incorretas", null);
        } else {
            global $mensageiro;
            return $mensageiro->_Erro("Erro de acesso do banco de dados de usuários", null);
        }

    }

    function Usuarios_Insert(String $email, String $nome, String $senha) {

        $novo_id = Usuarios_ultimoID();

        if ($novo_id->get_status() == "Sucesso") {

            $usuarios = Usuarios_readBD()->get_objeto();
            var_dump($usuarios);


        }

        // $novo_usuario = new Usuario();

    }

    Usuarios_Insert("teste3@teste.com", "Corrêa", "123@");

?>