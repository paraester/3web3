<?php
namespace Controller;

use \Model\Pedido;

class PedidoController
{
    public function index()
    {
        $pedidos = Pedido::all();
        require APLICACAO_VIEW . 'index.php';
    }

    public function create()
    {
        require APLICACAO_VIEW . 'create.php';
    }

    public function store()
    {
        $pedido = new Pedido(
            $_POST['cliente'],
            $_POST['pizzaTamanho'],
            $_POST['pizzaSabor']
        );
        $pedido->save();
        require APLICACAO_VIEW . 'obrigado.php';
    }

    public function destroy()
    {
        Pedido::destroyPrimeiro();
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
}
