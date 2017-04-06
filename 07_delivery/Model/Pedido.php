<?php
namespace Model;

class Pedido
{
    const ARQUIVO_DE_DADOS = APLICACAO_RAIZ . 'Database/dados.txt';
    private $clienteNome;
    private $pizzaTamanho;
    private $pizzaSabor;

    public function __construct(
        $clienteNome,
        $pizzaTamanho,
        $pizzaSabor
    ) {
        $this->clienteNome = $clienteNome;
        $this->pizzaTamanho = $pizzaTamanho;
        $this->pizzaSabor = $pizzaSabor;
    }

    public function getClienteNome()
    {
        return $this->clienteNome;
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
        $dados = self::all();
        $dados[] = $this;
        self::salvarDadosNoArquivo($dados);
    }

    public static function all()
    {
        $pedidosString = file_get_contents(self::ARQUIVO_DE_DADOS);
        $pedidos = unserialize($pedidosString);
        return $pedidos;
    }

    public static function destroy()
    {
        $dados = self::all();
        array_shift($dados);
        self::salvarDadosNoArquivo($dados);
    }

    public static function destroyy()
    {
        $dados = self::all();
        array_pop($dados);
        self::salvarDadosNoArquivo($dados);
    }

    private static function salvarDadosNoArquivo($dados)
    {
        $dadosString = serialize($dados);
        file_put_contents(self::ARQUIVO_DE_DADOS, $dadosString);
    }

    public static function criarArquivo()
    {
        if (!file_exists(self::ARQUIVO_DE_DADOS)) {
            $arrayVazio = serialize([]);
            file_put_contents(self::ARQUIVO_DE_DADOS, $arrayVazio);
        }
    }
}
