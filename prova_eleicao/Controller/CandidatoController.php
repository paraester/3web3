<?php
namespace Controller;

use \Framework\Sessao;
use \Model\Candidato;

const VIEW_CANDIDATO = APLICACAO_VIEW . 'candidatos/';

class CandidatoController
{
    public function index()
    {
        $this->verificarLogado();
        $candidatos = Candidato::all();
        require VIEW_CANDIDATO . 'index.php';
    }

    public function verificarLogado()
    {
        if (Sessao::get('usuario') === null) {
            header('Location: ' . URL_RAIZ . 'login');
            exit;
        }
    }
    public function show($id)
    {
        $candidato = Candidato::find($id);
        require VIEW_CANDIDATO . 'show.php';
    }

    public function create()
    {
        $this->verificarLogado();
        require VIEW_CANDIDATO . 'create.php';
    }

    public function edit($id)
    {
        $this->verificarLogado();
        $candidato = Candidato::find($id);
        require VIEW_CANDIDATO . 'edit.php';
    }

    public function store()
    {
        $this->verificarLogado();
        $candidato = new Candidato(
            $_POST['nome'],
            $_POST['descricao']
        );
        $candidato->save();
        header('Location: ' . URL_RAIZ . 'candidatos');
        exit;
    }

    public function update($id)
    {
        $this->verificarLogado();
        $candidato = Candidato::find($id);
        $candidato->setNome($_POST['nome']);
        $candidato->setDescricao($_POST['descricao']);
        $candidato->save();
        header('Location: ' . URL_RAIZ . 'candidatos/' . $id);
        exit;
    }

    public function destroy($id)
    {
        $this->verificarLogado();
        Candidato::destroy($id);
        header('Location: ' . URL_RAIZ . 'candidatos');
        exit;
    }
}
