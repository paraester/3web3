<?php
namespace Controller;

use \Model\Inicio;

const VIEW_IMPORTAR = APLICACAO_VIEW . 'importar/';

class ImportarController
{
        public function index()
    {
        require VIEW_IMPORTAR . 'index.php';
        //require_once(PUBLIC_ARQUIVOS . 'index.odt');
    }
        public function create()
    {
        require VIEW_IMPORTAR . 'create.php';
    }
}