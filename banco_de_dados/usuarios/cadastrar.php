<?php

include("/wamp64/www/spec/banco_de_dados/usuarios/usuarios.php");

echo $nome = $_POST["nome"];
echo $email = $_POST["email"];
echo $senha = $_POST["senha"];

$inserted = Usuarios_Insert($email, $nome, $senha);

var_dump($inserted);

session_start();
$_SESSION["cadastro"] = "Erro";

// header("location: /spec/cadastro.php");

?>