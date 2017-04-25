<?php
namespace Controller;

use \Model\Usuario;
use \Framework\Sessao;

const VIEW_LOGIN = APLICACAO_VIEW . 'login/';

class LoginController
{
    public function create()
    {
        require VIEW_LOGIN . 'create.php';
    }

    public function store()
    {
        $usuario = Usuario::findEmail($_POST['email']);
        if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
            Sessao::set('usuario', $usuario->getId());
            header('Location: ' . URL_RAIZ . 'candidatos');//redirecionar apos logar
        } else {
            header('Location: ' . URL_RAIZ . 'login');
        }
        exit;
    }

    public function destroy()
    {
        Sessao::deletar('usuario');
        header('Location: ' . URL_RAIZ . 'login');
        exit;
    }
}
