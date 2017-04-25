<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Candidato
{
    const BUSCAR_TODOS = 'SELECT * FROM candidatos ORDER BY nome';
    const BUSCAR_POR_ID = 'SELECT * FROM candidatos WHERE id = ?';
    const INSERIR = 'INSERT INTO candidatos(nome,descricao,idade,partido) VALUES (?, ?, ?, ?)';
    const DELETAR_POR_ID = 'DELETE FROM candidatos WHERE id = ?';
    const ATUALIZAR_POR_ID = 'UPDATE candidatos SET nome = ?, descricao = ?, idade = ?, partido = ? WHERE id = ?';
    private $id;
    private $nome;
    private $descricao;
    private $idade;
    private $partido;

    public function __construct(
        $nome,
        $descricao,
        $idade,
        $partido,
        $id = -1
    ) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->idade = $idade;
        $this->partido = $partido;
        $this->id = $id;
    }

    public function setNome($valor)
    {
        $this->nome = $valor;
    }

    public function setDescricao($valor)
    {
        $this->descricao = $valor;
    }

    public function setIdade($valor)
    {
        $this->idade = $valor;
    }

    public function setPartido($valor)
    {
        $this->partido = $valor;
    }
    public function setId($valor)
    {
        $this->id = $valor;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getIdade()
    {
        return $this->idade;
    }

    public function getPartido()
    {
        return $this->partido;
    }
    public function getId()
    {
        return $this->id;
    }

    public function save()
    {
        if ($this->id == -1) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    public function inserir()
    {
        $comando = BancoDeDados::prepare(self::INSERIR);
        $comando->bindParam(1, $this->nome, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->descricao, PDO::PARAM_STR, 255);
        $comando->bindParam(3, $this->idade, PDO::PARAM_INT);
        $comando->bindParam(4, $this->partido, PDO::PARAM_STR, 255);
        $comando->execute();
    }

    public function atualizar()
    {
        $comando = BancoDeDados::prepare(self::ATUALIZAR_POR_ID);
        $comando->bindParam(1, $this->nome, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->descricao, PDO::PARAM_STR, 255);
        $comando->bindParam(3, $this->idade, PDO::PARAM_INT);
        $comando->bindParam(4, $this->partido, PDO::PARAM_STR, 255);
        $comando->bindParam(5, $this->id, PDO::PARAM_INT);
        $comando->execute();
    }

    public static function all()
    {
        $registros = BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Candidato(
                $registro['nome'],
                $registro['descricao'],
                $registro['idade'],
                $registro['partido'],
                $registro['id']
            );
        }
        return $objetos;
    }

    public static function find($id)
    {
        $comando = BancoDeDados::prepare(self::BUSCAR_POR_ID);
        $comando->bindParam(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        $objeto = new Candidato(
            $registro['nome'],
            $registro['descricao'],
            $registro['idade'],
            $registro['partido'],
            $registro['id']
        );
        return $objeto;
    }

    public static function destroy($id)
    {
        $comando = BancoDeDados::prepare(self::DELETAR_POR_ID);
        $comando->bindParam(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }
}
