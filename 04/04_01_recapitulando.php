<?php
namespace Jogo;

ini_set('error_reporting', E_ALL);

class Soldado
{
    private $arma;

    public function __construct(Arma $arma)
    {
        $this->arma = $arma;
    }

    public function atacar()
    {
        printf(
            "O soldado atacou: %d de dano!\n",
            $this->arma->getDano()
        );
    }
}

interface Arma
{
    public function getDano();
}

class Pistola implements Arma
{
    public function getDano()
    {
        return 10;
    }
}

class Bazuca implements Arma
{
    public function getDano()
    {
        return 200;
    }
}

$arma = new \Jogo\Pistola();
$soldado = new \Jogo\Soldado($arma);
$soldado->atacar();

$soldado = new Soldado(new Bazuca());
$soldado->atacar();
