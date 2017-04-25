<?
/*SEMANA PARA PESQUISAR
id's editados (que ja responderam a pesquisa) possuem valor 1
Este arquivo mostra a lista dos dados de soc existentes no bd da semana anterior, mostrando uma coluna que permite editar a linha que levara ao arquivo ./editar-preencher-resposta-salvar-satisf.php
não mostra as ordens de serviço do nr que o tecnico adm pertence.
 fixa as o.s. que farão parte da pesquisa para determinada semana (semana anterior cuja pesquisa se faz na semana atual)
 nao considera mesmo numero de o.s. para o mesmo técnico.
 1- distintos    2- sorteio
*/
include '../conectbd.php';
$Semana_Atual = date("W"); //pegar semana atual
include './Semana_Atual.php';
$id=&$_GET['a'];
$SQLID = "SELECT *, date_format(datafim, '%d/%m/%Y') as DataAbertura FROM 1pesquisa_sorteio WHERE WEEK(datafim)='" . $Semana_Anterior . "' AND YEAR(datafim)='" . $Ano_Atual . "' ORDER BY executor";
 // AND NOT executor LIKE '%" . $CidadeTecLogado . "%'
$res_01 = mysql_query($SQLID) or die("Falha no comando sql linha 16"); 
//$consulta = mysql_fetch_array($res_01);
$totreg = mysql_num_rows($res_01);
$arquivo = 'planilhasat.xls';
header ("Expires: Mon, 26 Jul 2015 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
?>
<table align="right"  border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="99%">
	<tr>
	<td>
	<table border="0" bordercolor="#C0C0C0" width="100%" height="20" >
		<tr>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>SOC</b></FONT></CENTER>
			</td>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>REGIONAL</b></FONT></CENTER>
			</td>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>CIDADE</b></FONT></CENTER>
			</td>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>TEL RES</b></font></CENTER>
			</td>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>TEL COM</b></font></CENTER>
			</td>
			<th colspan="4"><CENTER><FONT STYLE="font-size:10pt" color=#000000><b>STATUS</b></font></CENTER></th>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>CONTATO</b></font></CENTER>
			</td>
			<td height="20"  class="titulos" coslpan="1">
				<CENTER><FONT STYLE="font-size:10pt" color=#000000><b>CONTATO OU SOLICITANTE</b></font></CENTER>
			</td>
		</tr>
<? 
$contador=0;
while($consulta = mysql_fetch_array($res_01)) { $contador ++;
?>
      <tr>
	      <td height="20" coslpan="1">
		      <a title="Contato"></a><font style="font-size: 7pt;" color=#000000><center>
			      <?    echo utf8_decode( $consulta['ndeocorrencia']);?></center></b></font>
	      </td>
	      <td height="20" coslpan="1">
		      <a title="telefone "></a><font style="font-size: 7pt;" color=#000000><center>
			      <?echo $consulta['executor'];?></center></b></font>
	      </td>
	      <td height="20" coslpan="1">
		      <a title="ndeocorrencia"></a><font style="font-size: 7pt;" color=#000000><center>
			      <?echo $consulta['cidade'];?></center></b></font>
	      </td>
	      <td height="20" coslpan="1">
		      <a title="cliente"></a><font style="font-size: 7pt;" color=#000000><center>
			      <?echo $consulta['telefone'];?> &nbsp;</center></b></font>
	      </td>
	      <td height="20" coslpan="1">
	      <a title="cidade"></a><font style="font-size: 7pt;" color=#000000><center>
			      <?echo $consulta['solicitante_fone'];?> &nbsp;</center></b></font>
	      </td>	
	      <td height="20" coslpan="1">
		      <a title="status"></a><font style="font-size: 7pt;" color=#000000><center>
			      &nbsp;</center></b></font>
	      </td>
	      <td height="20" coslpan="1">
		      <a title="status"></a><font style="font-size: 7pt;" color=#000000><center>
			      &nbsp;</center></b></font>
	      </td>
	      <td height="20" coslpan="1">
		      <a title="status"></a><font style="font-size: 7pt;" color=#000000><center>
			      &nbsp;</center></b></font>
	      </td>
	      <td height="20" coslpan="1">
		      <a title="status"></a><font style="font-size: 7pt;" color=#000000><center>
			      &nbsp;</center></b></font>
	      </td>
	      <td height="20" coslpan="1">
	      <a title="contato"></a><font style="font-size: 7pt;" color=#000000>
			      <center><?echo $consulta['contato'];?></center></font>
	      </td>
	      <td height="20" coslpan="1">
	      <a title="contato"></a><font style="font-size: 7pt;" color=#000000>
			      <center><?echo $consulta['solicitante_nome'];?></center></font>
	      </td>

      </tr>
<?
} // fim while 
?>
	</table></center>
	<table>
		<tr>
			<td colspan=9>
				<font color="#C0C0C0" face="Arial" style="font-size: 11pt"><? echo utf8_decode("<br>Foram encontradas $totreg  ocorrências.");?>
					<?
						echo utf8_decode("&nbsp;Semana n	&ordm;&nbsp;"); echo $Semana_Anterior; echo utf8_decode(" do ano de "); echo $Ano_Atual//2012
					?>
				</font>
			</td>
		</tr>

    </td>
  </tr>
</table>


<?php
// Configurações header para forçar o download
// Definimos o nome do arquivo que será exportado


mysql_close($conn);
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
