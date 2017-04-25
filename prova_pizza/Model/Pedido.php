<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Pedido
{
    const BUSCAR_TODOS = 'SELECT * FROM pedidos ORDER BY id';
    const DELETAR_PRIMEIRO = 'DELETE FROM pedidos ORDER BY id ASC LIMIT 1';
    const DELETAR_ULTIMO = 'DELETE FROM pedidos ORDER BY id DESC LIMIT 1';
    const DELETAR_ESTE = 'DELETE FROM pedidos WHERE id = ? LIMIT 1';
    const BUSCAR_ESTE = 'SELECT * FROM pedidos WHERE id = ?';
    const UPDATE_ESTE = 'UPDATE pedidos SET cliente = ? , pizza_sabor = ?, pizza_tamanho = ? WHERE id = ?';


    const INSERIR = 'INSERT INTO pedidos(id, cliente, pizza_sabor, pizza_tamanho) VALUES (NULL, ?, ?, ?)';
    private $id;
    private $cliente;
    private $pizzaTamanho;
    private $pizzaSabor;

    public function __construct(
        $id = 0,
        $cliente,
        $pizzaTamanho,
        $pizzaSabor
    ) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->pizzaTamanho = $pizzaTamanho;
        $this->pizzaSabor = $pizzaSabor;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getCliente()
    {
        return $this->cliente;
    }
    public function getPizzaTamanho()
    {
        return $this->pizzaTamanho;
    }

    public function getPizzaSabor()
    {
        return $this->pizzaSabor;
    }

    public function save()
    {
        $comando = BancoDeDados::prepare(self::INSERIR);
      //  $comando->bindParam(1, $this->id, PDO::PARAM_INT, 255);
        $comando->bindParam(1, $this->cliente, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->pizzaSabor, PDO::PARAM_STR, 255);
        $comando->bindParam(3, $this->pizzaTamanho, PDO::PARAM_STR, 255);
        $comando->execute();
        // ATUALIZAR THIS ID
        $this->id = $comando->fetch();
      //  echo $this->id;
    }

    public static function all()
    {
        $pedidosBanco = BancoDeDados::query(self::BUSCAR_TODOS);
        $pedidos = [];
        foreach ($pedidosBanco as $pedidoBanco) {
            $pedidos[] = new Pedido(
                $pedidoBanco['id'],
                $pedidoBanco['cliente'],
                $pedidoBanco['pizza_tamanho'],
                $pedidoBanco['pizza_sabor']
            );
        }
        return $pedidos;
    }
    public static function buscarEste($id)
    {
      $pedidosBancoSelecionado = BancoDeDados::prepare(self::BUSCAR_ESTE);
      $pedidosBancoSelecionado->bindParam(1, $id, PDO::PARAM_INT);
      $pedidosBancoSelecionado->execute();
      $pedidoSelecionado = [];
      $pedidoSelecionado = $pedidosBancoSelecionado->fetch();//fetchAll()[0];
  /*    $this->id = $pedidoSelecionado['id'];
      $this->cliente =  $pedidoSelecionado['cliente'];
      $this->pizzaTamanho =  $pedidoSelecionado['pizza_tamanho'];
      $this->pizzaSabor =  $pedidoSelecionado['pizza_sabor'];
*/
      $pedido = new Pedido(
          $pedidoSelecionado['id'],
          $pedidoSelecionado['cliente'],
          $pedidoSelecionado['pizza_tamanho'],
          $pedidoSelecionado['pizza_sabor']
      );
      return $pedido;
    }
    public static function updateEstePedido($id, $cliente, $pizza_tamanho, $pizza_sabor)
    {
      $comando = BancoDeDados::prepare(self::UPDATE_ESTE);
      $comando->bindParam(1, $cliente, PDO::PARAM_STR, 255);
      $comando->bindParam(2, $pizza_sabor, PDO::PARAM_STR, 255);
      $comando->bindParam(3, $pizza_tamanho, PDO::PARAM_STR, 255);
      $comando->bindParam(4, $id, PDO::PARAM_INT);
      $comando->execute();
    }
    public static function destroyPrimeiro()
    {
        BancoDeDados::exec(self::DELETAR_PRIMEIRO);
    }

    public static function destroyUltimo()
    {
        BancoDeDados::exec(self::DELETAR_ULTIMO);
    }
    public static function destroyEste($id)
    {
      $comando = BancoDeDados::prepare(self::DELETAR_ESTE);
      //$comando->bindParam(1, $this->id, PDO::PARAM_INT);
      $comando->bindParam(1, $id, PDO::PARAM_INT);
      $comando->execute();
    //  BancoDeDados::exec(self::DELETAR_ESTE);
    }



}
