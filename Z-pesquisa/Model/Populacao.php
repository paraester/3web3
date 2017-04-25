<?php
namespace Model;

use \PDO;
use \Framework\BancoDeDados;

class Populacao
{
    const BUSCAR_TODOS = 'SELECT  FROM  JOIN  ON  ORDER BY ';
    const LIMPAR_TABELA_RESPOSTAS = "TRUNCATE TABLE 1pesquisa";
    const SEMANA_MES_ANO = "SELECT week(NOW()) as semana, year(NOW()) as ano, month(NOW()) as mes";
    const INSERIR = 'INSERT INTO 1pesquisa (ocorrencia_contato_nome, ocorrencia_contato_fone, ocorrencia_solicitante_nome,
    ocorrencia_solicitante_fone, ocorrencia_ocorrencia_id, cliente_sigla, municipio_nome, total_tempo_gasto, ocorrencia_data_abertura, ocorrencia_data_conclusao, ocorrencia_data_solucao, ocorrencia_execucoes_data_ini, ocorrencia_execucoes_data_fim, funcionario_nome, ocorrencia_execucoes_forma_atendimento_descricao, area_sigla) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    private $ocorrencia_contato_nome;
    private $ocorrencia_contato_fone;
    private $ocorrencia_solicitante_nome;
    private $ocorrencia_solicitante_fone;
    private $ocorrencia_ocorrencia_id;
    private $cliente_sigla;
    private $municipio_nome;
    private $total_tempo_gasto;
    private $ocorrencia_data_abertura;
    private $ocorrencia_data_conclusao;
    private $ocorrencia_data_solucao;
    private $ocorrencia_execucoes_data_ini;
    private $ocorrencia_execucoes_data_fim;
    private $funcionario_nome;
    private $ocorrencia_execucoes_forma_atendimento_descricao;
    private $area_sigla;
    private $id;
    private $numeroDeCamposDaTabela = 15;
    private $carregar;

    //Pegar o nome temporário do arquivo a ser importado
    private $nometmp;
    private $linhas;
    private $verifica;

    public function __construct(
        $ocorrencia_contato_nome,
        $ocorrencia_contato_fone,
        $ocorrencia_solicitante_nome,
        $ocorrencia_solicitante_fone,
        $ocorrencia_ocorrencia_id,
        $cliente_sigla,
        $municipio_nome,
        $total_tempo_gasto,
        $ocorrencia_data_abertura,
        $ocorrencia_data_conclusao,
        $ocorrencia_data_solucao,
        $ocorrencia_execucoes_data_ini,
        $ocorrencia_execucoes_data_fim,
        $funcionario_nome,
        $ocorrencia_execucoes_forma_atendimento_descricao,
        $area_sigla,
        $id = -1
    ) {
        $id = '';
        $this->setOcorrencia_contato_nome();
        $this->setOcorrencia_contato_fone();;
        $this->setOcorrencia_solicitante_nome();
        $this->setOcorrencia_solicitante_fone();
        $this->setOcorrencia_ocorrencia_id();
        $this->setCliente_sigla();
        $this->setMunicipio_nome();
        $this->setTotal_tempo_gasto();
        $this->setOcorrencia_data_abertura();
        $this->setOcorrencia_data_conclusao();
        $this->setOcorrencia_data_solucao();
        $this->setOcorrencia_execucoes_data_ini();
        $this->setOcorrencia_execucoes_data_fim();
        $this->setFuncionario_nome();
        $this->setOcorrencia_execucoes_forma_atendimento_descricao();
        $this->setArea_sigla();
    }

    private function setOcorrencia_contato_nome()
    {
        $this->linhas = utf8_decode(addslashes($linhas[0]));
    }


    private function setOcorrencia_contato_fone()
    {
        $this->linhas = utf8_decode(addslashes($linhas[1]));
    }

    private function setOcorrencia_solicitante_nome()
    {
        $this->linhas = utf8_decode(addslashes($linhas[2]));
    }


    private function setOcorrencia_solicitante_fone()
    {
        $this->linhas = utf8_decode(addslashes($linhas[3]));
    }


    private function setOcorrencia_ocorrencia_id()
    {
        $this->linhas = utf8_decode(addslashes($linhas[4]));
    }

    private function setCliente_sigla()
    {
        $this->linhas = utf8_decode(addslashes($linhas[5]));
    }


    private function setMunicipio_nome()
    {
        $this->linhas = utf8_decode(addslashes($linhas[6]));
    }


    private function setTotal_tempo_gasto()
    {
        $this->linhas = utf8_decode(addslashes($linhas[7]));
    }


    private function setOcorrencia_data_abertura()
    {
        $this->linhas = utf8_decode(addslashes($linhas[8]));
    }


    private function setOcorrencia_data_conclusao()
    {
        $this->linhas = utf8_decode(addslashes($linhas[9]));
    }


    private function setOcorrencia_data_solucao()
    {
        $this->linhas = utf8_decode(addslashes($linhas[10]));

    }


    private function setOcorrencia_execucoes_data_ini()
    {
        $this->linhas = utf8_decode(addslashes($linhas[11]));
    }


    private function setOcorrencia_execucoes_data_fim()
    {
        $this->linhas = utf8_decode(addslashes($linhas[12]));
    }


    private function setFuncionario_nome()
    {
        $this->linhas = utf8_decode(addslashes($linhas[13]));
    }



    private function setOcorrencia_execucoes_forma_atendimento_descricao()
    {
        $this->linhas = utf8_decode(addslashes($linhas[14]));
    }


    private function setArea_sigla()
    {
        $this->linhas = utf8_decode(addslashes($linhas[15]));
    }

    public function getId()
    {
        return $this->id;
    }
    public function getOcorrencia_Contato_Nome()
    {
        return $this->ocorrencia_contato_nome;
    }

    public function save()
    {
        $this->inserir();
    }

    public function carregar()
    {
      ob_start(); //Pra segurar o buffer de saída sem enviar
      ignore_user_abort(true); //N adianta o usuario cancelar a página pode ser ruim em alguns casos
      echo "<html><body>Iniciando upload dos dados as ";
      echo date('h:i:s') . "\n";// current time
      echo str_repeat("  ", 1024), "\n"; // isto eh necessario pq alguns navegadores nao exibem nada a menos que chegue mais de 1Kb.
      ob_end_flush();
      flush(); //Pra enviar o buffer de saída ao navegador de uma vez
      for ($i=0; $i<2; $i++)
      {
          echo '<br>Aguarde linhas do arquivo sendo carregadas...<br />';
          ob_flush();
          flush(); //Pra enviar o que jah esteja no buffer de saída ao navegador
          sleep(2); //apenas para esperar dois segundos, so pra ver que funciona
      }
      echo "<br>Terminou as " . date('h:i:s') . "\n";      // current time
      $arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
      //$this->truncate();
      $comando = BancoDeDados::prepare(self::LIMPAR_TABELA_RESPOSTAS);
      $comando->execute();

    //$this->abreArquivo();
    $numeroDeCamposDaTabela = 15;
    $nometmp= $_FILES["arquivo"]["tmp_name"];//Pegar o nome temporário do arquivo a ser importado
    print_r($nometmp);
    if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
      print_r($_FILES["arquivo"]);
    }
    else {
      echo "Erro linha 36";
    }
    if ($nometmp != ""){// se ele não estiver vazio
      $handle= fopen ($nometmp, "r");//abre
    }else{
        echo "mesangem de erro";//mostra pra quem ta importando
    }
    /* Separo linha por linha do arquivo, colocando em uma array, onde cada linha  estara em uma chave */
    $linhas = file($nometmp);
    $verifica = true;
    //percorro linha por linha para verificar se esta correto o arquivo
    for ($x=0; $x < count($linhas); $x++)
    {
      /* separa cada linha em mais um vetor com os dados em cada chave, lembrando que o ";" será o separador dos dados, ou seja, se o arquivo está com ",", no explode deverá ter "," Posteriormente colocaremos aspas, portanto agora removemos as aspas duplas*/
      $linhas[$x] = str_replace('"', '', $linhas[$x]);
      $dados = explode(';',$linhas[$x]);
      //PRIMEIRA LINHA PODE SER DE CABEÇALHOS E PRECISAMOS NAO INSERI-LA
      //Removendo espaços nos extremos das celulas
      foreach ($dados as $key => $value) {
          $dados[$key] = trim($value);
      }
      print_r($dados);
      echo "<br>substr_count - ";
      $ffff=substr_count($linhas[$x], ";");
      print_r($ffff);//numero de campos da tabela
      echo "<br>";
      if (substr_count($linhas[$x], ";") == ($numeroDeCamposDaTabela)){
      //se está correto, coloca eles em uma matriz para que possa gravar mais pra frente
        $matrizDeDados[] = $dados;
        /* print_r($dados);
        echo "<br>";*/
        $comando = BancoDeDados::prepare(self::INSERIR);
        $comando->bindParam(1, utf8_decode(addslashes($linhas[0]))mnb, PDO::PARAM_STR, 255);
        $comando->bindParam(2, $ocorrencia_contato_fone, PDO::PARAM_STR, 255);
        $comando->bindParam(3, $ocorrencia_solicitante_nome, PDO::PARAM_STR, 255);
        $comando->bindParam(4, $ocorrencia_solicitante_fone, PDO::PARAM_STR, 255);
        $comando->bindParam(5, $ocorrencia_ocorrencia_id, PDO::PARAM_INT);
        $comando->bindParam(6, $cliente_sigla, PDO::PARAM_STR, 255);
        $comando->bindParam(7, $municipio_nome, PDO::PARAM_STR, 255);
        $comando->bindParam(8, $total_tempo_gasto, PDO::PARAM_STR, 255);
        $comando->bindParam(9, $ocorrencia_data_abertura, PDO::PARAM_STR, 255);
        $comando->bindParam(10, $ocorrencia_data_conclusao, PDO::PARAM_STR, 255);
        $comando->bindParam(11, $ocorrencia_data_solucao, PDO::PARAM_STR, 255);
        $comando->bindParam(12, $ocorrencia_execucoes_data_ini, PDO::PARAM_STR, 255);
        $comando->bindParam(13, $ocorrencia_execucoes_data_fim, PDO::PARAM_STR, 255);
        $comando->bindParam(14, $funcionario_nome, PDO::PARAM_STR, 255);
        $comando->bindParam(15, $ocorrencia_execucoes_forma_atendimento_descricao, PDO::PARAM_STR, 255);
        $comando->bindParam(16, $area_sigla, PDO::PARAM_STR, 255);
        $comando->execute();


        print_r($comando->errorInfo());
      }else {
        //tem o número da linha do arquivo
        $y = $x +1;
        //mostra  amsg de erro com a linha que está com problema
        echo 'Erro na linha '.$y.' do arquivo que esta sendo importado - nao gravado na base de dados--<br><br>.';
        //deixo a variável $verifica com o valor falso, ou seja, não posso gravar!
        $verifica = false;
      }
    }
  }
    private function truncate()
    {
        $comando = BancoDeDados::prepare(self::LIMPAR_TABELA_RESPOSTAS);
        $comando->execute();
    }

    public static function abreArquivo()
    {
        $numeroDeCamposDaTabela = 15;
        $nometmp= $_FILES["arquivo"]["tmp_name"];//Pegar o nome temporário do arquivo a ser importado
        print_r($nometmp);
        if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
          print_r($_FILES["arquivo"]);
        }
        else {
          echo "Erro linha 36";
        }
        if ($nometmp != ""){// se ele não estiver vazio
         	$handle= fopen ($nometmp, "r");//abre
        }else{
          	echo "mesangem de erro";//mostra pra quem ta importando
        }
        /* Separo linha por linha do arquivo, colocando em uma array, onde cada linha  estara em uma chave */
        $linhas = file($nometmp);
        $verifica = true;
        //percorro linha por linha para verificar se esta correto o arquivo
        for ($x=0; $x < count($linhas); $x++){
        	/* separa cada linha em mais um vetor com os dados em cada chave, lembrando que o ";" será o separador dos dados, ou seja, se o arquivo está com ",", no explode deverá ter "," Posteriormente colocaremos aspas, portanto agora removemos as aspas duplas*/
            $linhas[$x] = str_replace('"', '', $linhas[$x]);
           	$dados = explode(';',$linhas[$x]);
            //PRIMEIRA LINHA PODE SER DE CABEÇALHOS E PRECISAMOS NAO INSERI-LA
            //Removendo espaços nos extremos das celulas
            foreach ($dados as $key => $value) {
                $dados[$key] = trim($value);
            }
           	print_r($dados);
        echo "<br>substr_count - ";
        $ffff=substr_count($linhas[$x], ";");
        print_r($ffff);//numero de campos da tabela
        echo "<br>";
            if (substr_count($linhas[$x], ";") == ($numeroDeCamposDaTabela)){
        		//se está correto, coloca eles em uma matriz para que possa gravar mais pra frente
             	$matrizDeDados[] = $dados;
             	/* print_r($dados);
             	echo "<br>";*/
            }else {
             	//tem o número da linha do arquivo
             	$y = $x +1;
             	//mostra  amsg de erro com a linha que está com problema
             	echo 'Erro na linha '.$y.' do arquivo que esta sendo importado - nao gravado na base de dados--<br><br>.';
             	//deixo a variável $verifica com o valor falso, ou seja, não posso gravar!
             	$verifica = false;
             }
        }
        return $dados;
    }
    private function inserir($dados)
    {
        foreach ($dados as $linhas){
          $comando = BancoDeDados::prepare(self::INSERIR);
          $comando->bindParam(1, $this->utf8_decode(addslashes($linhas[0])), PDO::PARAM_STR, 255);
          $comando->bindParam(2, $this->utf8_decode(addslashes($linhas[1])), PDO::PARAM_STR, 255);
          $comando->bindParam(3, $this->utf8_decode(addslashes($linhas[2])), PDO::PARAM_STR, 255);
          $comando->bindParam(4, $this->utf8_decode(addslashes($linhas[3])), PDO::PARAM_STR, 255);
          $comando->bindParam(5, $this->utf8_decode(addslashes($linhas[4])), PDO::PARAM_INT);
          $comando->bindParam(6, $this->utf8_decode(addslashes($linhas[5])), PDO::PARAM_STR, 255);
          $comando->bindParam(7, $this->utf8_decode(addslashes($linhas[6])), PDO::PARAM_STR, 255);
          $comando->bindParam(8, $this->utf8_decode(addslashes($linhas[7])), PDO::PARAM_STR, 255);
          $comando->bindParam(9, $this->utf8_decode(addslashes($linhas[8])), PDO::PARAM_STR, 255);
          $comando->bindParam(10, $this->utf8_decode(addslashes($linhas[9])), PDO::PARAM_STR, 255);
          $comando->bindParam(11, $this->utf8_decode(addslashes($linhas[10])), PDO::PARAM_STR, 255);
          $comando->bindParam(12, $this->utf8_decode(addslashes($linhas[11])), PDO::PARAM_STR, 255);
          $comando->bindParam(13, $this->utf8_decode(addslashes($linhas[12])), PDO::PARAM_STR, 255);
          $comando->bindParam(14,$this->utf8_decode(addslashes($linhas[13])), PDO::PARAM_STR, 255);
          $comando->bindParam(15, $this->utf8_decode(addslashes($linhas[14])), PDO::PARAM_STR, 255);
          $comando->bindParam(16, $this->utf8_decode(addslashes($linhas[15])), PDO::PARAM_STR, 255);
          $comando->execute();
        }
  }
}
