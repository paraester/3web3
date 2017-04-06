<?php
namespace Framework;

class Roteador
{
    /* sempre inicia com uma barra
        sempre termina sem uma barra */
    protected $raizRelativa;
    protected $rotas;

    public function __construct()
    {
        require APLICACAO_RAIZ . 'Configuration/rotas.php';
        $this->rotas = $rotas;
        $this->raizRelativa = substr(URL_RAIZ, 0, -1);
}

    public function interpretarRota()
    {
        $caminhoRequisicao = $_SERVER['REQUEST_URI'];
        $caminhoRota = $this->removerRaizRelativa($caminhoRequisicao);
        return $this->recuperarRota($caminhoRota);
    }

    protected function removerRaizRelativa($caminhoRequisicao)
    {
        return substr($caminhoRequisicao, strlen($this->raizRelativa));
    }

    protected function recuperarRota($caminhoRota)
    {
        if (array_key_exists($caminhoRota, $this->rotas)) {
            $rota = $this->rotas[$caminhoRota];
            if (array_key_exists($_SERVER['REQUEST_METHOD'], $rota)) {
                return $rota[$_SERVER['REQUEST_METHOD']];
            }
        }
        return false;
    }
}
