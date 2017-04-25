<?php
namespace Controller;

use \Model\Inicio;

const VIEW_INICIO = APLICACAO_VIEW . 'inicio/';

class InicioController
{
    public function index()
    {
        $candidatos = Inicio::all();
        require VIEW_INICIO . 'index.php';
    }

    public function show($id)
    {
        $candidato = Inicio::find($id);
        require VIEW_INICIO . 'show.php';
    }

    public function create()
    {
        require VIEW_INICIO . 'create.php';
    }

    public function edit($id)
    {
        $candidato = Inicio::find($id);
        require VIEW_INICIO . 'edit.php';
    }

    public function store()
    {
        $candidato = new Inicio(
            $_POST['nome'],
            $_POST['descricao']
        );
        $candidato->save();
        header('Location: ' . URL_RAIZ . 'inicio');
        exit;
    }

    public function update($id)
    {
        $candidato = Inicio::find($id);
        $candidato->setNome($_POST['nome']);
        $candidato->setDescricao($_POST['descricao']);
        $candidato->save();
        header('Location: ' . URL_RAIZ . 'inicio/' . $id);
        exit;
    }

    public function destroy($id)
    {
        Inicio::destroy($id);
        header('Location: ' . URL_RAIZ . 'inicio');
        exit;
    }
    public function passo_a_passo()
    {
        header('Location: ' . URL_RAIZ . 'arquivo');
        exit;
    }
}
