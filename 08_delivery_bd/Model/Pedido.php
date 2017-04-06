<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Pedido
{
    const BUSCAR_TODOS = 'SELECT * FROM pedidos ORDER BY id';
    const DELETAR_PRIMEIRO = 'DELETE FROM pedidos ORDER BY id LIMIT 1';
    const INSERIR = 'INSERT INTO pedidos(cliente, pizza_sabor, pizza_tamanho) VALUES (?, ?, ?)';
    private $cliente;
    private $pizzaTamanho;
    private $pizzaSabor;

    public function __construct(
        $cliente,
        $pizzaTamanho,
        $pizzaSabor
    ) {
        $this->cliente = $cliente;
        $this->pizzaTamanho = $pizzaTamanho;
        $this->pizzaSabor = $pizzaSabor;
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
        $comando->bindParam(1, $this->cliente, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->pizzaSabor, PDO::PARAM_STR, 255);
        $comando->bindParam(3, $this->pizzaTamanho, PDO::PARAM_STR, 255);
        $comando->execute();
    }

    public static function all()
    {
        $pedidosBanco = BancoDeDados::query(self::BUSCAR_TODOS);
        $pedidos = [];
        foreach ($pedidosBanco as $pedidoBanco) {
            $pedidos[] = new Pedido(
                $pedidoBanco['cliente'],
                $pedidoBanco['pizza_tamanho'],
                $pedidoBanco['pizza_sabor']
            );
        }
        return $pedidos;
    }

    public static function destroyPrimeiro()
    {
        BancoDeDados::exec(self::DELETAR_PRIMEIRO);
    }
}
