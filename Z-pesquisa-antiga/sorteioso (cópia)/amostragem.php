<?
include '../conectbd.php';
//$sql_01 = "SELECT * from 1pesquisa_pamostragem WHERE WEEK(datafim)=30 AND YEAR(datafim)=2013 AND formaatendimento LIKE '%Visita%' ORDER BY ndeocorrencia DESC";
$res_01 = mysql_query($sql_01) or die("Falha no comando sql");
$totreg_01 = mysql_num_rows($res_01); //TODAS AS DEMAIS EXECUÇÕES TÉCNICAS sem adm e sem deslocamento
echo $totreg_01;
$SQLtotalOSamostra = "SELECT tecnico, COUNT(prioriza_tec_unic_atend) AS TotPriori1, count(distinct ndeocorrencia) as total_os_da_semana FROM 1pesquisa_pamostragem WHERE prioriza_tec_unic_atend = 1 AND WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' AND formaatendimento  LIKE '%Visita%'  ORDER BY datafim DESC";
$REStotalOSamostra = mysql_query($SQLtotalOSamostra) or die (mysql_error());
//$REStotalOSamostra = mysql_db_query("phpcele", "$SQLtotalOSamostra", $conn);
$CONSULTAtotalOSamostra = mysql_fetch_array($REStotalOSamostra);
$SQLdeate = "SELECT tecnico, COUNT(prioriza_tec_unic_atend) AS TotPriori1, Max(datafim) as ate, Min(datafim) as de, count(ndeocorrencia) as total_os_da_semana FROM 1pesquisa_pamostragem WHERE prioriza_tec_unic_atend = 1 AND  WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' AND formaatendimento  LIKE '%Visita%'  ORDER BY datafim DESC";
			$RESdeate = mysql_query($SQLdeate) or die (mysql_error());
			//$RESdeate = mysql_db_query("phpcele", "$SQLdeate", $conn);
			$CONSULTAdeate = mysql_fetch_array($RESdeate);
			$de_e=strtotime($CONSULTAdeate['de']);
			$ate_e=strtotime($CONSULTAdeate['ate']);
			$de=date('d/m', $de_e);
			$ate=date('d/m/Y', $ate_e);
			
$SQLdeate = "SELECT tecnico, COUNT(prioriza_tec_unic_atend) AS TotPriori1, Max(date_format(datafim, '%d/%m/%Y')) as ate, Min(date_format(datafim, '%d/%m')) as de, count(ndeocorrencia) as total_os_da_semana FROM 1pesquisa_pamostragem WHERE prioriza_tec_unic_atend = 1 AND WEEK(datafim)='" . $Semana_Atual . "' AND YEAR(datafim)='" . $Ano_Atual . "' AND formaatendimento  LIKE '%Visita%'  ORDER BY datafim DESC";
			//$RESdeate = mysql_db_query("phpcele", "$SQLdeate", $conn);
			$RESdeate = mysql_query($SQLdeate) or die (mysql_error());
			$CONSULTAdeate = mysql_fetch_array($RESdeate);
			$de_atual=$CONSULTAdeate['de'];
			$ate_atuall=$CONSULTAdeate['ate']+4;
			$ate_atual=$ate_atuall;
				//Tecnicos realizar na semana atual ligações para o.s. da semana anterior
				//$total_os_da_semana = $CONSULTAtotalOSamostra['total_os_da_semana']; //considera todas incluindo tecnico logado
				//$total_os_da_semana = 608; //para tamanho 608 a amostra eh 236
				//Amostragem. Calcular tamanho da amostra para a semana anterior.
				$total_os_da_semana = $totreg_01;//TODAS AS DEMAIS EXECUÇÕES TÉCNICAS sem adm e sem deslocamento
				$total_os_da_semana_para_amostra = $CONSULTAtotalOSamostra['total_os_da_semana'];
				$nivel_confianca=0.95;    //Nivel de confianca	0,95
				$p=0.5;          //P_ESTIMADO	50% = 0,5  ---50%*(1-50%)
				$erro_amostral=0.05;
				$erropginicialshow=$erro_amostral*100;
				//Margem de erro (+ ou -)	5%   ---> 0.05/2
				$erro=$erro_amostral*$erro_amostral;
				$z=1.96;   //Z	1,96  ---> =NORMSINV(number) number = (p estimado+[Nivel de confiança/2])//(z^2*(p*(1-p))/erro^2)
				$Z=$z*$z;
				$n=($Z*($p*(1-$p))/$erro);
				//02. 	QTDE DE LIGAÇÕES	236   ceil=arredondar_para_cima				
				$qtde_de_OS_p_ligar=ceil(($n*$total_os_da_semana_para_amostra)/($n+$total_os_da_semana_para_amostra-1)); 
				echo "<br>qtde_de_OS_p_ligar - AMOSTRA PARA ESTA SEMANA ";
				//echo $qtde_de_OS_p_ligar;	
				$TMULS=($n*$total_os_da_semana_para_amostra)/($n+$total_os_da_semana_para_amostra-1)/5;
			//dados para pesquisaresumo.php
			$TotalMinUserLigarSemana=ceil($TMULS); //meleca esta mostrando uma casa decimal 6.6
			$totalMINgrupoDeveVerificar=$qtde_de_OS_p_ligar;  // $totalMINgrupoDeveVerificar=$tamanho_da_amostra
			$TotalLigJAFeitasGrupo=0; //$TotalLigJAFeitasGrupo=cont(coluna pesquisadasimnao=1 AND fazpartedaamostra=ok)
			$TotalLigFeitasUser=0; //$TotalLigFeitasUser=$TotalLigFeitasGrupo - $TotalMinUserLigarSemana);			
			$TotalMinUserLigarSemana=0;
//
	$SQLtotalOSamostra_adm = "SELECT * from 1pesquisa WHERE WEEK(ocorrencia_data_abertura)='" . $Semana_Anterior . "' AND YEAR(ocorrencia_data_abertura)='" . $Ano_Atual . "' ORDER BY ocorrencia_ocorrencia_id DESC";
	//$REStotalOSamostra_adm = mysql_db_query("phpcele", "$SQLtotalOSamostra_adm", $conn);
	$REStotalOSamostra_adm = mysql_query($SQLtotalOSamostra_adm) or die (mysql_error());
	$CONSULTAtotalOSamostra_adm = mysql_fetch_array($REStotalOSamostra_adm);
	$totreg_01_adm = mysql_num_rows($REStotalOSamostra_adm);//EXECUÇÕES INCLUINDO ADMINISTRATIVA
//a preferencia na escolha da o.s. é para quando o técnico atendeu a o.s. sozinho

/*//id's editados (que ja responderam a pesquisa) possuem valor 1
//selecionando variaveis. Sql para mostrar qtde de ordens de serviço da semana passada. Amostragem...
//include "./login/valida_session.php";
distinct numero de o.s.
id, erro_amostral , nivel_confianca, populacao, tamanho_da_amostra, semana
n=[N.Z².p(1-p)] / [z^2.p(1-p)+e² (N-1)]
n - Amostra calculada
N - população
Z - Variável normal padronizada relacionada ao nível de confiança
p - verdadeira probabilidade do evento
e - erro amostral
*/
?>
<html>
<body>
<table>
<tr>
<td>
<br>Total_os_da_semana <? echo $total_os_da_semana; ?>
<br>total_os_da_semana_para_amostra <? echo $total_os_da_semana_para_amostra; ?>
<??>
</td></tr></table></body></html>
