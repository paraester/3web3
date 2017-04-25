<?
/* este arquivo preenche a tabela padrao 1pesquisa_pamostragem */
//include "./login/valida_session.php";
include '../conectbd.php';
//não será mais utilizado a funcao date do PHP pois para o mysql as semanas são contadas diferentemente. Ex.: semana 0, semana 1 e semana 2 são para o mysql enquanto para o php seria semana 1, semana 2 e semana 3

include './Semana_Atual.php'; 


$sql ="SELECT week(NOW()) as semana, year(NOW()) as ano, month(NOW()) as mes";
$res = mysql_query($sql) or die (mysql_error());
$consulta = mysql_fetch_array($res);
$Ano_Atual = $consulta['ano'];
$mes = $consulta['mes'];
	$data_dia = date("d");
	$data_mes = date("M");
	$data_ano = date("y");
	$hora=date("H");
	$minutos=date("i");
	$segundos=date("s");
$data_Atual=$data_dia."/".$data_mes."/".$data_ano."-". $hora.":".$minutos.":".$segundos;

//Semana - Vai selecionar a ultima semana com base no ano atual.
$sqlSemana ="SELECT IFNULL( MAX( Semana ), 0 ) as UltimaPesquisa FROM 1pesquisaresposta WHERE Ano='" . $Ano_Atual . "' ";
$resSemana = mysql_query($sqlSemana) or die (mysql_error());
$consultaSemana = mysql_fetch_array($resSemana);
$Num_Pesquisa = $consultaSemana['UltimaPesquisa'];
echo $Num_Pesquisa;
$PesquisaAtual = $Num_Pesquisa+1;   //quatro pesquisas por ano
//QUANDO TIVERMOS UM NOVO ANO A FUNCAO DEVOLVE VALOR NULL, MAS O IFNULL DO SELECT FAZ SER 0 :)


$sql_01 = "SELECT pesquisa FROM 1pesquisa_pamostragem WHERE pesquisa ='".$Semana_Anterior."' 
AND YEAR(dataabertura)='" . $Ano_Atual . "' AND formaatendimento LIKE '%Visita%' LIMIT 1";
$res_01 = mysql_query($sql_01) or die (mysql_error());
$totreg = mysql_num_rows($res_01);

