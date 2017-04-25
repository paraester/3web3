<?php
$rotas = [
    '/' => [
        'GET' => '\Controller\PrincipalController#index',
    ],
    '/inicio' => [
        'GET' => '\Controller\InicioController#index',
        'POST' => '\Controller\InicioController#store',
    ],
    '/inicio/create' => [
        'GET' => '\Controller\InicioController#create',
    ],
    '/inicio/?' => [
        'GET' => '\Controller\InicioController#show',
        'PATCH' => '\Controller\InicioController#update',
        'DELETE' => '\Controller\InicioController#destroy'
    ],
    '/inicio/?/edit' => [
        'GET' => '\Controller\InicioController#edit',
    ],
    '/sorteio' => [
        'GET' => '\Controller\SorteioController#index',
        'PATCH' => '\Controller\SorteioController#update',
    ],
    '/fazsorteio' => [
        'GET' => '\Controller\SorteioController#create',
    ],
    '/sorteio/?' => [
        'PATCH' => '\Controller\SorteioController#update',
    ],

    '/importar' => [
        'GET' => '\Controller\ImportarController#index',
        'POST' => '\Controller\ImportarController#create',
    ],
    '/exportar' => [
        'GET' => '\Controller\ExportarController#index',
    ],
    '/arquivos' => [
        'GET' => '\Controller\ArquivoController#index',
    ],
    '/imagem_plan_salvar' => [
        'GET' => '\Controller\ArquivoController#imagem_plan_salvar',
    ],
    '/modelo_arquivo_csv' => [
        'GET' => '\Controller\ArquivoController#modelo_arquivo_csv',
    ], 
    '/amostra' => [
        'GET' => '\Controller\AmostraController#index',
    ], 
];