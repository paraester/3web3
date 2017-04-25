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
        'POST' => '\Controller\PedidoController#destroyPrimeiro',
      ],
    '/deletar_ultimo' => [
        'POST' => '\Controller\PedidoController#destroyUltimo',
      ],
    '/deletareste' => [
        'POST' => '\Controller\PedidoController#destroyEste',
    ],
  '/updatethisid' => [
      'POST' => '\Controller\PedidoController#update',
  ],
  '/updatepedido' => [
      'POST' => '\Controller\PedidoController#updatePedido',
  ],
];
