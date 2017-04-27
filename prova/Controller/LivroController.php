<?php
namespace Controller;

use \Framework\Sessao;
use \Model\Livro;

class LivroController
{
    public function index()
    {
        #TODO
    }

    public function store()
    {
        #TODO
    }

    public function emprestar($id)
    {
        #TODO
    }

    public function devolver($id)
    {
        #TODO
    }

    protected static function isEmprestadoParaMim($livro)
    {
        return $livro->isEmprestado()
            && $livro->getUsuarioId() == Sessao::get('usuario');
    }

    private function verificarLogado()
    {
        if (Sessao::get('usuario') === null) {
            header('Location: ' . URL_RAIZ . 'login');
            exit;
        }
    }
}
