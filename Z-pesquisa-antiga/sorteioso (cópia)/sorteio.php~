<?
include '../conectbd.php';
include './01_preparar_para_sorteio.php';
include './amostragem.php';
$ja="nao";
echo "Estamos na semana de ".$Semana_Anterior;

$sql_01 = "SELECT id FROM 1pesquisa_sorteio WHERE WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' LIMIT 1";
$res_01 = mysql_query($sql_01) or die (mysql_error());
$totreg = mysql_num_rows($res_01);
	echo "Estamos na fsdfsdgsfdgdfgdf de ".$Semana_Anterior;
if ($totreg>0 or $ja=="sim") {
	echo utf8_decode("sorteio jah realizado ou pamostragem ja tem gente -- ERROR-GENTE<br>\n");
} else {

	$ToTal_OS_semana = $total_os_da_semana_para_amostra;
	echo "Deu 68----??total os da semana== ".$ToTal_OS_semana. "mas total_os_da_semana=".$total_os_da_semana_para_amostra."<br><br>\n";
	$Array_Total_por_tecnico_Unico = Array();
	$sql_01 = "SELECT tecnico, COUNT(prioriza_tec_unic_atend) AS TotPriori1 FROM 1pesquisa_pamostragem WHERE prioriza_tec_unic_atend = 1 AND WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' AND formaatendimento  LIKE '%Visita%'  GROUP BY tecnico"; 
	$res_01 = mysql_query($sql_01) or die (mysql_error());
	$cont=0;
	while($consulta = mysql_fetch_array($res_01)) {
	  $cont+=$consulta['TotPriori1'];
	  $Array_Total_por_tecnico_Unico[$consulta['tecnico']]=$consulta['TotPriori1'];//guarda total dos técnicos com priori 1.
	  echo "Em armazenamento::".$consulta['tecnico']."::..::".$consulta['TotPriori1']."<br>\n";
	}
	
	$ToTal_OS_individual=$cont*1;//total que atendeu para cada tecnico individual
	$Total_OS_compartilhado=$ToTal_OS_semana-$ToTal_OS_individual;	
	
	$Array_Total_por_tecnico_Colaborativa = Array();
	
	$sql_01 = "SELECT tecnico, COUNT(prioriza_tec_unic_atend) AS TotPriori2 FROM 1pesquisa_pamostragem WHERE 
	prioriza_tec_unic_atend = 2 AND WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' AND formaatendimento  LIKE '%Visita%' GROUP BY tecnico";
	$res_01 = mysql_query($sql_01) or die (mysql_error());
	
	$Total_execucao_Colaborativa=0;//contador
	while($consulta = mysql_fetch_array($res_01)) {
	  $Array_Total_por_tecnico_Colaborativa[$consulta['tecnico']]=$consulta['TotPriori2'];//guarda qtos os/tec com priori 2.
	  $Total_execucao_Colaborativa+=$consulta['TotPriori2'];
	}
	echo "         Total colaborativa.<br>\n";
	foreach ($Array_Total_por_tecnico_Colaborativa as $key => $value) {
	  echo $key .":::".$value."<br>\n";
	}
	echo "  Total_execucao_Colaborativa".$Total_execucao_Colaborativa."   Total_OS_compartilhado".$Total_OS_compartilhado."<br><br>\n";
	foreach ($Array_Total_por_tecnico_Colaborativa as $key => $value) {
	  // echo "tecnico: $key; numero de os: $value<br />\n";
	  $Qtos_ligar_por_tec_Colaborativa = round(($value*1.0/$Total_execucao_Colaborativa)*$Total_OS_compartilhado);
	  //a formula acima se refere a um percentual das execuções que determinado técnico fez sobre as OS colaborativas compartilhadas relacionando ao total de co	  
	  //soma-se as aparições de tecnicos em OS e guarda-se na variavel $Total_execucao_Colaborativa
	  // no vetor $Array_Total_por_tecnico_Colaborativa tem o total de aparicoes de cada tecnico
	  // mas a soma $Total_execucao_Colaborativa é muito maior do que a qtde de OS efetivamente atendidas
	  // daí faz-se o percentual das apariçoes e multiplica pelas OS unicas, referindo=se a uma 'media' de OS para cada um
	  //echo "tecnico: $key; numero de os: $value  Qtde ligar por tec $Qtos_ligar_por_tec <br />\n";
	  $Array_Total_por_tecnico_Colaborativa[$key]=$Qtos_ligar_por_tec_Colaborativa;
	  echo "Colaborativa:::".$key."+++___+++".$Qtos_ligar_por_tec_Colaborativa."<br><br>\n";
	}
	
	
	//juncao dos dois vetores somando-os
	$Array_Total_por_tecnico = array();
	foreach ($Array_Total_por_tecnico_Unico as $key => $value) { //copiando
	    $Array_Total_por_tecnico[$key]=$value;
	}
	echo "         Total QUASE computado.<br>\n";
	foreach ($Array_Total_por_tecnico as $key => $value) {
	  echo $key .":::".$value."<br>\n";
	}
	foreach ($Array_Total_por_tecnico_Colaborativa as $key => $value) { //somando	
	  if (array_key_exists($key, $Array_Total_por_tecnico)) {
		  $Array_Total_por_tecnico[$key]+=$value;
	  } else {
		  $Array_Total_por_tecnico[$key]=$value;
	  }
	}
	echo "         Total computado.<br>\n";
	foreach ($Array_Total_por_tecnico as $key => $value) {
	  echo $key .":::".$value."<br>\n";
	}
	
	//tomando os percentuais dos atendimentos sobre o valor da amostragem
	$soma=0;
	$Array_Total_por_tecnico_percent = array();
	//para encher o array com todos os tecnicos que trabalharam na semana, chutando um atendimento para cada um na semana. Queremos pegar o tec que so atendeu compartilhado
	$sql_01Aray = "SELECT DISTINCT tecnico FROM 1pesquisa_pamostragem WHERE WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "'"; 
	$res_01Aray = mysql_query($sql_01Aray) or die (mysql_error());
	while($consultaAray = mysql_fetch_array($res_01Aray)) {
	    $Array_Total_por_tecnico_percent[$consultaAray['tecnico']] = 1;
	}
	foreach ($Array_Total_por_tecnico as $key => $value) { //fazendo percentual sobre o 58/68
	    $Qtos_ligar_por_tec=round(($value*$qtde_de_OS_p_ligar)/$total_os_da_semana_para_amostra);
	    $Array_Total_por_tecnico_percent[$key] = $Qtos_ligar_por_tec;
	    $soma += $Qtos_ligar_por_tec;
	}
	
	echo "         Total percent antes dos ajustes.<br>\n";
	foreach ($Array_Total_por_tecnico_percent as $key => $value) {
	  echo $key .":::".$value."<br>\n";
	}
	//print_r($Array_sorteio_tecnico);
	$Sobrou_Passou=$soma-$qtde_de_OS_p_ligar;
	if ($Sobrou_Passou>0) {
		//passou... Vamos pegar maiores e tirar um de cada ateh o limite qtde_de_OS_p_ligar
		arsort($Array_Total_por_tecnico_percent); //ordena pelo maior
		foreach ($Array_Total_por_tecnico_percent as $key => $value) {
			//echo "$key = $value\n";
			$Array_Total_por_tecnico_percent[$key]=$value-1;
			$Sobrou_Passou --;
			if ($Sobrou_Passou==0) {
				break;
			}
		}
	} elseif($Sobrou_Passou<0) {
		//faltou
		asort($Array_Total_por_tecnico_percent); // ordenar pelo menor
		foreach ($Array_Total_por_tecnico_percent as $key => $value) {
			//echo "$key = $value\n";
			if ($Array_Total_por_tecnico[$key]<=$value){
					continue;//pegue o proximo tecnico pois este nao tem mais o que pegar
			} else {
				$Array_Total_por_tecnico_percent[$key]=$value+1;
				$Sobrou_Passou ++;
				if ($Sobrou_Passou==0) {
					break;
				}
			}
		}
	}
	
	echo "       Total percent DEPOIS dos ajustes.<br>\n";
	foreach ($Array_Total_por_tecnico_percent as $key => $value) {
	  echo $key .":::".$value."<br>\n";
	}
	$sql_01 = "SELECT * FROM 1pesquisa_pamostragem WHERE prioriza_tec_unic_atend = 1 AND WEEK(datafim)='" . $Semana_Anterior . "' 
	AND YEAR(datafim)='" . $Ano_Atual . "' AND formaatendimento  LIKE '%Visita%' ";
	$res_01 = mysql_query($sql_01) or die (mysql_error());
	$Qtde_contatos_deixados_fora=0;
	while($consulta = mysql_fetch_array($res_01)) {
	  $consulta['pesquisadasimnao']=0;
   
		      $Array_Total_por_tecnico_percent[$consulta['tecnico']]--;
		      //insert na tabela sorteio... Tecnico por tecnico olhando o array e diminuindo a contagem, array possui a info de qtas amostras do tec em questao
		      $Sql="INSERT INTO 1pesquisa_sorteio VALUES (";
		      $Sql .= "'', "; 
		      $Sql .= "'".$consulta['pesquisa']. "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['contato'])). "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['telefone'])). "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['solicitante_nome'])). "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['solicitante_fone'])). "', ";
		      $Sql .= "'".$consulta['ndeocorrencia']. "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['cliente'])). "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['cidade'])). "', ";
		      $Sql .= "'".$consulta['tempoatendimento']. "', ";
		      $Sql .= "'".$consulta['dataabertura']. "', ";
		      $Sql .= "'".$consulta['dataconclusao']. "', ";
		      $Sql .= "'".$consulta['datainicio']. "', ";
		      $Sql .= "'".$consulta['datafim']. "', ";
		      $Sql .= "'".mysql_real_escape_string(stripslashes($consulta['tecnico'])). "', ";
		      $Sql .= "'".$consulta['formaatendimento']. "', ";
		      $Sql .= "'".$consulta['executor']."')";
		      mysql_query($Sql) or die (mysql_error());

	    //  } 
	}
	// falta ver se faltou ---- Vamos fazer o algoritmo guloso
	// verificar se ocorre que algum tecnico ainda precisa ser alimnentado com OS
	foreach ($Array_Total_por_tecnico_percent as $tecnico => $value) {
	  if ($value == 1){
	   echo "Faltou OS única pro tecnico";
	   echo "<br>\n";
	   ?><?
	   echo $tecnico;
	   
	   ?> <? echo "--técnico com o.s. compartilhadas<br>"; 
	  
	  
		  //    $Sql="INSERT INTO sorteio_so_compartilhada VALUES (";
		    //  $Sql .= "'', "; 
		   //   $Sql .= "'".$Semana_Atual. "', ";
		   //   $Sql .= "'".$Ano_Atual. "', ";
		   //   $Sql .= "'".$tecnico. "', ";
		      //echo $Sql;
		//      mysql_query($Sql) or die (mysql_error());
	      }
	  //
	  }//foreach	  
	  echo $Qtde_contatos_deixados_fora;
	  echo utf8_decode("SORTEIO REALIZADO COM SUCESSO - Foram deixados $Qtde_contatos_deixados_fora contatos de fora");
}// fim do else láaaaa de cima
?>
<html>
<head>
   <script type="text/javascript">
      function redirectTime(){
       window.location = "../index_sorteio.php"
      }
   </script>
</head>
<body onLoad="setTimeout('redirectTime()', 2000)">
<h3><? echo utf8_encode("VOCE SERA REDIRECIONADO AGUARDE");
echo "---<br>";?></h3>
</body>
</html>
