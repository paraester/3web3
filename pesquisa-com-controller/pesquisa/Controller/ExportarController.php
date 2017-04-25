<?php
namespace Controller;

use \Model\Inicio;

const VIEW_EXPORTAR = APLICACAO_VIEW . 'exportar/';

class ExportarController
{
     public function index()
    {
        require VIEW_EXPORTAR . 'index.php';
        //require_once(PUBLIC_ARQUIVOS . 'index.odt');
    }
      public function create()
    {
        require VIEW_EXPORTAR . 'create.php';
    }
}