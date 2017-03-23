<?php
namespace AulaDePhp\Aula3\Classes;
ini_set('error_reporting',E_ALL);//lembrar php.ini


class Pessoa
{
    const TIPO = 'cientista';

    public $nome = 'Sem nome'; // não é usado no exemplo

    public function __construct($nome = 'Linus Torvalds') //construtor underlineunderline são reservadas
    {
        $this->nome = $nome;
    }

    public function falar()
    {
        echo "$this->nome é um " . self::TIPO . ".\n";
    }
}

$pessoa = new Pessoa();
$pessoa->falar();
$pessoa->nome = 'Andrew Tanenbaum'; // pesquisador de SOs
$pessoa->falar();
$pessoa = new Pessoa('Dennis Ritchie'); // inventor do C
$pessoa->falar();
echo "\n";

class Visibilidade
{
    public $publica = 'publica'; // qualquer lugar
    protected $protegida = 'protegida'; // só nesta classe e filhas
    private $privada = 'privada'; // só nesta classe

    public function metodoPublico()
    {
        return "método público\n";
    }
    protected function metodoProtegido()
    {
    }
    private function metodoPrivado()
    {
    }
}

// Fora da classe, só pode ser acessado o que é público.
$minhaVisibilidade = new Visibilidade();
echo "$minhaVisibilidade->publica\n"; //imprimindo o que tem na variavel publica
echo $minhaVisibilidade->metodoPublico();
echo "\n";

// Herança
class Pai
{
    public function __construct()
    {
        echo "Classe Pai\n";
    }
}
class Filho extends Pai
{
    public function __construct()
    {
        parent::__construct(); // chama o construtor pai
        echo "Classe Filho\n\n";
    }
}
$filho = new Filho();

// Estático
class Contador
{
    public static $contagem = 0;

    public function __construct()
    {
        self::$contagem++;
    }

    public static function getContagem()
    {
        return self::$contagem;
    }
}
Contador::$contagem = 10;
new Contador();
new Contador();
echo "Contagem: " . Contador::$contagem . "\n";
echo "Contagem: " . Contador::getContagem() . "\n\n";

// Abstração e interface
interface Nomeavel
{
    public function getNome();
}
abstract class Animal implements Nomeavel
{
    abstract public function getTipo();
    public function getSom()
    {
        return 'Som genérico';
    }
}
class Gato extends Animal
{
    public function getNome()
    {
        return 'Gato';
    }
    public function getTipo()
    {
        return 'Felino';
    }
    public function getSom()
    {
        return 'Miau';
    }
}
// $obj = new Nomeavel(); // Erro fatal
// $animal = new Animal(); // Erro fatal
$gato = new Gato();
echo 'Nome: ' . $gato->getNome() . "\n";
echo 'Tipo: ' . $gato->getTipo() . "\n";
echo 'Som: ' . $gato->getSom() . "\n\n";

// Trait (peculiaridade)
trait VerificadorTempo
{
    private $tempo;
    private function iniciar()
    {
        $this->tempo = time();
    }
    private function finalizar()
    {
        $this->tempo = time() - $this->tempo;
    }
}
class ScriptPesado
{
    use VerificadorTempo;

    public function rodar()
    {
        $this->iniciar();
        for ($x=0; $x < 200000000; $x++) {
            $a = $x + 1;
        }
        $this->finalizar();
        echo "Tempo: $this->tempo segundos.\n\n";
    }
}
// $obj = new VerificadorTempo(); // Erro fatal
$obj = new ScriptPesado();
// $obj->rodar(); // descomente para ver o resultado

// Comparação de objetos
$pedro1 = new Pessoa('Pedro');
$pedro2 = new Pessoa('Pedro');
$aline = new Pessoa('Aline');
$comparacao1 = ($pedro1 == $pedro2 ? 'Iguais' : 'Diferentes');
$comparacao2 = ($pedro1 === $pedro2 ? 'Iguais' : 'Diferentes');
$comparacao3 = ($pedro1 == $aline ? 'Iguais' : 'Diferentes');
echo "pedro1 == pedro2: $comparacao1\n";
echo "pedro1 === pedro2: $comparacao2\n";
echo "pedro1 == aline: $comparacao3\n\n";
