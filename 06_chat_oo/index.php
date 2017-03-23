<?php
require_once 'config.php';
/*chmar o arquivo de configuração require_once é pra incluir um arquivo
include_once nã dá erro fatal*/

use \Controller\PrincipalController;

$controller = new PrincipalController();
if (empty($_POST)) {
    $controller->index();
} else {
    $controller->create();
}
