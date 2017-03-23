<?php
namespace Model; //Pacote

class Mensagem
{
    const ARQUIVO_DE_DADOS = APLICACAO_RAIZ . 'Database/dados.txt';// qual sera o arquivo que vamos gravar
    private $usuario;
    private $conteudo;

    public function __construct($usuario, $conteudo)
    {
        $this->usuario = $usuario;
        $this->conteudo = $conteudo;
    }

    public function getUsuario()
    {
        return $this->usuario;
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
