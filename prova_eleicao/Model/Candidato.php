<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;
use \Framework\ImagemCandidato;
class Candidato
{
    const BUSCAR_TODOS = 'SELECT * FROM candidatos ORDER BY nome';
    const BUSCAR_POR_ID = 'SELECT * FROM candidatos WHERE id = ?';
    const INSERIR = 'INSERT INTO candidatos(nome,descricao) VALUES (?, ?)';
    const INSERIR_ELEITOR = 'INSERT INTO votos(id_candidato,eleitor) VALUES (?, ?)';
    const DELETAR_POR_ID = 'DELETE FROM candidatos WHERE id = ?';
    const ATUALIZAR_POR_ID = 'UPDATE candidatos SET nome = ?, descricao = ?, votos = ? WHERE id = ?';
    private $id;
    private $nome;
    private $descricao;
    private $votos;
    private $id_candidato;
    private $foto;

    public function __construct(
        $nome,
        $descricao,
        $id = -1,
        $votos = 0,
        $fotos = null

    ) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->id = $id;
        $this->votos = $votos;
        $this->foto = $fotos;
    }
    public function getImagem()
    {
        $imagemNome = "{$this->id}.jpg";
        if (!ImagemCandidato::existe($imagemNome)) {
            $imagemNome = "padrao.jpg";
        }
        return $imagemNome;
    }

    public function salvarImagem()
    {
        if (ImagemCandidato::isValida($this->foto)) {
            $nomeCompleto = APLICACAO_RAIZ . "Public/img/Candidato/{$this->id}.jpg";
            ImagemCandidato::salvar($this->foto, $nomeCompleto);
        }
    }

    public function setNome($valor)
    {
        $this->nome = $valor;
    }
    public function setImagem($valor)
    {
        $this->foto = $valor;
    }
    public function setDescricao($valor)
    {
        $this->descricao = $valor;
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

    public function getId()
    {
        return $this->id;
    }

    public function getVotos()
    {
        return $this->votos;
    }
    public function setIdCadidato($valor)
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

    public function votar()
    {
      //echo "voto agora: ".$this->votos."\n";
        $this->votos++;
        //echo "voto depois: ".$this->votos."\n";
    }

    public function save()
    {
        if ($this->id == -1) {
            $this->inserir();
            $this->salvarImagem();
        } else {
            $this->atualizar();
            $this->salvarImagem();
        }
    }
    public function inserirEleitor($id,$eleitor)
    {
        $comando = BancoDeDados::prepare(self::INSERIR_ELEITOR);
        $comando->bindParam(1, $this->$id, PDO::PARAM_INT);
        $comando->bindParam(2, $this->$eleitor, PDO::PARAM_STR, 255);
        $comando->execute();
        print_r($comando->errorInfo());
    }
    public function inserir()
    {
        $comando = BancoDeDados::prepare(self::INSERIR);
        $comando->bindParam(1, $this->nome, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->descricao, PDO::PARAM_STR, 255);
        $comando->execute();
        print_r($comando->errorInfo());

    }

    public function atualizar()
    {
        $comando = BancoDeDados::prepare(self::ATUALIZAR_POR_ID);
        $comando->bindParam(1, $this->nome, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $this->descricao, PDO::PARAM_STR, 255);
        $comando->bindParam(3, $this->votos, PDO::PARAM_INT);
        $comando->bindParam(4, $this->id, PDO::PARAM_INT);
        $comando->execute();
        print_r($comando->errorInfo());
    }

    public static function all()
    {
        $registros = BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Candidato(
                $registro['nome'],
                $registro['descricao'],
                $registro['id'],
                $registro['votos']
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
            $registro['id'],
            $registro['votos']
        );
      //  echo "total de votos da base ".$registro['votos']."\n";
        return $objeto;
    }

    public static function destroy($id)
    {
        $comando = BancoDeDados::prepare(self::DELETAR_POR_ID);
        $comando->bindParam(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }
}
