<?php
$rotas = [
    '/' => [
        'GET' => '\Controller\PrincipalController#index',
    ],
    '/candidatos' => [
        'GET' => '\Controller\CandidatoController#index',
        'POST' => '\Controller\CandidatoController#store',
    ],
    '/candidatos/create' => [
        'GET' => '\Controller\CandidatoController#create',
    ],
    '/candidatos/?' => [
        'GET' => '\Controller\CandidatoController#show',
        'PATCH' => '\Controller\CandidatoController#update',
        'DELETE' => '\Controller\CandidatoController#destroy'
    ],
    '/candidatos/?/edit' => [
        'GET' => '\Controller\CandidatoController#edit',
    ],
    '/votos' => [
        'GET' => '\Controller\VotoController#index',
        'PATCH' => '\Controller\VotoController#update',
    ],
    '/votos/?' => [
        'PATCH' => '\Controller\VotoController#update',
    ],
    '/login' => [
        'GET' => '\Controller\LoginController#create',// vamos cadastrar um novo usuario
        'POST' => '\Controller\LoginController#store',//loga o usuario
        'DELETE' => '\Controller\LoginController#destroy',// Botao sair
    ],
    '/usuarios/create' => [
        'GET' => '\Controller\UsuarioController#create',
    ],
    '/usuarios' => [
        'POST' => '\Controller\UsuarioController#store',
    ],
    '/usuarios/sucesso' => [
        'GET' => '\Controller\UsuarioController#sucesso',
    ],
];
