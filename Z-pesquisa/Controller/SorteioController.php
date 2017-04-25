<?php
namespace Controller;

use \Model\Inicio;

const VIEW_SORTEIO = APLICACAO_VIEW . 'sorteio/';

class SorteioController
{
    public function index()
    {
        $candidatos = Inicio::all();
        require VIEW_SORTEIO . 'index.php';
    }
    public function create()
        
    {
        require VIEW_SORTEIO . 'create.php';
    }
    
    public function update()
    {
        $id_candidato = 0;
        $candidato = Inicio::find($_POST['id']);
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