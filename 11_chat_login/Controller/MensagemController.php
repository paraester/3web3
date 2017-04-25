<?php
namespace Controller;

use \Framework\Sessao;
use \Model\Mensagem;

class MensagemController
{
    public function index()
    {
        $this->verificarLogado();
        $mensagens = Mensagem::all();
        require APLICACAO_VIEW . 'mensagens/index.php';
    }

    public function store()
    {
        $this->verificarLogado();
        $mensagem = new Mensagem(
            null,//por conta da modificação no construtor onde add Id da msg
            Sessao::get('usuario'),
            $_POST['texto']
        );
        $mensagem->save();
        header('Location: ' . URL_RAIZ . 'mensagens');
        exit;
    }

    private function verificarLogado()
    {
        if (Sessao::get('usuario') === null) {
            header('Location: ' . URL_RAIZ . 'login');
            exit;
        }
    }

    public function destroy($id)//id da mensagem - idmsg
    {
        Mensagem::destroy($id);
        header('Location: ' . URL_RAIZ . 'mensagens');
        exit;
    }

}
