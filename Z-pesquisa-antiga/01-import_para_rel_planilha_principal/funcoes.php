<?php
function abreArquivo($nomeDoCampo)
{	
	$nometmp=$_FILES[$nomeDoCampo]["tmp_name"];
	// se ele não estiver vazio
	if ($nometmp != ""){
		//abre
	 	$handle   = fopen ($nometmp, "r");
	 	return $nometmp;
	}else{
		return false;
	}
}


function preparaLinhas($nomeTemporario)
{
	//separa o arquivo por linhas
	$linhas = file($nomeTemporario);
		//faz um loop enquanto tiver linhas
		for ($x=0; $x < count($linhas); $x++){
			//verirfica se a linhas está formatada regularmente
			//echo $qtd.'<br>';
			if (verificaLinha($linhas[$x], 22)) {
				//separa os dados das linhas
				$dados = explode(';',$linhas[$x]);
				//aramazena valores na var
				$matrizDados[] = $dados;
			}	
		}
	return $matrizDados;
}


function verificaLinha($linhaDoImportado, $qtdeCampos)
{		
	if (substr_count($linhaDoImportado, ";") == ($qtdeCampos))

		return true;

	else

		return false;	
}

function gravaDados($matrizdeDados)
{	
 $totalDeLinhas = count($matrizdeDados);	
 if($totalDeLinhas != 0)
 {	
  foreach ($matrizDeDados as $linhas){
    
     $linhas[0]=utf8_decode($linhas[0]);
  //monta a sql que será inserida
  $sql = "INSERT INTO girpesqusiaimportarresultados 
  (id, datee, semana, ano,
   cidadao, datahora, teleatendente, fone, sexo, cortesia, profissionalismo, Pergunta1Pessimo, avaliacaoesolucao, 
    pessimo2porque, esclarecimentoduvidas, facilidadeabrir, Pergunta6Pessimo, temposolucao, Pergunta7Pessimo, 
    qualidade, Pergunta8Pessimo, sugestao, regional, cidade,
   tecnico, cliente, ndeocorrencia) VALUES 
  ('', '$Semana_Atual', '$Semana_Atual', '$Ano_Atual', 
   '".$linhas[0]."', '".$linhas[1]."','".$linhas[2]."', '".$linhas[3]."', '".$linhas[4]."', '".$linhas[5]."', '".$linhas[6]."', '".$linhas[7]."',  '".$linhas[8]."',
    '".$linhas[9]."',  '".$linhas[10]."', '".$linhas[11]."','".$linhas[12]."', '".$linhas[13]."', '".$linhas[14]."', 
    '".$linhas[15]."', '".$linhas[16]."', '".$linhas[17]."',  '".$linhas[18]."', '".$linhas[19]."', 
    '".$linhas[20]."', '".$linhas[21]."','".$linhas[22]."')";
//executa a sql
$Inserem = mysql_query($sql) or die (mysql_error());
		}
	}
}


function verificaConsistencia($nomeTemp)
{	
	//separa o arquivo por linhas
	$linhas = file($nomeTemporario);
		//faz um loop enquanto tiver linhas
	for ($x=0; $x < count($linhas); $x++){
		//verirfica se a linhas está formatada regularmente
		//echo $qtd.'<br>';
		if (verificaLinha($linhas[$x], 22)) {
			//separa os dados das linhas
			$dados = explode(';',$linhas[$x]);
			//aramazena valores na var
			return true;
		}else{
	     	$y = $x +1;
 			//mostra  amsg de erro com a linha que está com problema
 			echo 'Erro na linha '.$y.' do arquivo importado.';
 			//deixo a variável $verifica com o valor falso, ou seja, não posso gravar!
 			return false;
		}
	}
}

?>