<?php
$rotas = [
    '/' => [
        'GET' => '\Controller\PrincipalController#index',
    ],
    '/cliente' => [
        'GET' => '\Controller\PedidoController#create',
        'POST' => '\Controller\PedidoController#store',
    ],
    '/pizzaria' => [
        'GET' => '\Controller\PedidoController#index',
        'POST' => '\Controller\PedidoController#destroy',
    ],
];
