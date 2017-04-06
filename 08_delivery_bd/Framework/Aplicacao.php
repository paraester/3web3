<?php
namespace Framework;

class Aplicacao
{
    protected $roteador;

    public function __construct()
    {
        $this->iniciarRoteador();
    }

    public function rodar()
    {
        $controladorString = $this->roteador->interpretarRota();
        if ($controladorString === false) {
            echo 'Rota não encontrada.';
            exit;
        }
        $this->executarControlador($controladorString);
    }

    protected function iniciarRoteador()
    {
        $this->roteador = new Roteador();
    }

    protected function executarControlador($controladorString)
    {
        $controladorArray = explode('#', $controladorString);
        $controlador = $controladorArray[0];
        $metodo = $controladorArray[1];
        $objetoControlador = new $controlador();
        $objetoControlador->$metodo();
    }
}
