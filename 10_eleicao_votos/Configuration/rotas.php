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
];