if ($totreg>0) {
	echo utf8_decode("01 prepara sorteio ja tem dados para esta semana ver 1pesquisa_pamostragem\n");
	$ja="sim";
} else { //ainda nao temos sorteio
	$SQLDISTINCT = "SELECT DISTINCT ocorrencia_ocorrencia_id FROM 1pesquisa WHERE WEEK(ocorrencia_execucoes_data_fim)='" . $Semana_Atual_all . "' 
	AND YEAR(ocorrencia_execucoes_data_fim)='" . $Ano_Atual . "' AND ocorrencia_execucoes_forma_atendimento_descricao  LIKE '%Visita%' AND ocorrencia_solicitante_fone NOT LIKE '' AND ocorrencia_execucoes_data_fim NOT LIKE '0000-00-00' ORDER BY ocorrencia_ocorrencia_id DESC";
	$RESDISTINCT = mysql_query($SQLDISTINCT) or die (mysql_error());// die("Falha no comando SQLDISTINCT");
	$totregDist = mysql_num_rows($RESDISTINCT);

	$sql = "SELECT * FROM 1pesquisa WHERE WEEK(ocorrencia_data_abertura)='" . $Semana_Atual_all . "' AND YEAR(ocorrencia_data_abertura)='" . $Ano_Atual . "' AND ocorrencia_execucoes_forma_atendimento_descricao  LIKE '%Visita%' AND ocorrencia_execucoes_forma_atendimento_descricao NOT LIKE '' ORDER BY ocorrencia_ocorrencia_id DESC";
	$res = mysql_query($sql) or die (mysql_error());
	$totreg = mysql_num_rows($res) or die (mysql_error());

	//echo "awquiuiuuuu\n";

	$contador=0;
	while($CONSULTADISTINCT = mysql_fetch_array($RESDISTINCT)) 
	  { $contador ++;
	    //  Escreve os itens consultados na tabela 
	    $NumOc = $CONSULTADISTINCT['ocorrencia_ocorrencia_id'];// NOT LIKE 'deslocamento and administrativo'
	    $sqlNR = "SELECT * FROM 1pesquisa WHERE ocorrencia_ocorrencia_id='" . $NumOc . "' AND ocorrencia_execucoes_forma_atendimento_descricao  LIKE '%Visita%'  AND ocorrencia_solicitante_fone NOT LIKE ''";
	    $resNR = mysql_query($sqlNR) or die (mysql_error());//die("Falha no comando sql");
	    $CONSULTANR =  mysql_fetch_array($resNR) or die (mysql_error());;
	    $tot_qtde_dados_com_os_fixa = mysql_num_rows($resNR);

	    if ($tot_qtde_dados_com_os_fixa==1){
	     // echo "guardar na tabela 1pesquisa_pamostragem com prioridade 1 <BR>";
	//caso 01

	      $prioriza_tec_unic_atend = 1;
	 
	      		$Sql="INSERT INTO 1pesquisa_pamostragem VALUES ("; //prioriza_tec_unic_atend
            $Sql .= "'', "; //id 
			$Sql .= "'".$prioriza_tec_unic_atend. "', "; //prioriza_tec_unic_atend -->$consulta['prioriza_tec_unic_atend']
			$Sql .= "'".$PesquisaAtual. "', "; //id de 1pesquisa_pamostragem 
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_contato_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_contato_fone'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_solicitante_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_solicitante_fone'])). "', ";
			$Sql .= "'".$NumOc. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['cliente_sigla'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['municipio_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['total_tempo_gasto'])). "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_data_abertura']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_data_conclusao']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_data_ini']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_data_fim']. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['funcionario_nome'])). "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_forma_atendimento_descricao']. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['area_sigla']))."')";
			//echo $Sql;
			echo "<br>";
			mysql_query($Sql) or die (mysql_error());

	    } else {
	      $Tecnico = $CONSULTANR['funcionario_nome'];
	      $NaDuvidaEhIgual = "TodosIguais";
	      while($CONSULTANR = mysql_fetch_array($resNR)) {
		$TecnicoAgora=$CONSULTANR['funcionario_nome'];
		if ($Tecnico!=$TecnicoAgora){
		       // echo $Tecnico . " eh diferente de " . $TecnicoAgora. "<BR>";
			$sqlNR_proiri2 = "SELECT * FROM 1pesquisa WHERE ocorrencia_ocorrencia_id='" . $NumOc . "' 
			AND ocorrencia_execucoes_forma_atendimento_descricao  LIKE '%Visita%' AND ocorrencia_solicitante_fone NOT LIKE ''";
			$resNR_proiri2 = mysql_query($sqlNR_proiri2) or die (mysql_error());//die("Falha no comando sql");
		
			//echo "guardar na tabela 1pesquisa_pamostragem com prioridade 2 <BR>";
		
			while($CONSULTANR_proiri2 = mysql_fetch_array($resNR_proiri2)) {
			  
			 // echo "----->" . $CONSULTANR_proiri2['tecnico'] . "<br>";
			  $prioriza_tec_unic_atend = 2;
			  $Sql="INSERT INTO 1pesquisa_pamostragem VALUES ("; //prioriza_tec_unic_atend
            $Sql .= "'', "; //id 
			$Sql .= "'".$prioriza_tec_unic_atend. "', "; //prioriza_tec_unic_atend -->$consulta['prioriza_tec_unic_atend']
			$Sql .= "'".$PesquisaAtual. "', "; //id de 1pesquisa_pamostragem 
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_contato_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_contato_fone'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_solicitante_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_solicitante_fone'])). "', ";
			$Sql .= "'".$NumOc. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['cliente_sigla'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['municipio_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['total_tempo_gasto'])). "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_data_abertura']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_data_conclusao']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_data_ini']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_data_fim']. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['funcionario_nome'])). "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_forma_atendimento_descricao']. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['area_sigla']))."')";
			  //echo $Sql;
			  mysql_query($Sql) or die (mysql_error());
			}		
			$NaDuvidaEhIgual = "DeuDiferente";
			break;//para para o while agora
		}
	      }
	      if ($NaDuvidaEhIgual == "TodosIguais"){
		// echo "guardar na tabela 1pesquisa_pamostragem com prioridade 1 <BR>";
		//eh igual ao caso 01
	    $sqlNR = "SELECT * FROM 1pesquisa WHERE ocorrencia_ocorrencia_id='" . $NumOc . "' 
		AND ocorrencia_execucoes_forma_atendimento_descricao LIKE '%Visita%' AND ocorrencia_solicitante_fone NOT LIKE ''";
	    $resNR = mysql_query($sqlNR) or die (mysql_error());//die("Falha no comando sql");
	    $CONSULTANR =  mysql_fetch_array($resNR) or die (mysql_error());
	      $prioriza_tec_unic_atend = 1;
	      		$Sql="INSERT INTO 1pesquisa_pamostragem VALUES ("; //prioriza_tec_unic_atend
            $Sql .= "'', "; //id 
			$Sql .= "'".$prioriza_tec_unic_atend. "', "; //prioriza_tec_unic_atend -->$consulta['prioriza_tec_unic_atend']
			$Sql .= "'".$PesquisaAtual. "', "; //id de 1pesquisa_pamostragem 
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_contato_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_contato_fone'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_solicitante_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['ocorrencia_solicitante_fone'])). "', ";
			$Sql .= "'".$NumOc. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['cliente_sigla'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['municipio_nome'])). "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['total_tempo_gasto'])). "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_data_abertura']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_data_conclusao']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_data_ini']. "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_data_fim']. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['funcionario_nome'])). "', ";
			$Sql .= "'".$CONSULTANR['ocorrencia_execucoes_forma_atendimento_descricao']. "', ";
			$Sql .= "'".mysql_real_escape_string(stripslashes($CONSULTANR['area_sigla']))."')";
			//echo $Sql;
			mysql_query($Sql) or die (mysql_error());

	      }
	    } 
	   }
} //FIM ELSE VER SEMANA ANTERIOR SE EXISTE JÁ NO BD
	 ?>
