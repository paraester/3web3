<?php
function carregarArquivoDaClasse($nomeDaClasse)
{
    require_once APLICACAO_RAIZ . str_replace('\\', '/', $nomeDaClasse) . '.php';
}

spl_autoload_register('carregarArquivoDaClasse');
