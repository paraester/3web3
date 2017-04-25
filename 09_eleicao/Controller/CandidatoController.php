<?php
namespace Controller;

use \Model\Candidato;

const VIEW_CANDIDATO = APLICACAO_VIEW . 'candidatos/';

class CandidatoController
{
    public function index()
    {
        $candidatos = Candidato::all();
        require VIEW_CANDIDATO . 'index.php';
    }

    public function show($id)
    {
        $candidato = Candidato::find($id);
        require VIEW_CANDIDATO . 'show.php';
    }

    public function create()
    {
        require VIEW_CANDIDATO . 'create.php';
    }

    public function edit($id)
    {
        $candidato = Candidato::find($id);
        require VIEW_CANDIDATO . 'edit.php';
    }

    public function store()
    {
        $candidato = new Candidato(
            $_POST['nome'],
            $_POST['descricao'],
            $_POST['idade'],
            $_POST['partido']
        );
        $candidato->save();
        header('Location: ' . URL_RAIZ . 'candidatos');
        exit;
    }

    public function update($id)
    {
        $candidato = Candidato::find($id);
        $candidato->setNome($_POST['nome']);
        $candidato->setDescricao($_POST['descricao']);
        $candidato->setIdade($_POST['idade']);
        $candidato->setPartido($_POST['partido']);
        $candidato->save();
        header('Location: ' . URL_RAIZ . 'candidatos/' . $id);
        exit;
    }

    public function destroy($id)
    {
        Candidato::destroy($id);
        header('Location: ' . URL_RAIZ . 'candidatos');
        exit;
    }
}
