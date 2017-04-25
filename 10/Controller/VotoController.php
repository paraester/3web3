<?php
namespace Controller;

use \Model\Candidato;

const VIEW_VOTO = APLICACAO_VIEW . 'votos/';

class VotoController
{
    public function index()
    {
        $candidatos = Candidato::all();
        require VIEW_VOTO . 'index.php';
    }

    public function update()
    {
        $candidato = Candidato::find($_POST['id']);
        $candidato->votar();
        $candidato->save();
        if (isset($_POST['eleitor'])) {
          $eleitor = $_POST['eleitor'];
          echo $eleitor;
        }
        if (isset($_POST['id'])) {
          $id_candidato = $_POST['id'];
          echo $id_candidato;
        }

        $eleitor = EleitorController::store(); //deve setar o eleitor no objeto

        $eleitor->save();

        header('Location: ' . URL_RAIZ . 'votos');
        exit;
    }

}
