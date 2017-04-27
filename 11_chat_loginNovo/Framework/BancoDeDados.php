<?php
namespace Framework;

use \PDO;

class BancoDeDados
{
    /*
    Exemplo: mysql:host=localhost;port=3306;dbname=meubanco
    */
    const DNS_FORMATO = '%s:host=%s;port=%s;dbname=%s';
    private static $pdo;

    public static function query($sql)
    {
        return self::getPdo()->query($sql);
    }

    public static function exec($sql)
    {
        return self::getPdo()->exec($sql);
    }

    public static function prepare($sql)
    {
        return self::getPdo()->prepare($sql);
    }

    public static function getPdo()
    {
        if (self::$pdo == null) {
            self::criarPdo();
        }
        return self::$pdo;
    }

    private static function criarPdo()
    {
        require APLICACAO_CONFIGURACAO . 'banco.php';
        self::$pdo = new PDO(
            self::getDnsString($banco),
            $banco['usuario'],
            $banco['senha'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
        );
    }

    private static function getDnsString($banco)
    {
        return sprintf(
            self::DNS_FORMATO,
            $banco['driver'],
            $banco['servidor'],
            $banco['porta'],
            $banco['banco']
        );
    }
}
