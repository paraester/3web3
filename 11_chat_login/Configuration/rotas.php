<?php
$rotas = [
    '/' => [
        'GET' => '\Controller\RaizController#index',
    ],
    '/login' => [
        'GET' => '\Controller\LoginController#create',// vamos cadastrar um novo usuario
        'POST' => '\Controller\LoginController#store',//loga o usuario
        'DELETE' => '\Controller\LoginController#destroy',//esta vindo de index.php mensagens - Botao sair
    ],
    '/usuarios' => [
        'POST' => '\Controller\UsuarioController#store',
    ],
    '/usuarios/create' => [
        'GET' => '\Controller\UsuarioController#create',
    ],
    '/usuarios/sucesso' => [
        'GET' => '\Controller\UsuarioController#sucesso',
    ],
    '/mensagens' => [
        'GET' => '\Controller\MensagemController#index',
        'POST' => '\Controller\MensagemController#store',
    ],
    '/deletamensagem/?' => [  //deletarmsg
        'DELETE' => '\Controller\MensagemController#destroy',//esta vindo de mensagens index.php quando clicar em deletar a mensagem
        //recebe o id da mensagem a ser deletada
    ],
];
