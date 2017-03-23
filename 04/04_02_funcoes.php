<?php
ini_set('error_reporting', E_ALL);

// ======= array =======
$array = ['a', 'b', 'c'];
$tamanho = count($array);
echo "Array de tamanho: $tamanho\n\n";

$indice = 0;
$quantidade = 2;
$valor = 'PHP';
$array = array_fill($indice, $quantidade, $valor);
print_r($array);
echo "\n";

$array = [1,2,3,4,5,6];
$array = array_filter($array, function ($valor) {
    return $valor > 4;
});
// $isMaiorQueQuatro = function ($valor) {
//     return $valor > 4;
// };
// $array = array_filter($array, $isMaiorQueQuatro);
print_r($array);
echo "\n";

$array = [
    'nome' => 'Grace Hopper', // fez o primeiro compilador
    'títulação' => 'Phd',
    'formação' => 'matemática',
];
$resultado = array_key_exists('nome', $array) ? 'SIM' : 'NÃO';
echo "A chave 'nome' existe? $resultado.\n\n";

print_r(array_keys($array));
echo "\n";

$array = [1,2,3];
$array = array_map(function ($valor) {
    return $valor * 10;
}, $array);
print_r($array);
echo "\n";

// ======= classes =======
class Pessoa
{
}
class Aluno extends Pessoa
{
}
$pessoa = new Pessoa();
$classe = get_class($pessoa);
echo "Classe: $classe\n\n";

$aluno = new Aluno();
$resultado1 = $aluno instanceof Pessoa ? 'SIM' : 'NÃO';
$resultado2 = $aluno instanceof Aluno ? 'SIM' : 'NÃO';
$resultado3 = is_a($aluno, 'Pessoa') ? 'SIM' : 'NÃO';
$resultado4 = is_a($aluno, 'Aluno') ? 'SIM' : 'NÃO';
echo "\$aluno instanceof Pessoa? $resultado1\n";
echo "\$aluno instanceof Aluno? $resultado2\n";
echo "\$aluno is_a Pessoa? $resultado3\n";
echo "\$aluno is_a Aluno? $resultado4\n\n";

// ======= tempo =======
$agora = new DateTime(); // sem fuso-horário
$tempoFormatado = $agora->format('H:i:s d/m/Y');
echo "Data de agora: $tempoFormatado\n\n";

$fusoHorario = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime('now', $fusoHorario); // com fuso-horário
$tempoFormatado = $agora->format('H:i:s d/m/Y');
echo "Data de agora: $tempoFormatado\n\n";

$doisDiasEUmaHora = new DateInterval('P2DT1H');
$futuro = $agora->add($doisDiasEUmaHora);
$tempoFormatado = $futuro->format('H:i:s d/m/Y');
echo "Data do futuro: $tempoFormatado\n\n";

// ======= diretório =======
print_r(scandir('.'));
echo "\n";

// ======= arquivos =======
$resultado = file_put_contents('exemplo.txt', "Escrevi com PHP!\n");
// retorna um inteiro ou false
if ($resultado === false) {
    echo "Ocorreu um problema ao gravar o arquivo. Verifique as permissões de escrita da pasta.\n\n";
} else {
    echo "Escrevi no arquivo: 'exemplo.txt'\n\n";
}

$conteudo = file_get_contents('02_01_hello_world.php');
echo "$conteudo\n";

// ======= diversos =======
// executa um código passado como string
// evita usar, pois pode causar uma falha de segurança
eval('$variavelSecreta = 300;');
echo "Valor da variável secreta: $variavelSecreta.\n\n";

// Termina a execução. Os comandos são todos iguais.
// exit;
// exit();
// exit(0);

// ======= expressão regular =======
// Estudem expressões regulares em casa, pois será útil na vida profissional.
$formatoEmail = '/^\w+@\w+(\.\w+)+$/i';
$texto = 'exemplo@utfpr.edu.br';
$resultado = preg_match($formatoEmail, $texto);
if ($resultado === 1) {
    echo "O formato do email é válido: $texto.\n\n";
} else {
    echo "Formato inválido.\n\n";
}

// ======= texto =======
$asciiValor = chr(97);
echo "A posição 97 na tabela ASCII vale: $asciiValor.\n";
$asciiIndice = ord('Z');
echo "A letra 'Z' está na posição $asciiIndice da tabela ASCII.\n\n";

$texto = 'azul amarelo verde';
$array = explode(' ', $texto);
print_r($array);
echo "\n";

$novoTexto = implode(' - ', $array); // join
echo "$novoTexto.\n\n";

$comprimento = strlen('0123456789');
echo "Comprimento do texto: $comprimento.\n\n";

$texto = 'aprender';
$inicio = 1;
$pedacoDoTexto = substr($texto, $inicio); // pega até o final
// $pedacoDoTexto = substr($texto, $inicio, $tamanho);
echo "$pedacoDoTexto\n\n";

$texto = '   texto aleatório         ';
$texto = trim($texto);
echo "$texto\n\n";
