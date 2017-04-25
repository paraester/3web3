<?php
namespace Controller;

//use \Framework\Sessao;

use \Model\Inicio;
use \Model\Populacao;

const VIEW_IMPORTAR = APLICACAO_VIEW . 'importar/';

class ImportarController
{
        public function create()
    {
        require VIEW_IMPORTAR . 'create.php';//'index.php'
        //require_once(PUBLIC_ARQUIVOS . 'index.odt');
    }
        public function store()
    {
        $tabela = Populacao::carregar();
    }
}
