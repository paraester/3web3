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

for ($i=0; $i<1; $i++)
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

$SqlSemanaAtual ="SELECT week(NOW()) as semana, year(NOW()) as ano, month(NOW()) as mes";
$resSemanaAtual = mysql_query($SqlSemanaAtual) or die (mysql_error());
$consultaSemanaAtual = mysql_fetch_array($resSemanaAtual);
$Semana_Atual_Pesquisa = $consultaSemanaAtual['semana'];

$Ano_Atual = $consultaSemanaAtual['ano'];
$mes = $consultaSemanaAtual['mes'];
	$data_dia = date("d");
	$data_mes = date("M");
	$data_ano = date("y");
	$hora=date("H");
	$minutos=date("i");
	$segundos=date("s");
$data_Atual=$data_dia."/".$data_mes."/".$data_ano."-". $hora.":".$minutos.":".$segundos;
//PesquisaAtual - Vai selecionar a ultima semana com base no ano atual.
$sqlPesquisa ="SELECT IFNULL( MAX(Semana), 0 ) as UltimaPesquisa FROM 1pesquisaresposta WHERE Ano='" . $Ano_Atual . "' ";
$resPesquisa = mysql_query($sqlPesquisa) or die (mysql_error());
$consultaPesquisa = mysql_fetch_array($resPesquisa);
$Num_Pesquisa = $consultaPesquisa['UltimaPesquisa'];
echo $Num_Pesquisa;
$PesquisaAtual = $Num_Pesquisa+1;   //quatro pesquisas por ano

//UMA VERIFICACAO AQUI PARA QUE NAO SEJA POSSIVEL INSERIR A PLANILHA ENVIADA MAIS DE 1 VEZ
$ja="nao";
echo "<BR><BR>Estamos na semana ".$Semana_Atual_Pesquisa;
$sql_01 = "SELECT id FROM 1pesquisa_amostras_enviadas WHERE semana='" . $Semana_Atual_Pesquisa . "' AND ano='" . $Ano_Atual . "' LIMIT 1";
$res_01 = mysql_query($sql_01) or die (mysql_error());
$totreg = mysql_num_rows($res_01);
	echo "<BR>";
if ($totreg>0 or $ja=="sim") {
	echo utf8_decode("<br><br>JA TEMOS DADOS PARA ESTA SEMANA - ISTO EH ESTA PLANILHA JA FOI CADASTRADA ANTES --<br><br>\n");
} else {


$numeroDeCamposDaTabela = 9;

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
  	echo "mensagem de erro";
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
//echo "<br>substr_count ddd- ";
$ffff=substr_count($linhas[$x], ";");
//print_r($ffff);
//echo "<br>";

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
$sql = "INSERT INTO 1pesquisa_amostras_enviadas (id, semana, num_pesquisa, ano, soc, regional, cidade, tel_resid, tel_com, contato) VALUES ('', '$Semana_Atual_Pesquisa', '$PesquisaAtual', '$Ano_Atual', '".utf8_decode($linhas[0])."', '".utf8_decode($linhas[1])."', '".utf8_decode($linhas[2])."', '".utf8_decode($linhas[3])."', '".utf8_decode($linhas[4])."', '".utf8_decode($linhas[9])."')";
//executa a sql
echo $sql;
$Inserem = mysql_query($sql) or die (mysql_error());

	}
}
echo "<br>queeeeee isso";

echo "TODOS OS REGISTROS FORAM INSERIDOS";

echo "<br>";

if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
	if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], "user/".$_FILES["arquivo"]["name"])) {
		echo "Arquivo movido com sucesso";
	}else { echo utf8_decode("Nao foi possivel mover o arquivo<br>");}
} else { echo "Erro"; }
//abaixo as linhas do cabecalho da tabela sao deletadas
$sql_01 = "SELECT * FROM 1pesquisa_amostras_enviadas WHERE soc LIKE '%PERIODO DE%' or soc LIKE  '%CELEPAR%' or soc LIKE '%SOC'";
	$res_01 = mysql_query($sql_01) or die (mysql_error());
	while($consulta = mysql_fetch_array($res_01)) {
	    $id = $consulta['id'];
	    $SqlDeletarACoisaQue = "DELETE FROM 1pesquisa_amostras_enviadas WHERE 1pesquisa_amostras_enviadas.id = $id";
	    mysql_query($SqlDeletarACoisaQue) or die (mysql_error());
	}

//abaixo as linhas do cabecalho da tabela sao deletadas '" . $Semana_Atual_Pesquisa . "'
$sql_02 = "SELECT DISTINCT contato FROM 1pesquisa_amostras_enviadas WHERE num_pesquisa ='" . $PesquisaAtual. "' AND semana ='" . $Semana_Atual_Pesquisa. "'";
	$res_02 = mysql_query($sql_02) or die (mysql_error());
	while($consulta2 = mysql_fetch_array($res_02)) {
	  $CONTATOFIXADO= $consulta2['contato'];	
	  $sql_03 = "SELECT DISTINCT * FROM 1pesquisa_amostras_enviadas WHERE contato='".$CONTATOFIXADO."' AND num_pesquisa ='" . $PesquisaAtual. "' AND semana ='" . $Semana_Atual_Pesquisa. "'";
	  $res_03 = mysql_query($sql_03) or die (mysql_error());
	  $consulta3 = mysql_fetch_array($res_03);
	  $SqlInsertContatos = "INSERT INTO 1PESQUISACONTATOS (id, SOC, REGIONAL, CIDADE, TELRESID, TELCOM, STATUS1, STATUS2, STATUS3, STATUS4, CONTATO) VALUES ('', '".$consulta3['regional']."', '".$consulta3['cidade']."', '".$consulta3['tel_resid']."', '".$consulta3['tel_com']."', '".$consulta3['tel_resid']."', '$Semana_Atual_Pesquisa', '$PesquisaAtual', '$Ano_Atual', '', '".$consulta3['contato']."')";
	  $InseremSqlInsertContatos = mysql_query($SqlInsertContatos) or die (mysql_error());
	}//fim do while consulta2 do sql_02
	
}//FIM DO ELSE LA DE CIMA
?>
<html>
<head>
   <script type="text/javascript">
      function redirectTime(){
       window.location = "../index_sorteio.php"
      }
   </script>
</head>
<body onLoad="setTimeout('redirectTime()', 5000)">
<h3><? echo utf8_decode("VOCE SERA REDIRECIONADO AGUARDE");
echo "---<br>";?></h3>
</body>
</html>
