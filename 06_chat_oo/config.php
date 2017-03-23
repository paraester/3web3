<?php
define('APLICACAO_RAIZ', __DIR__ . '/'); /* vai pegar o diretorio e conctenar com uma barra*/

function carregarArquivoDaClasse($nomeDaClasse)
{
    echo "$nomeDaClasse.<br>"; //pra mostrar o nome da classe
    echo APLICACAO_RAIZ . str_replace('\\', '/', $nomeDaClasse) . '.php<br>';
    require_once APLICACAO_RAIZ . str_replace('\\', '/', $nomeDaClasse) . '.php';
}

spl_autoload_register('carregarArquivoDaClasse');//esta função carregarArquivoDaClasse é a que carrega as classes

\Model\Mensagem::criarArquivo(); // cria o banco de dados
