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
            $_POST['clienteNome'],
            $_POST['pizzaTamanho'],
            $_POST['pizzaSabor']
        );
        $pedido->save();
        require APLICACAO_VIEW . 'obrigado.php';
    }

    public function destroy()
    {
        Pedido::destroy();
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
    public function destroyy()
    {
        Pedido::destroyy();
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
}
