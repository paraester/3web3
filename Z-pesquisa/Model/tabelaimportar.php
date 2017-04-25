<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Usuario
{

    public function __construct(
        $email,
        $senha,
        $foto,
        $id = -1
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->foto = $foto;
        $this->setSenha($senha);
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function setSenha($senhaPlana)
    {
        $this->senha = password_hash($senhaPlana, PASSWORD_BCRYPT);
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImagem()
    {
        $imagemNome = "{$this->id}.jpg";
        if (!ImagemUpload::existe($imagemNome)) {
            $imagemNome = "padrao.jpg";
        }
        return $imagemNome;
    }

    public function verificarSenha($senhaPlana)
    {
        return password_verify($senhaPlana, $this->senha);
    }

    public function save()
    {
        $this->inserir();
        $this->salvarImagem();
    }

    private function inserir()
    {
        $comando = BancoDeDados::prepare(self::INSERIR);
        $comando->bindParam(1, $this->email, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->senha, PDO::PARAM_STR, 60);
        $comando->execute();
        $this->id = BancoDeDados::getPdo()->lastInsertId();
    }

    private function salvarImagem()
    {
        if (ImagemUpload::isValida($this->foto)) {
            $nomeCompleto = APLICACAO_RAIZ . "Public/img/{$this->id}.jpg";
            ImagemUpload::salvar($this->foto, $nomeCompleto);
        }
    }

    public static function all()
    {
        $registros = BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Usuario(
                $registro['nome'],
                $registro['descricao'],
                $registro['id'],
                $registro['votos']
            );
        }
        return $objetos;
    }

    public static function findEmail($email)
    {
        $comando = BancoDeDados::prepare(self::BUSCAR_POR_EMAIL);
        $comando->bindParam(1, $email, PDO::PARAM_STR, 255);
        $comando->execute();
        $objeto = null;
        $registro = $comando->fetch();
        if ($registro) {
            $objeto = new Usuario(
                $registro['email'],
                '',
                null,
                $registro['id']
            );
            $objeto->senha = $registro['senha'];
        }
        return $objeto;
    }
}
