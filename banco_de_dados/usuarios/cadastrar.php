<?php

include("/wamp64/www/spec/banco_de_dados/usuarios/usuarios.php");

echo $nome = $_POST["nome"]."<br>";
echo $email = $_POST["email"]."<br>";
echo $senha = $_POST["senha"]."<br>";

$inserted = Usuarios_Insert($email, $nome, $senha);

var_dump($inserted);

session_start();
$_SESSION["cadastro"] = "Erro";

// header("location: /spec/cadastro.php");

?>