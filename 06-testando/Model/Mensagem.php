<?php
namespace Model; //Pacote

class Mensagem
{
    const ARQUIVO_DE_DADOS = APLICACAO_RAIZ . 'Database/contato.txt';// qual sera o arquivo que vamos gravar
    private $usuario;
    private $email;
    private $telefone;
    private $conteudo;

    public function __construct($usuario, $email, $telefone, $conteudo)
    {
        $this->usuario = $usuario;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->conteudo = $conteudo; //mensagem em txt
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getConteudo()
    {
        return $this->conteudo;
    }

    public function save()
    {
        $dados = self::all();//recuperar todos os dados do bd
        $dados[] = $this; //this é o objeto Mensagem
        $dadosString = serialize($dados);
        file_put_contents(self::ARQUIVO_DE_DADOS, $dadosString);
    }

    public static function all()
    {
        $mensagensString = file_get_contents(self::ARQUIVO_DE_DADOS);
        $mensagens = unserialize($mensagensString);
        return $mensagens;
    }

    public static function criarArquivo()
    {
        if (!file_exists(self::ARQUIVO_DE_DADOS)) {
            $arrayVazio = serialize([]);
            file_put_contents(self::ARQUIVO_DE_DADOS, $arrayVazio);
        }
    }
}
