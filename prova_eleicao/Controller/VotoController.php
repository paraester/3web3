<?php
namespace Controller;

use \Controller\CandidatoController;
use \Model\Candidato;

const VIEW_VOTO = APLICACAO_VIEW . 'votos/';

class VotoController
{
    private $logado = false;
    public function index()
    {
          CandidatoController::verificarLogado(); // se não logado sera redirecionado
          $this->logado = true;
          $candidatos = Candidato::all();
          require VIEW_VOTO . 'index.php';
    }

    public function update()
    {
        $id_candidato = 0;
        $candidato = Candidato::find($_POST['id']);
        $candidato->votar();
        $candidato->save();

        if (isset($_POST['eleitor'])) {
          $eleitor = $_POST['eleitor'];
          //echo $eleitor;
        }
        if (isset($_POST['id'])) {
          $id_candidato = $_POST['id'];
          //echo $id_candidato;
        }

        $eleitor = EleitorController::store(); //deve setar o eleitor no objeto

      //  $eleitor->save();
        $resultado = array();
        $resultado["total"] = $candidato->getVotos();
        $resultado["id"] = $id_candidato;
        echo json_encode($resultado);

      //  header('Location: ' . URL_RAIZ . 'votos');
      //  exit;
    }
}
