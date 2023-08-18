<?php

$var1 = readline("Digite o primeiro valor");
$var2 = readline("Digite o segundo valor");

if ($var1 + $var2 == 5) {

    echo "$var1 + $var2 é igual a 5";

} else {
    echo "$var1 + $var2 é diferente de 5";
}

?>

<?php

$nome = readline("Digite seu nome: ");

if ($nome == "Victor") {
    echo "O nome é igual a Victor";
} else {
    echo "O nome está errado!";
}

?>

<?php

$numero = readline("Digite o valor: ");

if ($numero > 10) {
    echo 'A variável $numero é maior que 10';
} else if ($numero > 7 and $numero < 10) {
    echo 'A variável $numero é maior que 7';
} else if ($numero >= 5 and $numero < 7) {
    echo 'A variável $numero é maior ou igual a 5';
} else if ($numero >= 3 and $numero < 5) {
    echo 'A variável $numero é maior ou igual a 3';
} else {
    echo "A variável é $numero e possui um valor diferente das cond~ções anteriores";
}


?>