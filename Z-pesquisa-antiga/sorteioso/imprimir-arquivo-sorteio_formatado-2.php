<?php
$ArqParaUrl = "AMOSTRAGENS_DICAC/newODSModelo.ods";
$ArqCabecalho = "/var/www/pesquisa/sorteioso/ArqModelo.ods";
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
$testinho_a_trocar ="26/08 ATÉ 30/08";
$CabecalhoCopiado = CopiaCabecalhoDoOutroArquivo($ArqCabecalho, $testinho_a_trocar); //variavel global, nao mudar o nome
$TabelasPlanilha = $CabecalhoCopiado->getElementsByTagName("table");
$PlanilhaAmostra = $TabelasPlanilha->item(1); //planilha3 eh item(2) etc

include '../conectbd.php';
$Semana_Atual = date("W"); //pegar semana atual
include './Semana_Atual.php';
$SQLID = "SELECT *, date_format(datafim, '%d/%m/%Y') as DataAbertura FROM 1pesquisa_sorteio WHERE WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' ORDER BY executor";
$res_01 = mysql_query($SQLID) or die("Falha no comando sql linha 59"); 
$totreg = mysql_num_rows($res_01);
$contador=0;
while($consulta = mysql_fetch_array($res_01)) { $contador++;

	    //COLOCANDO A RESTRICAO/CORES PARA LIGAR PARA UM USUÁRIO DA SEMANA PASSADA




	    //FIM COLOCANDO A RESTRICAO/CORES PARA LIGAR PARA UM USUÁRIO DA SEMANA PASSADA

    /**************** NOVA LINHA PARA ESTE DIA DO MES *******************************************/
    $NovaLinhaPlanilha = $CabecalhoCopiado->createElement("table:table-row"); // cria uma nova linha
    /**************** NOVA LINHA PARA ESTE DIA DO MES *******************************************/

    if ($contador%2){
	    $cor='ce1'; 
    } else {
	    $cor='ce2'; 
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
    GravaUmaCelula($consulta['tecnico'], $cor);
    GravaUmaCelula($consulta['datainicio'], $cor);
    GravaUmaCelula($consulta['cliente'], $cor);


    //ao final de preenchermos a linha mandamos adicionar a linha na tabela
    $PlanilhaAmostra->appendChild($NovaLinhaPlanilha);
}  // fim while // ------------------------------------------------- exibindoo -----------

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

<iframe width='200' height='200' frameborder='0' src='abrir_ods.html'></iframe>
</body>
</html>
