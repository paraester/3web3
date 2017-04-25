<?php
namespace Controller;

use \Model\Eleitor;

//const VIEW_VOTO = APLICACAO_VIEW . 'votos/';

class EleitorController
{
    public function index()
    {
        $eleitor = Eleitor::all();
        require VIEW_VOTO . 'index.php';
    }

    public function show($id)
    {
        $eleitor = Eleitor::find($id);
        require VIEW_VOTO . 'show.php';
    }

    public function create()
    {
        require VIEW_VOTO . 'create.php';
    }

    public function edit($id)
    {
        $eleitor = Eleitor::find($id);
        require VIEW_VOTO . 'edit.php';
    }

    public function store()
    {
        $eleitor = new Eleitor(
            $_POST['id'],//id_candidato
            $_POST['eleitor']
        );
        $eleitor->inserir();
//        header('Location: ' . URL_RAIZ . 'votos');
//        exit;
    }

    public function update($id)
    {
        $eleitor = Eleitor::find($id);
        $eleitor->setEleitor($_POST['id']);//id_candidato
        $eleitor->setEleitor($_POST['eleitor']);
        $eleitor->save();
        header('Location: ' . URL_RAIZ . 'candidatos/' . $id);
        exit;
    }

    public function destroy($id)
    {
        Eleitor::destroy($id);
        header('Location: ' . URL_RAIZ . 'votos');
        exit;
    }
}
