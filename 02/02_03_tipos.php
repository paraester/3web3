<?php
define('CONSTANTE', 'Valor constante');
echo CONSTANTE . "\n\n";

$nada = null;
$booleano = true;
$inteiro = 1;
$inteiro += 3; // soma + 3 e guarda na variável
$real = 3.14;
$aspasDuplas = "$inteiro";
$aspasSimpels = '$inteiro';
echo "Aspas duplas: $aspasDuplas\n";
echo "Aspas simples: $aspasSimpels\n\n";
$nome = "Ada";
$nome .= " Lovelace"; // concatena e guarda na variável
echo "$nome criou a primeira linguagem de programação.\n\n";

$vetor = array(-3.0, 22, 'Michael Jackson');
$vetor = ['desde o PHP 5.4']; // criou um novo array
$vetor[] = 'novo elemento'; // adicionado no final do vetor
echo "Analisando a variável \$vetor: \n";
var_dump($vetor);
echo "\n";

/* Hash ou dicionário
Chaves: int ou string. Valores: qualquer tipo.
*/
$hash = [
    1 => 1.23,
    'chave' => 'valor',
    'delete-me' => 0,
];
unset($hash['delete-me']);
$hash['segredo'] = 'PHP é fácil'; // adicionado na posição específica
echo "Analisando a variável \$hash: \n";
var_dump($hash);
echo "\n";

$vetorEstado = [
    'SP' => ['Campinas', 'São Paulo'],
    'PR' => ['Guarapuava', 'Curitiba']
];
echo "Várias dimensões: " . $vetorEstado['PR'][0] . "\n";
echo "Várias dimensões: {$vetorEstado['PR'][0]}\n";
echo "O print_r imprime um vetor: \n";
print_r($vetorEstado);
