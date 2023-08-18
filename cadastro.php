<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>FORMULÁRIO DE CADASTRO - DESENVOLVIMENTO WEB</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
<body>
    <div>
        <h1 style="text-align: center;">CADASTRO</h1>
    </div>
    <hr>
    <div style="display: flex; justify-content: center;">
    <div class="container" style="min-width: 300px; max-width: 500px;  border-style: solid; border-color: black;">
        <form method="POST" action="banco_de_dados/usuarios/cadastrar.php" >
            <br>
            <input style="width: 80%; margin-left: 10%;" type="text" name="nome" id="nome" placeholder="Insira o Nome"><br>
            <input style="width: 80%; margin-left: 10%;" type="text" name="email" id="email" placeholder="Insira o Email">

            <h3 style="text-align: center; ">Confirmação de senha</h3>
            <input style="width: 80%; margin-left: 10%;" type="password" name="senha" id="senha" placeholder="Insira sua senha"><br>
            <input style="width: 80%; margin-left: 10%;" type="password" name="senha2" id="senha2" placeholder="Confirme a senha"><br>
            <br>
            <?php
                session_start();
                
                try{

                    if ($_SESSION['cadastro'] == "Erro") {
                        echo "<tr><label>Email já cadastrado...</label>";
                    }
                    
                    $_SESSION['cadastro'] = "pendente";
                } catch (Exception) {
                    $_SESSION['cadastro'] = "pendente";
                }
                
            ?>
            <button type="submit" value = "Enviar" class="button">ENVIAR</button>
            <button type="button" class="button" onclick=voltar()>VOLTAR</button>
        </form>
        <br>
    </div>
    </div>
    <hr>

    <div class="Container" id="message" name="message" style="text-align: center;">

    </div>

</body>

<script>

    function voltar() {
        window.location.href = "index.html";
    }

</script>

</html>