<?php
// definir uma variavel que será a quantidade de campos 
// da tabela e servirá para a verificação
/*
arquivo-salva como - escolher file type como csv e All Format como csv
na janelinhas marcar as opções:
Caracter set como : Western Europe (Windows-1252...)
Field Delimiter  ;  (ponto e virgula)
Text delimiter " (aspas)
*/
//carregando bem lentamente
ob_start(); //Pra segurar o buffer de saída sem enviar
ignore_user_abort(true); //Nao adianta o usuario cancelar a página, pode ser ruim em alguns casos

echo "<html><body>Iniciando upload dos dados as ";
// current time
echo date('h:i:s') . "\n";
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
// current time
echo "<br>Terminou as " . date('h:i:s') . "\n";
//fim carregando lentamente


$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
include '../conectbd.php';

$sqlTruncate_girpesquisaresposta = "TRUNCATE TABLE  1pesquisa"; //para limpar a tabela respostas e atualizar com novos dados
$ressqlTruncate_girpesquisaresposta = mysql_query($sqlTruncate_girpesquisaresposta) or die(mysql_error());

$sql ="SELECT week(NOW()) as semana, year(NOW()) as ano, month(NOW()) as mes";
$res = mysql_query($sql) or die (mysql_error());
$consulta = mysql_fetch_array($res);
//$Semana_Atual = $consulta['semana'];

$Ano_Atual = $consulta['ano'];
$mes = $consulta['mes'];
	$data_dia = date("d");
	$data_mes = date("M");
	$data_ano = date("y");
	$hora=date("H");
	$minutos=date("i");
	$segundos=date("s");
$data_Atual=$data_dia."/".$data_mes."/".$data_ano."-". $hora.":".$minutos.":".$segundos;
$numeroDeCamposDaTabela = 15;

//Pegar o nome temporário do arquivo a ser importado
$nometmp= $_FILES["arquivo"]["tmp_name"];
print_r($nometmp);
if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
print_r($_FILES["arquivo"]);
}
else {
echo "Erro linha 36";
}
/*
echo '<pre>', PHP_EOL;
print_r($_FILES);
echo '</pre>';

*/

// se ele não estiver vazio
if ($nometmp != ""){
	//abre
 	$handle= fopen ($nometmp, "r");
}else{
	//mostra pra quem ta importando
  	echo "mesangem de erro";
}
// Separo linha por linha do arquivo, colocando em uma array, 
// onde cada linhas estara em uma chave
$linhas = file($nometmp);
$verifica = true;



//percorro linha por linha para verificar se esta correto o arquivo
for ($x=0; $x < count($linhas); $x++){
	/**
	 * separa cada linha em mais um vetor com os dados em cada chave, lembrando que o ";" 
	 * será o separador dos dados, ou seja, se o arquivo está com ",", no explode deverá ter ","
	 */
    //Posteriormente colocaremos aspas, portanto agora removemos as aspas duplas
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
print_r($ffff);
echo "<br>";

    if (substr_count($linhas[$x], ";") == ($numeroDeCamposDaTabela)){
		//se está correto, coloca eles em uma matriz para que possa gravar mais pra frente
     	$matrizDeDados[] = $dados;
     	/*
     	print_r($dados);
     	echo "<br>";
	*/
    }else {
     	//tem o número da linha do arquivo
     	$y = $x +1;
     	//mostra  amsg de erro com a linha que está com problema
     	echo 'Erro na linha '.$y.' do arquivo que esta sendo importado - nao gravado na base de dados--<br><br>.';
     	//deixo a variável $verifica com o valor falso, ou seja, não posso gravar!
     	$verifica = false;
     }
}
/*echo "<br>numero de campos da tabela"; echo $numeroDeCamposDaTabela; echo "<br>"; */
//se foi verificado e está tudo ok...
if($verifica)
{
//corre pelas linhas
  foreach ($matrizDeDados as $linhas){
  //monta a sql que será inserida
// $str=$linhas[6];
//addslashes($linhas[6]);
  $sql = "INSERT INTO 1pesquisa (id, ocorrencia_contato_nome, ocorrencia_contato_fone, ocorrencia_solicitante_nome, 
	ocorrencia_solicitante_fone, ocorrencia_ocorrencia_id, cliente_sigla, municipio_nome, total_tempo_gasto, ocorrencia_data_abertura, ocorrencia_data_conclusao, ocorrencia_data_solucao, ocorrencia_execucoes_data_ini, ocorrencia_execucoes_data_fim, funcionario_nome, ocorrencia_execucoes_forma_atendimento_descricao, area_sigla) VALUES 
  ('', '".utf8_decode(addslashes($linhas[0]))."', '".utf8_decode(addslashes($linhas[1]))."','".utf8_decode(addslashes($linhas[2]))."', '".utf8_decode(addslashes($linhas[3]))."', '".utf8_decode(addslashes($linhas[4]))."', '".utf8_decode(addslashes($linhas[5]))."', '".utf8_decode(addslashes($linhas[6]))."', '".utf8_decode(addslashes($linhas[7]))."',  '".utf8_decode(addslashes($linhas[8]))."', '".utf8_decode(addslashes($linhas[9]))."',  '".utf8_decode(addslashes($linhas[10]))."', '".utf8_decode(addslashes($linhas[11]))."','".utf8_decode(addslashes($linhas[12]))."', '".utf8_decode(addslashes($linhas[13]))."', '".utf8_decode(addslashes($linhas[14]))."', '".utf8_decode(addslashes($linhas[15]))."')";
//executa a sql
$Inserem = mysql_query($sql) or die (mysql_error());
	}
}

echo "<br>";
echo $sql;
echo utf8_decode("TODOS OS REGISTROS FORAM INSERIDOS");

echo "<br>";

if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
	if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], "user/".$_FILES["arquivo"]["name"])) {
		echo "Arquivo movido com sucesso";
	}else { echo utf8_decode("Nao foi possivel mover o arquivo<br>");}
} else { echo "Erro"; }

?>
<html>
<head>
   <script type="text/javascript">
      function redirectTime(){
       window.location = "../index_sorteio.php"
      }
   </script>
</head>
<body onLoad="setTimeout('redirectTime()', 4000)">
<h3><? echo utf8_decode("VOCE SERA REDIRECIONADO AGUARDE");
echo "---<br>";?></h3>
</body>
</html>
