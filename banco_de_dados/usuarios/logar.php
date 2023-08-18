<?php 
    include("/wamp64/www/spec/banco_de_dados/usuarios/usuarios.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    echo "<br>Email: ".$email;
    echo "<br>Senha: ".$senha;

    $user = Autenticar($email, $senha);
    echo '<br>Status: '.$user->get_status();

    // die("<br>Teste");

    if ($user->get_status() == "Sucesso") {
        header("location: /spec/pagina_inicial.php");
    } else {
        header("location: /spec/index.php"); 
    }

?>
