<?php
require_once 'config.php';

use \Controller\PrincipalController;

$controller = new PrincipalController();
if (empty($_POST)) {
    $controller->index();
} else {
    $controller->create();
}
