<?php
namespace Controller;

use \Model\Inicio;

const VIEW_AMOSTRA = APLICACAO_VIEW . 'amostra/';

class AmostraController
{
        public function index()
    {
        require VIEW_AMOSTRA . 'index.php';
        //require_once(PUBLIC_ARQUIVOS . 'index.odt');
    }
        public function create()
    {
        require VIEW_AMOSTRA . 'create.php';
    }
}