<?php
namespace Controller;

class PrincipalController
{
    public function index()
    {
        header('Location: ' . URL_RAIZ . 'inicio');
        exit;
    }
}
