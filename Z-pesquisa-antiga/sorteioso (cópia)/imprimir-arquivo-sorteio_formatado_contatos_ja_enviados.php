<?php
$ArqParaUrl = "AMOSTRAGENS_DICAC/newODSModelo_Contatos.ods";
$ArqCabecalho = "/var/www/pesquisa/sorteioso/Arquivo_Modelo_Contatos.ods";
$ArqNovo = "/var/www/pesquisa/sorteioso/$ArqParaUrl";
//echo $ArqNovo;
/******************************** INICIO DAS FUNCOES *********************************/
function CopiaCabecalhoDoOutroArquivo($ArqCabecalho, $testinho_a_trocar)
{
    //Iniciar classe de funções para manipular arquivos zip
    $zip = new ZipArchive;        
    //agora temos funcoes varias funcoes em zip        
    // primeira funcao é open com $zip->open(arquivo, opcionais)
    $res = $zip->open($ArqCabecalho, ZipArchive::CREATE); // Abre o arquivo de template
    //agora tentamos pegar o conteudo do arquivos interno "content.xml"
    $ArqConteudo = $zip->getStream("content.xml"); // Abre o Conteudo do arquivo content.xml
    if( !$ArqConteudo ) exit("Nao conseguimos abrir o arquivo ".$ArqCabecalho."\n");
    $TextoDaLeitura = stream_get_contents($ArqConteudo);
    $TextoDaLeitura = str_replace('PERIODO DE LIGAÇÕES: DE / ATÉ /', 'PERIODO DE LIGAÇÕES: DE '. $testinho_a_trocar, $TextoDaLeitura);
    fclose($ArqConteudo);
    $zip->close();
    // Pega o conteúdo XML e passa ao objeto DOM para interpretacao do xml e tem varias outras funcoes
    $InterpretaXml = new DOMDocument();
    $InterpretaXml->loadXML($TextoDaLeitura);
    return $InterpretaXml;
}
function GravaUmaCelula($textocelula, $cor)
{
    /******** CELULAS entrada-saida  *******************/
    global $CabecalhoCopiado, $NovaLinhaPlanilha;
    // Order of replacement
    $order   = array("\r\n", "\n", "\r");
    $replace = ' ';
    // Processes \r\n's first so they aren't converted twice.
    $textocelula = str_replace($order, $replace, $textocelula);
    $textocelula = preg_replace('/[ ]+/',' ',$textocelula);    // Strip off multiple spaces
    //teste para problema com acentos    
    //$textocelula = preg_replace('/[^A-Za-z0-9]+/',' ',$textocelula);    
    $textocelula = utf8_encode($textocelula);    
    // teste feito para ver se o problema estava nos acentos
    $TxtCelula = $CabecalhoCopiado->createElement("text:p",$textocelula); //valor visivel na celula sempre com 'text:p'
    $EstruturaCelula = $CabecalhoCopiado->createElement("table:table-cell"); //cria estrutura da celula
    $EstruturaCelula->setAttribute("table:style-name", $cor); //Qual o tipo de estilo para esta celula
    $EstruturaCelula->setAttribute("table:default-cell-style-name", $cor);
    $EstruturaCelula->appendChild($TxtCelula); //adiciona o texto nesta estrutura da celula 
    $NovaLinhaPlanilha->appendChild($EstruturaCelula); //adiciona esta celula na Nova linha
}


/******************************** FIM DAS FUNCOES *********************************/
$testinho_a_trocar ="  /11 ATÉ   /11";
$CabecalhoCopiado = CopiaCabecalhoDoOutroArquivo($ArqCabecalho, $testinho_a_trocar); //variavel global, nao mudar o nome
$TabelasPlanilha = $CabecalhoCopiado->getElementsByTagName("table");
$PlanilhaAmostra = $TabelasPlanilha->item(1); //planilha3 eh item(2) etc

include '../conectbd.php';
$Semana_Atual = date("W"); //pegar semana atual
include './Semana_Atual.php';

//PesquisaAtual - Vai selecionar a ultima semana com base no ano atual.
$sqlPesquisa ="SELECT IFNULL( MAX(Semana), 0 ) as UltimaPesquisa FROM 1pesquisaresposta WHERE Ano='" . $Ano_Atual . "' ";
$resPesquisa = mysql_query($sqlPesquisa) or die (mysql_error());
$consultaPesquisa = mysql_fetch_array($resPesquisa);
$Num_Pesquisa = $consultaPesquisa['UltimaPesquisa'];
$PesquisaAtual = $Num_Pesquisa+1;   //quatro pesquisas por ano

