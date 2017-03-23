<?php
ini_set('error_reporting',E_ALL);//lembrar php.ini
function dizerOla($pessoa)
{
    echo "Olá $pessoa.\n\n";
}
dizerOla('John von Neumann');

function fatorial($n)
{
    if ($n <= 1) {
        return 1;
    }
    return $n * fatorial($n - 1);
}
echo "O fatorial de 5 é " . fatorial(5) . ".\n\n";

/* Por padrão, a passagem dos parâmetros é por valor.
O exemplo a seguir é uma passagem por referência. */
function incrementa(&$x)
{
    $x++;
}
$a = 1;
incrementa($a);
echo "O valor de a é $a.\n\n";

// Argumentos padrão sempre deverão ser os últimos.
function pedirPizza($sabor = 'mussarela')
{
    echo "Saindo uma pizza de $sabor.\n";
}
pedirPizza();
pedirPizza('strogonoff');
echo "\n";

/* TypeHint : tipo esperado no argumento da função
PHP 5.0: classe
PHP 5.1: array
PHP 7: bool, float, int e string */
function salarioAnual(float $salarioMensal)
{
    return 12 * $salarioMensal;
}
// A linha abaixo dará um erro fatal, pois é passada uma string.
// salarioAnual('bug bug bug');
$salarioMensal = 1000;
$salario =salarioAnual($salarioMensal);
echo "salario Mensal: $salarioMensal\n";


// Quantidade variável de argumentos
// A partir do PHP 5.6, ou seja, basicamente a partir do PHP 7
function somarPhp7(...$valores) // $valores é um array
{
    $resultado = 0;
    foreach ($valores as $valor) {
        $resultado += $valor;
    }
    return $resultado;
}
// Forma antiga, ainda muito utilizada.
function somarPhp5()
{
    $valores = func_get_args(); // todos os parâmetros passados
    $resultado = 0;
    foreach ($valores as $valor) {
        $resultado += $valor;
    }
    return $resultado;
}
echo 'Somas: ' . somarPhp5(1, 1, 1) . ' e ' . somarPhp7(1, 1, 1) . "\n\n";

// Função anônima
$minhaFuncao = function () {
    echo "Função anônima!\n";
};
$minhaFuncao();

function rodarCallback($callback)
{
    $callback();
}
rodarCallback($minhaFuncao);
rodarCallback(function () {
    echo "Outra função anônima.\n\n";
});
