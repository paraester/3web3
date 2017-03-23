<?php
namespace Controller;

use \Model\Mensagem; //veja que Mensagem é uma classe que usaremos

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
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $conteudo = $_POST['conteudo'];
        $mensagem = new Mensagem($usuario, $email, $telefone, $conteudo);
        $mensagem->save();
        header("Location: ."); //f5
        exit;
    }
}
