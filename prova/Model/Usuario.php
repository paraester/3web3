<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Usuario
{
    const BUSCAR_POR_ID = 'SELECT * FROM usuarios WHERE id = ? LIMIT 1';
    const BUSCAR_POR_EMAIL = 'SELECT * FROM usuarios WHERE email = ? LIMIT 1';
    const INSERIR = 'INSERT INTO usuarios(email,senha) VALUES (?, ?)';
    private $id;
    private $email;
    private $senha;

    public function __construct(
        $email,
        $senha,
        $id = -1
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->setSenha($senha);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function setSenha($senhaPlana)
    {
        #TODO
    }

    public function verificarSenha($senhaPlana)
    {
        #TODO
    }

    public function save()
    {
        $this->inserir();
    }

    private function inserir()
    {
        #TODO
    }

    public static function findId($id)
    {
        $comando = BancoDeDados::prepare(self::BUSCAR_POR_ID);
        $comando->bindParam(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        if ($registro) {
            return self::transformarVetorEmObjeto($registro);
        }
        return null;
    }

    public static function findEmail($email)
    {
        #TODO
    }

    private static function transformarVetorEmObjeto($vetor)
    {
        $objeto = new Usuario(
            $vetor['email'],
            '',
            $vetor['id']
        );
        $objeto->senha = $vetor['senha'];
        return $objeto;
    }
}
