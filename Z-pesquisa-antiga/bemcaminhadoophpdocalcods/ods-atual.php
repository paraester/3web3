<?php
$ArqCabecalho = "/var/www/pesquisa/sorteioso/arquivoModelo.ods";
$ArqNovo = "/tmp/newODS.ods";



/******************************** INICIO DAS FUNCOES *********************************/
function CopiaCabecalhoDoOutroArquivo($ArqCabecalho, $testinho_a_trocar)
{
    //Iniciar classe de fun��es para manipular arquivos zip
    $zip = new ZipArchive;        
    //agora temos funcoes varias funcoes em zip        
    
    // primeira funcao � open com $zip->open(arquivo, opcionais)
    $res = $zip->open($ArqCabecalho, ZipArchive::CREATE); // Abre o arquivo de template
    
    //agora tentamos pegar o conteudo do arquivos interno "content.xml"
    $ArqConteudo = $zip->getStream("content.xml"); // Abre o Conteudo do arquivo content.xml
    if( !$ArqConteudo ) exit("Nao conseguimos abrir o arquivo ".$ArqCabecalho."\n");
    
    $TextoDaLeitura = stream_get_contents($ArqConteudo);
    $TextoDaLeitura = str_replace('PERIODO DE LIGA��ES: DE 23/04 AT� 26/04', 'PERIODO DE LIGA��ES: DE '. $testinho_a_trocar, $TextoDaLeitura);
    fclose($ArqConteudo);
    $zip->close();
        
    // Pega o conte�do XML e passa ao objeto DOM para interpretacao do xml e tem varias outras funcoes
    $InterpretaXml = new DOMDocument();
    $InterpretaXml->loadXML($TextoDaLeitura);
    
    return $InterpretaXml;
}


function GravaUmaCelula($textocelula, $cor)
{
    /******** CELULAS entrada-saida  *******************/
    global $CabecalhoCopiado, $NovaLinhaPlanilha

    $TxtCelula = $CabecalhoCopiado->createElement("text:p",$textocelula); //valor visivel na celula sempre com 'text:p'
    $EstruturaCelula = $CabecalhoCopiado->createElement("table:table-cell"); //cria estrutura da celula
    $EstruturaCelula->setAttribute("table:style-name", $cor); //Qual o tipo de estilo para esta celula
    $EstruturaCelula->setAttribute("table:default-cell-style-name", $cor);

    $EstruturaCelula->appendChild($TxtCelula); //adiciona o texto nesta estrutura da celula
        
    $NovaLinhaPlanilha->appendChild($EstruturaCelula); //adiciona esta celula na Nova linha
}


/******************************** FIM DAS FUNCOES *********************************/

$CabecalhoCopiado = CopiaCabecalhoDoOutroArquivo($ArqCabecalho); //variavel global, nao mudar o nome
$TabelasPlanilha = $CabecalhoCopiado->getElementsByTagName("table");
$PlanilhaAmostra = $TabelasPlanilha->item(1); //planilha3 eh item(2) etc


include '../conectbd.php';
$Semana_Atual = date("W"); //pegar semana atual
include './Semana_Atual.php';
$SQLID = "SELECT *, date_format(dataabertura, '%d/%m/%Y' ) as DataAbertura FROM 1pesquisa_sorteio WHERE 
WEEK(dataabertura)='" . $Semana_Anterior . "' AND YEAR(dataabertura)='" . $Ano_Atual . "' 
AND contato NOT LIKE '' ORDER BY executor"; 
$res_01 = mysql_query($SQLID) or die("Falha no comando sql linha 48"); 
$totreg = mysql_num_rows($res_01);

$contador=0;
while($consulta = mysql_fetch_array($res_01)) { $contador++;

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
echo "Terminamos com sucesso";

?>

