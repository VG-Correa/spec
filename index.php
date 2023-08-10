<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "funcoes_php/diretorios.php";
    echo "Hello World!<br>";
    $usuarios = ler_arquivo(get_usuariosDirBd());
    echo $usuarios;
?>
</body>
</html>
