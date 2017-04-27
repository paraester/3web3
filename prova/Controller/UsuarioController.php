<?php
namespace Controller;

use \Model\Usuario;

const VIEW_USUARIO = APLICACAO_VIEW . 'usuarios/';

class UsuarioController
{
    public function create()
    {
        require VIEW_USUARIO . 'create.php';
    }

    public function store()
    {
        #TODO
        header('Location: ' . URL_RAIZ . 'usuarios/sucesso');
        exit;
    }

    public function sucesso()
    {
        #TODO
    }
}
