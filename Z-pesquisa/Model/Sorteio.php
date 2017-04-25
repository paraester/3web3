<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Sorteio
{
    const BUSCAR_TODOS = 'SELECT * FROM votos ORDER BY id_voto';
    const BUSCAR_POR_ID = 'SELECT * FROM votos WHERE id_voto = ?';
    const INSERIR = 'INSERT INTO votos (id_candidato,eleitor) VALUES (?, ?)';
    const DELETAR_POR_ID = 'DELETE FROM votos WHERE id = ?';
    const ATUALIZAR_POR_ID = 'UPDATE votos SET id_candidato = ?, eleitor = ? WHERE id_voto = ?';
    private $id_candidato;
    private $eleitor;

    public function __construct(
        $id_candidato = -1,
        $eleitor
    ) {
        $this->eleitor = $eleitor;
        $this->id_candidato = $id_candidato;
    }

    public function setIdCandidato($valor)
    {
        $this->id_candidato = $valor;
    }
    public function getIdCandidato()
    {
        return $this->id_candidato;
    }

    public function setEleitor($valor)
    {
        $this->eleitor = $valor;
    }
    public function getEleitor()
    {
        return $this->eleitor;
    }
    public function save()
    {
        if ($this->id_candidato == -1) {

            $this->inserir();
        } else {
            $this->atualizar();
        }
    }
    public function inserir()
    {
        $comando = BancoDeDados::prepare(self::INSERIR);
        $comando->bindParam(1, $this->id_candidato, PDO::PARAM_INT);
        $comando->bindParam(2, $this->eleitor, PDO::PARAM_STR, 255);
        $comando->execute();

    }

    public function atualizar()
    {
        $comando = BancoDeDados::prepare(self::ATUALIZAR_POR_ID);
        $comando->bindParam(1, $this->id_candidato, PDO::PARAM_INT);
        $comando->bindParam(2, $this->eleitor, PDO::PARAM_STR, 255);
        $comando->execute();
    }

    public static function all()
    {
        $registros = BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Eleitor(
                $registro['id_candidato'],
                $registro['eleitor']
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
        $objeto = new Eleitor(
            $registro['id_candidato'],
            $registro['eleitor']
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
