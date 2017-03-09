
<?php
$a = 1;
$b = 1;
if ($a > $b) {
    echo "a é maior que b\n\n";
} elseif ($a < $b) {
    echo "a é menor que b\n\n";
} else {
    echo "a e b são iguais\n\n";
}

$a = 0;
$b = false;
if ($a == $b) {
    echo "São iguais, pois o == não compara tipos.\n";
}
if ($a === $b) {
    echo 'Nunca vai rodar.';
} else {
    echo "São diferentes, pois o operador === compara tipos.\n\n";
}

$condicao = true;
// os parênteses não são necessários
echo ($condicao ? "condição verdadeira\n\n" : "condição falsa\n\n");

$a = 1;
while ($a < 10) {
    $a++;
}
echo "a depois do while vale $a\n\n";

for ($a = 0; $a < 3; $a++) {
    echo "Valor do laço for: $a\n";
}
echo "\n";

while (true) {
    break;
}
echo "Saiu do while (true)\n\n";

for ($a = 0; $a < 3; $a++) {
    if ($a == 0) {
        continue;
    }
    echo "Valor do laço for com continue: $a\n";
}
echo "\n";

$vetor = ['uva', 'maçã'];
foreach ($vetor as $elemento) {
    echo "foreach 1: $elemento\n";
}
foreach ($vetor as $chave => $valor) {
    echo "foreach 2: $chave , $valor\n";
}
echo "\n";


?>
