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
            NULL,
            $_POST['cliente'],
            $_POST['pizzaTamanho'],
            $_POST['pizzaSabor']
        );
        $pedido->save();
        require APLICACAO_VIEW . 'obrigado.php';
    }

    public function destroyPrimeiro()
    {
        Pedido::destroyPrimeiro();
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
    public function destroyUltimo()
    {
        Pedido::destroyUltimo();
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
    public function destroyEste()
    {
      //  echo $_POST['id'];     //    exit;
        $id = 0;
        if (isset($_POST['remover']))
        {
          $id = (int) $_POST['remover'];
        }
        Pedido::destroyEste($id); //esta vindo o id da view
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
    public function updatePedido()
    {
        $id = 0;
        $pizza_tamanho = '';
        $pizza_sabor = '';
        if (isset($_POST['id']))//tem essee indice
        {
          $id = (int) $_POST['id'];
        }
        if (isset($_POST['cliente'])) {
          $cliente = $_POST['cliente'];
          echo $cliente;
        }
        if (isset($_POST['pizza_tamanho'])) {
          $pizza_tamanho = $_POST['pizza_tamanho'];
          echo $pizza_tamanho;
        }
        if (isset($_POST['pizza_sabor'])) {
          $pizza_sabor = $_POST['pizza_sabor'];
          echo $pizza_sabor;
        }
        Pedido::updateEstePedido($id, $cliente, $pizza_tamanho, $pizza_sabor);
        header('Location: ' . URL_RAIZ . 'pizzaria');
        exit;
    }
    public function update()
    {
      $id = 0;
      if (isset($_POST['updatethisid']))//tem essee indice
      {
        $id = (int) $_POST['updatethisid'];
      }
      $pedido = Pedido::buscarEste($id);

      require APLICACAO_VIEW . 'update.php';
    }
}
