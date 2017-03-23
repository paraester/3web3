<?php
namespace Controller;

use \Model\Mensagem;

class PrincipalController
{
    public function index()
    {
        $mensagens = Mensagem::all();
        require APLICACAO_RAIZ . 'View/index.php';
    }

    public function create()
    {
        $usuario = $_POST['usuario'];
        $conteudo = $_POST['conteudo'];
        $mensagem = new Mensagem($usuario, $conteudo);
        $mensagem->save();
        $this->index();
    }
}
