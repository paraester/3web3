<?php
/*
    Os caminhos sempre terminam com '/'
*/

define('APLICACAO_NOME', 'Chat Online');
define('APLICACAO_RAIZ', dirname(__DIR__) . '/');
define('APLICACAO_VIEW', APLICACAO_RAIZ . 'View/');
define('APLICACAO_CONFIGURACAO', APLICACAO_RAIZ . 'Configuration/');

$comprimentoRaizApache = strlen($_SERVER['DOCUMENT_ROOT']);
$urlRaiz = substr(APLICACAO_RAIZ, $comprimentoRaizApache);

define('URL_RAIZ', $urlRaiz);
define('URL_PUBLIC', URL_RAIZ . 'Public/');
define('URL_CSS', URL_PUBLIC . 'css/');
define('URL_FONTS', URL_PUBLIC . 'fonts/');
define('URL_IMG', URL_PUBLIC . 'img/');
define('URL_JS', URL_PUBLIC . 'js/');
