<?php
define('APLICACAO_RAIZ', __DIR__ . '/');

function carregarArquivoDaClasse($nomeDaClasse)
{
    require_once APLICACAO_RAIZ . str_replace('\\', '/', $nomeDaClasse) . '.php';
}

spl_autoload_register('carregarArquivoDaClasse');

\Model\Mensagem::criarArquivo(); // cria o banco de dados