$SqlSemanaAtual ="SELECT week(NOW()) as semana, year(NOW()) as ano, month(NOW()) as mes";
$resSemanaAtual = mysql_query($SqlSemanaAtual) or die (mysql_error());
$consultaSemanaAtual = mysql_fetch_array($resSemanaAtual);
$Semana_Atual_Pesquisa = $consultaSemanaAtual['semana'];
$Ano_Atual = $consultaSemanaAtual['ano'];

	 $Sql_Tirar_semana1 = "SELECT IFNULL(MIN(semana), 0 ) as RetirarEstaSemana FROM 1pesquisa_amostras_enviadas WHERE Ano='" . $Ano_Atual . "' AND num_pesquisa='" . $PesquisaAtual . "'";
	 $res_Tirar_semana1 = mysql_query($Sql_Tirar_semana1) or die("Falha no comando Sql_amostrasd");
	 $consulta_Tirar_semana1 = mysql_fetch_array($res_Tirar_semana1);
	 $totreg_Tirar_semana1 = mysql_num_rows($res_Tirar_semana1);
	 $RetirarEstaSemana = $consulta_Tirar_semana1['RetirarEstaSemana'];
	 echo "este semana será retirada===";echo $RetirarEstaSemana; echo "<br>";

$SQLID = "SELECT *, date_format(datafim, '%d/%m/%Y') as DataAbertura FROM 1pesquisa_sorteio WHERE WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' ORDER BY executor";
$res_01 = mysql_query($SQLID) or die("Falha no comando sql linha 59"); 
$totreg = mysql_num_rows($res_01);
$contador=0;
while($consulta = mysql_fetch_array($res_01)) { $contador++;
	 $Contato = $consulta['contato'];
	 $Contato_Solicitante = $consulta['solicitante_nome'];
	 
	 echo "Contato do Sorteio:"; echo $Contato; echo "--Contato_Solicitante==";echo $Contato_Solicitante;echo "<br><br>";
	 
	/**************** NOVA LINHA PARA ESTE DIA DO MES *******************************************/
	    $NovaLinhaPlanilha = $CabecalhoCopiado->createElement("table:table-row"); // cria uma nova linha
	/**************** NOVA LINHA PARA ESTE DIA DO MES *******************************************/
	//"SELECT contato FROM 1pesquisa_amostras_enviadas WHERE num_pesquisa='" . $PesquisaAtual . "' AND ano='" . $Ano_Atual . "' AND contato='" . $Contato . "' AND semana NOT LIKE '" . $RetirarEstaSemana . "'";
	 $Sql_amostras = "SELECT contato FROM 1pesquisa_amostras_enviadas WHERE ano='" . $Ano_Atual . "' AND contato='" . $Contato . "'";
	 $res_amostras = mysql_query($Sql_amostras) or die("Falha no comando Sql_amostras");
	 $consulta_amostras = mysql_fetch_array($res_amostras);
	 $totreg_amostras_enviadas = mysql_num_rows($res_amostras);
	 echo $totreg_amostras_enviadas;
	  
	 $Sql_amostras2 = "SELECT contato FROM 1pesquisa_amostras_enviadas WHERE ano='" . $Ano_Atual . "' AND contato='" . $Contato_Solicitante . "'";
	 $res_amostras2 = mysql_query($Sql_amostras2) or die("Falha no comando Sql_amostras");
	 $consulta_amostras2 = mysql_fetch_array($res_amostras2);

	 $Contato_Enviado = $consulta_amostras['contato'];
	 $Contato_Sol_enviado = $consulta_amostras2['contato'];
	 
	 echo "==Contato Enviado anterior"; echo $Contato_Enviado;echo "<br>";

    if ($contador%2){
	    $cor='ce1';
	  } else {  $cor='ce2'; 
    }
     if ($Contato=$Contato_Enviado or $Contato_Solicitante=$Contato_Enviado) {
	    	$cor='ce3';
    }
	      GravaUmaCelula($consulta['ndeocorrencia'], $cor);
	      GravaUmaCelula($consulta['executor'], $cor);  
	      GravaUmaCelula($consulta['cidade'], $cor);
	      GravaUmaCelula($consulta['telefone'], $cor);
	      GravaUmaCelula($consulta['solicitante_fone'], $cor);
	      GravaUmaCelula('', $cor);
	      GravaUmaCelula('', $cor);
	      GravaUmaCelula('', $cor);
	      GravaUmaCelula('', $cor);
	      GravaUmaCelula($consulta['contato'], $cor);
	      GravaUmaCelula($consulta['solicitante_nome'], $cor);
	      //ao final de preenchermos a linha mandamos adicionar a linha na tabela
	$PlanilhaAmostra->appendChild($NovaLinhaPlanilha);
	 } // fim while // ------------------------------------------------- exibindoo -----------

// copie o arquivo modelo para o novo arquivo
if ( copy($ArqCabecalho, $ArqNovo) ){
	echo "Copiado com sucesso<br>\n";
} else {
	echo "erro ao tentar copiar o arquivo";
}
$conteuNovoXml = $CabecalhoCopiado->saveXML();
$zip = new ZipArchive;
$res = $zip->open($ArqNovo, ZipArchive::CREATE);
if ($res === TRUE) {
    $zip->addFromString('content.xml', $conteuNovoXml);
    $zip->close();

} else {
  echo "erro ao tentar abrir zipado o arquivo";
}
echo "Terminamos com sucesso. Abra o arquivo! Voce sera redirecionado para o home";

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
<h3><? echo utf8_encode("VOCE SERA REDIRECIONADO AGUARDE");
echo "---<br>";?></h3>

<iframe width='200' height='200' frameborder='0' src='abrir_ods_contatos_ja_enviados.html'></iframe>
</body>
</html>
