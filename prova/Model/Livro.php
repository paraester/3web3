<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Livro
{
    const BUSCAR_TODOS = 'SELECT * FROM livros ORDER BY titulo';
    const BUSCAR_POR_ID = 'SELECT * FROM livros WHERE id = ? LIMIT 1';
    const INSERIR = 'INSERT INTO livros(titulo) VALUES (?)';
    const ATUALIZAR = 'UPDATE livros SET titulo = ?, usuario_id = ? WHERE id = ?';
    private $id;
    private $titulo;
    private $usuarioId;
    private $usuario;

    public function __construct(
        $titulo,
        $id = -1,
        $usuarioId = null
    ) {
        $this->titulo = $titulo;
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->usuario = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getUsuario()
    {
        if ($this->usuario == null && $this->usuarioId != null) {
            $this->usuario = Usuario::findId($this->usuarioId);
        }
        return $this->usuario;
    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function isEmprestado()
    {
        #TODO
    }

    public function save()
    {
        #TODO
    }

    private function inserir()
    {
        #TODO
    }

    private function atualizar()
    {
        #TODO
    }

    public static function all()
    {
        $registros = BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Livro(
                $registro['titulo'],
                $registro['id'],
                $registro['usuario_id']
            );
        }
        return $objetos;
    }

    public static function findId($id)
    {
        $comando = BancoDeDados::prepare(self::BUSCAR_POR_ID);
        $comando->bindParam(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        if ($registro) {
            return new Livro(
                $registro['titulo'],
                $registro['id'],
                $registro['usuario_id']
            );
        }
        return null;
    }
}
