<?
/* Este arquivo fará um select na tabela 01satisbasica onde pesquisa='semana selecionada na pagina anterior, 1basica-inicial.php', isto eh, selecionara os registros que estao disponiveis para pesquisa (fazer ligacao).
O resultado do select sera mostrado neste arquivo para que possa realizar o preenchimento total dos dados e posteriormente salvar os registros na tabela 01resposta_satisfacao.
encaminha para ./salvar-preencher-resposta-salvar-satisf.php
A IDEIA E CRIAR UM CAMPO INPUT TYPE TEXT QUE OFERECA OPCOES QUE ESTAO BANCO DE DADOS PARA O CAMPO. PARA ISSO FORAM USADOS OS DOIS SELECTS ABAIXO E OS SCRIPT'S */
?>

<?php
include "./login/valida_session.php";
include './conectbd.php';
$GETsemanaqueveio=$_GET['se'];
if ($GETsemanaqueveio<53 and $GETsemanaqueveio>0){ 
	$se=$GETsemanaqueveio;
}else{
	echo "<br><center>Semana Inv&aacute;lida. </center><br>";
	exit();
}
$GETnumid=$_GET['id'];
//echo $GETnumid;
if ($GETnumid<5300000 and $GETnumid>0){ 
	$id=$GETnumid;//id que veio 
}else{   
	echo "<br><center>ID Inv&aacute;lido.</center><br>";
	exit();
}
$GETyear=$_GET['year'];
if ($GETyear<2020 and $GETyear>2006){ 
	$year=$GETyear;
}else{  
	// 1basica-inicial.php?ii=17&y=2010
	echo "Ano Errado. </center><br>"; //
	exit();
}/* 
$GETndeocorrenciaqueveio=$_GET['N0456Um035ero0989Oc'];
if ($GETndeocorrenciaqueveio<53 and $GETndeocorrenciaqueveio>0){ 
	$Num_de_ocorrencia_ver_soc_anteriores=$GETndeocorrenciaqueveio;
}else{
	echo "<br><center>Semana Inv&aacute;lida. </center><br>";
	exit();
}
//N0456Um035ero0989Oc - 
testar se a os ja nao esta sendo trabalhada por outro user ou ate se ja nao foi feita por outro, caso em que o pesquisador largou a pagina sozinha aberta e carregada.
$UpEdit="UPDATE sorteio SET editing_now = esterg WHERE sorteio.id_01satisbasica =$Id";
UPDATE sorteio SET column1=value, column2=value2,WHERE some_column=some_value  */
$TecnicoLogado = $_SESSION["login_usuario"];
$UpRes = @mysql_query("UPDATE sorteio SET editing_now = '$TecnicoLogado' 
WHERE id_01satisbasica='$id' AND editing_now= '' LIMIT 1") or die ("".mysql_error());//or die ("Falha no comando sql op sorteio editar-preencher");   //or die ("".mysql_error());
$linhas = @mysql_num_rows($UpRes);//1
//echo "deu  $linhas isso!";
if($linhas == 0){ //o campo edit_now esta preenchido
$EDITNOW = @mysql_query("SELECT editing_now, id, id_01satisbasica FROM sorteio 
WHERE  id_01satisbasica='$id' LIMIT 1")  or die ("Falha no comando sql linha 51"); //or die ("".mysql_error()); 
$Ceditnow = mysql_fetch_array($EDITNOW);
	$var = $Ceditnow['editing_now'];
	
	if ($TecnicoLogado!=$var){ //verifica se o tecnico que esta logado eh o que esta no campo edit_now se nao for exibe a msg abaixo

	?>
<br><? //acabamento tabela
include './tabular/inicio_tabela.php';
?>
<table align="right" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="99%">
	<tr><td><table align="center" bgcolor="#C0C0C0" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
	<tr><td height="30" bordercolor="#FFFFFF" bgcolor="#C0C0C0" valign="top"></td></tr>
</table>
      <table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
		    <tr bordercolor="#FFFFFF" class="titulos" bgcolor="#c0c0c0">
		      <td height="35"><p align="center">
				<font style="font-size: 11pt;"><b>
				<?
					echo utf8_decode("Este registro já está sendo editado pelo usuário $TecnicoLogado!<br><br>");
					echo utf8_decode("<a href =?pg=faCopOepNgTSadUdsLFsTddUTSadciaNgTSadl> PÁGINA ANTERIOR </a>\n"); 
				?>
				</font></b></center>
		      </td>
		    </tr> 
	      </table>
	<table align="center" bgcolor="#C0C0C0" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td height="30" bordercolor="#FFFFFF" bgcolor="#C0C0C0" valign="top">
			</td>
		</tr>
	</table>
<? //acabamento tabela?>
	</td>
	<td background="./imgs/fundo_cinza_d.jpg" width="9" height="80">&nbsp;</td>
	</tr>
	<tr>
			<td width="9" height="9">
				<img src="./imgs/fundo_cinza_re.jpg" height="9" width="9">
			</td>
			<td width="100%" height="9" background="./imgs/fundo_cinza_r.jpg">
			</td>
			<td width="9" height="9">
				<img src="./imgs/fundo_cinza_rd.jpg" height="9" width="9">
			</td>
	</tr>
</table>
<br><br>
<?
	} else { // permite que o tecnico que começou editar termine 
			$id_old=$Ceditnow['id_01satisbasica'];
			//echo "id old -". $id_old . "<br>". "id ". $id;			
			$sqlr = "SELECT * FROM sorteio WHERE id_01satisbasica='" . $id . "' AND NOT pesquisadasimnao =1 ORDER BY id ASC";
			$resr = mysql_query($sqlr) or die("Falha no comando sql");
			$consulta = mysql_fetch_array($resr);
			$ii = $consulta['pesquisa']; //ii de id inicial
			$id = $consulta['id'];
			$var = $consulta['pesquisa'];
			$NDO = $consulta['ndeocorrencia'];
			$tecnicoavaliado = $consulta['tecnico'];
			$contato = $consulta['contato'];
			$cliente = $consulta['cliente'];
			//echo "  NDO" . $NDO;
		?>
<br>
<? //acabamento tabela
include './tabular/inicio_tabela.php';
?>
		<center>
		<table align="right" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="99%">
		<tr>
			<td>
			<table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
					<tr bordercolor="#FFFFFF" class="titulos" bgcolor="#c0c0c0">
					<td height="35"><p align="center">
				<center>
				<font style="font-size: 11pt;"><b><? echo utf8_decode(" ORDEM DE SERVI&Ccedil;O\n");?> </b></font>
				<font style="font-size: 12pt;" color=blue><b>   P-<? echo $consulta['ndeocorrencia'];?></b></font>

				<font style="font-size: 11pt;"><b>REFERENTE A  <?echo $se;?>&ordf; SEMANA</b></font><br>
				</center>
					</td>
					</tr> 
				</table>
			<form method="POST" ACTION="?pg=faCopgNhuAyiSyioOepNgTSadUTSadciaNgTSadl" name="formulario">
			<table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td height="30" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top">
						<INPUT type="hidden" title="id" NAME="idd" VALUE="<? echo $GETnumid;?>"><? // passar id ?>
						<INPUT type="hidden" title="se" NAME="se" VALUE="<?echo $se;?>"><? // passar semana?>
						<INPUT type="hidden" title="ano" NAME="ano" VALUE="<?echo $GETyear;?>"><? // passar ANO?>
						<INPUT type="hidden" title="tecnicoavaliado" NAME="tecnicoavaliado" VALUE="<?echo $tecnicoavaliado;?>"><? // passar tecnicoavaliado?>
						<INPUT type="hidden" title="ndeocorrencia" NAME="ndeocorrencia" VALUE="<? echo $NDO; ?>">
						<INPUT type="hidden" title="contato" NAME="contato" VALUE="<? echo $contato; ?>">
						<INPUT type="hidden" title="cliente" NAME="cliente" VALUE="<? echo $cliente; ?>">
						<font class="titulos" style="font-size: 11pt">CONTATO</font>&nbsp;
							<font style="font-size: 10pt;"><?echo $consulta['contato']; ?></font>
					</td>
					<td height="30" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top">
						<font class="titulos" style="font-size: 11pt">EMAIL</font>&nbsp;
							<font style="font-size: 10pt;"><?echo $consulta['email']; ?></font>
					</td>

					<td height="30" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top">
						<font class="titulos" style="font-size: 11pt">TELEFONE</font>&nbsp;
							<font style="font-size: 10pt;"><?echo $consulta['telefone']; ?>
							</font>
						<font class="titulos" style="font-size: 11pt">EMAIL</font>&nbsp;
							<font style="font-size: 10pt;"><?echo $consulta['email']; ?>
							</font>
					</td>
				</tr>
				<tr>
					<td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
						<font  class="titulos" style="font-size: 11pt">DATA O.S.</font>&nbsp;
							<font style="font-size: 10pt;"><?echo $consulta['dataabertura'];?>
							</font>
					</td>
					<td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
							<font style="font-size: 10pt;"><? echo  $consulta['cidade'];?>
							</font>
					</td>
					<td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top" colspan="3">
							<font style="font-size: 10pt;"><? echo $consulta['cliente'];?>
							</font>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr bordercolor="#FFFFFF" class="titulos" bgcolor="#c0c0c0">
				    <td height="35"><p align="center"><font face="Arial" size="3" colspan="2">
					<b>
					  <INPUT title="naoatligacao" TYPE="radio"  id="ligando" NAME="ligando" VALUE="naoatligacao" 
					  onClick="this.form.action='?pg=NgontNgTontaNontdsiNontaNgTontiNgTSaontaNgTontadligandooooooo&se=<? echo $se;?>&id=<? echo $GETnumid;?>&ano=<?echo $GETyear;?>&val=<? echo utf8_decode("naoatligacao");?>&ndeocorrencia=<? echo $NDO;?>';this.form.submit();"  onMouseOver="style.cursor='pointer'">
					  <font  class="titulos" style="font-size: 11pt"><? echo utf8_decode("TELEFONE SÓ CHAMA\n");?></font>&nbsp;
					</b>
				      </td>
				      <td height="35"><p align="center"><font face="Arial" size="3" colspan="2">
					<b>
					  <INPUT title="naoresponder" TYPE="radio"  id="ligando" NAME="ligando" VALUE="naoresponder" 
					  onClick="this.form.action='?pg=NgontNgTontaNontdsiNontaNgTontiNgTSaontaNgTontadligandooooooo&se=<? echo $se;?>&id=<? echo $GETnumid;?>&ano=<?echo $GETyear;?>&val=<? echo utf8_decode("naoresponder");?>&ndeocorrencia=<? echo $NDO;?>';this.form.submit();"  onMouseOver="style.cursor='pointer'">
					  <font  class="titulos" style="font-size: 11pt"><? echo utf8_decode("NÃO QUER RESPONDER\n");?></font>&nbsp;
					</b>
				      </td>
				      <td height="35"><p align="center"><font face="Arial" size="3" colspan="2">
					<b>
					  <INPUT title="responderdepois" TYPE="radio"  id="ligando" NAME="ligando" VALUE="responderdepois"
					  onClick="this.form.action='?pg=NgontNgTontaNontdsiNontaNgTontiNgTSaontaNgTontadligandooooooo&se=<? echo $se;?>&id=<? echo $GETnumid;?>&ano=<?echo $GETyear;?>&val=<? echo utf8_decode("responderdepois");?>&ndeocorrencia=<? echo $NDO;?>';this.form.submit();"  onMouseOver="style.cursor='pointer'">
					  <font  class="titulos" style="font-size: 11pt"><? echo utf8_decode("LIGAR/RESPONDER DEPOIS\n");?></font>&nbsp;
					</b>
				      </td>  

				 </tr>

				 
				 
			</table><br>
			<table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
			  <tr bordercolor="#FFFFFF" class="titulos" bgcolor="#c0c0c0">
			    <td height="35"><p align="center"><font face="Arial" size="3">
			      <b><? echo utf8_decode(" FORMUL&Aacute;RIO PARA A PESQUISA\n");?></font></b></center>
			    </td>
			  </tr>
			</table>
				
			<? /* 
			     Excelente - a - 4
			     Bom - b - 3
			     Ruim - c - 2
			     Pessimo - d -1
			    */ 
			?>
			<table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt"><br>&nbsp;<b>
					<? echo utf8_decode(" 1 - Sexo do entrevistado:\n");?></b>
					</font><br>&nbsp;&nbsp;&nbsp;
					
					<INPUT title="sx" TYPE="radio"  id="pergunta1" NAME="pergunta1" VALUE="sxf" checked value="sxf">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Feminino\n");?></font>&nbsp;&nbsp;&nbsp;

					<INPUT title="sx" TYPE="radio"  id="pergunta1" NAME="pergunta1" VALUE="sxm">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Masculino\n");?></font><br>
					<br>
					</td>
			</tr>
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt">&nbsp;<b>
					<? echo utf8_decode(" 2 - Considerando o atendimento do técnico, o(a) Sr(a) diria que:\n");?></b>
					</font><br><br>
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" A cortesia foi:");?><i><? echo utf8_decode(" (Se necessário exemplificar: educação, atenção, respeito)\n");?></i>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta2Pessimo" NAME="pergunta2Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" O profissionalismo foi:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta3Pessimo" NAME="pergunta3Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Esclarecimento de dúvidas:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta4Pessimo" NAME="pergunta4Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Ainda em relação ao atendimento do técnico, o (a) Sr(a) diria que a precisão na avaliação e solução do problema foi:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta5Pessimo" NAME="pergunta5Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt">&nbsp;<b>
					<? echo utf8_decode(" 3 - Considerando o serviço de suporte técnico de forma geral o(a) Sr(a) diria que o(a):\n");?></b>
					</font><br><br>
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Facilidade de abrir o chamado:");?></font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta6Pessimo" NAME="pergunta6Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Tempo de solução do problema:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta7Pessimo" NAME="pergunta7Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Qualidade do serviço prestado:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta8Pessimo" NAME="pergunta8Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>

			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt">&nbsp;<b>
					<? echo utf8_decode(" 4 - O Sr(a) tem algum comentário ou sugestão a respeito do atendimento?\n");?></b>
					</font><br><font  class="titulos" style="font-size: 10pt">&nbsp;
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta9" NAME="pergunta9" ROWS="3" COLS="50" ><? echo utf8_decode("... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;					

					</td>
			</tr>
			
<?/*
			<tr>
					<td valign="center" colspan="3" height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
						<font  class="titulos" style="font-size: 11pt">&nbsp;
						<? echo utf8_decode(" Coment&aacute;rio do solicitante\n");?><br></font>
						<TEXTAREA  id="comentarios" NAME="comentarios" ROWS="2" COLS="100" ><? echo utf8_decode(" ");?></TEXTAREA>
						
					</td>
			</tr>
*/?>
			</table><br>
			</td>
		</tr>
		</table>
		
<?
//if ( ) {
//    class='obrigatorio' 
//}
?>
		
		<input title="Para Salvar as respostas"  type=submit value=" Salvar" name="submit2" 
		style="font-weight: bold; color: #000000; font-size: 12; text-decoration: blink; font-family: Arial; letter-spacing: 3pt; 
		text-transform: uppercase; border: 4px outset #BEBEBE; padding-left: 4px; padding-right: 4px; 
		padding-top: 1px; padding-bottom: 1px; background-color: #BEBEBE" >
		</form>
		<br><br>
		<?
		} //fim else linhas editando

?>

<?

} else {  // linhas diferente de 0
	$id_old=$Ceditnow['id_01satisbasica'];
	$sqlr = "SELECT * FROM 01satisbasica WHERE id_01satisbasica='" . $id_old . "' AND NOT pesquisadasimnao =1 ORDER BY id ASC";
	$resr = mysql_query($sqlr) or die("Falha no comando sql");
	$consulta = mysql_fetch_array($resr);
	$ii = $consulta['pesquisa']; //ii de id inicial
	$id = $consulta['id'];
	$var = $consulta['pesquisa'];
	$NDO = $consulta['ndeocorrencia'];
	$contato = $consulta['contato'];
	$cliente = $consulta['cliente'];
	// MAXLENGTH = "5" 
?>
<center>
<table align="right" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="99%">
  <tr>
    <td>
      <table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
		    <tr bordercolor="#FFFFFF" bgcolor="#c0c0c0">
		      <td height="35">
				<center>
				<font style="font-size: 11pt;"><b>ORDEM DE SERVI&Ccedil;O</b></font>
				<font style="font-size: 12pt;" color=blue><b>   P-<? echo $consulta['ndeocorrencia'];?></b></font>
				
				<font style="font-size: 11pt;"><b>REFERENTE A  <?echo $se;?>&ordf; SEMANA</b></font><br>
				</center>
		      </td>
		    </tr> 
	      </table>
      <form method="POST" ACTION="?pg=faCopgNhuAyiSyioOepNgTSadUTSadciaNgTSadl" name="formulario">
      <table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
	      <tr>
		      <td height="30" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top">
				<INPUT type="hidden" title="id" NAME="idd" VALUE="<? echo $GETnumid;?>"><? // passar id ?>
				<INPUT type="hidden" title="se" NAME="se" VALUE="<?echo $se;?>"><? // passar semana?>
				<INPUT type="hidden" title="ano" NAME="ano" VALUE="<?echo $GETyear;?>"><? // passar ANO?>
				<INPUT type="hidden" title="ndeocorrencia" NAME="ndeocorrencia" VALUE="<? echo $NDO; ?>">
				<INPUT type="hidden" title="contato" NAME="contato" VALUE="<? echo $contato; ?>">
				<INPUT type="hidden" title="cliente" NAME="cliente" VALUE="<? echo $cliente; ?>">
			      <font class="titulos" style="font-size: 11pt">CONTATO</font>&nbsp;
					<font style="font-size: 10pt;"><?echo $consulta['contato']; ?>
				     </font>
		      </td>
		      <td height="30" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top">
			      <font class="titulos" style="font-size: 11pt">EMAIL</font>&nbsp;
					<font style="font-size: 10pt;"><?echo $consulta['email']; ?></font>
		      </td>

		      <td height="30" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top">
			      <font class="titulos" style="font-size: 11pt">TELEFONE</font>&nbsp;
					<font style="font-size: 10pt;"><?echo $consulta['telefone']; ?>
				     </font>
			      <font class="titulos" style="font-size: 11pt">EMAIL</font>&nbsp;
					<font style="font-size: 10pt;"><?echo $consulta['email']; ?>
				     </font>
		      </td>
      </tr><tr>
      <!--		<td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
			      <font class="titulos" style="font-size: 11pt">N. O.S.</font>&nbsp;
			      <a title="dataabertura"></a><font style="font-size: 10pt;">
				      <?echo ""; //$consulta['ndeocorrencia']; ?></font>
		      </td><?//echo "$DiaNormal[2]/$DiaNormal[1]/$DiaNormal[0]";?>
      -->
		      <td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
			      <font  class="titulos" style="font-size: 11pt">DATA O.S.</font>&nbsp;
					<font style="font-size: 10pt;"><?echo $consulta['dataabertura'];?>
				     </font>
		      </td>
		      <td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
					<font style="font-size: 10pt;"><? echo  $consulta['cidade'];?>
				     </font>
		      </td>
      <!--  </tr>
	<tr>	-->	
		      <td height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top" colspan="3">
					<font style="font-size: 10pt;"><? echo $consulta['cliente'];?>
					</font>
		      </td>
	</tr>
      </table><br>
      <table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
		    <tr bordercolor="#FFFFFF" class="titulos" bgcolor="#c0c0c0">
		      <td height="35"><p align="center"><font face="Arial" size="3">
			  <b>FORMUL&Aacute;RIO PARA A PESQUISA 
					</font></b></center>
				      </td>
			      </tr>
	      </table>
				
			<? /* 
			     Excelente - a - 4
			     Bom - b - 3
			     Ruim - c - 2
			     Pessimo - d -1
			    */ 
			?>
			<table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="100%">
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt"><br>&nbsp;<b>
					<? echo utf8_decode(" 1 - Sexo do entrevistado:\n");?></b>
					</font><br>&nbsp;&nbsp;&nbsp;
					
					<INPUT title="sx" TYPE="radio"  id="sx" NAME="sx" VALUE="sxf" checked value="sxf">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Feminino\n");?></font>&nbsp;&nbsp;&nbsp;

					<INPUT title="sx" TYPE="radio"  id="sx" NAME="sx" VALUE="sxm">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Masculino\n");?></font><br>
					<br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt">&nbsp;<b>
					<? echo utf8_decode(" 2 - Considerando o atendimento do técnico, o(a) Sr(a) diria que:\n");?></b>
					</font><br><br>
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" A cortesia foi:");?><i><? echo utf8_decode(" (Se necessário exemplificar: educação, atenção, respeito)\n");?></i>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta2" TYPE="radio"  id="pergunta2" NAME="pergunta2" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta2Pessimo" NAME="pergunta2Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" O profissionalismo foi:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta3" TYPE="radio"  id="pergunta3" NAME="pergunta3" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta3Pessimo" NAME="pergunta3Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Esclarecimento de dúvidas:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta4" TYPE="radio"  id="pergunta4" NAME="pergunta4" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta4Pessimo" NAME="pergunta4Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Ainda em relação ao atendimento do técnico, o (a) Sr(a) diria que a precisão na avaliação e solução do problema foi:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta5" TYPE="radio"  id="pergunta5" NAME="pergunta5" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta5Pessimo" NAME="pergunta5Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>

			
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt">&nbsp;<b>
					<? echo utf8_decode(" 3 - Considerando o serviço de suporte técnico de forma geral o(a) Sr(a) diria que o(a):\n");?></b>
					</font><br><br>
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Facilidade de abrir o chamado:");?></font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta6" TYPE="radio"  id="pergunta6" NAME="pergunta6" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta6Pessimo" NAME="pergunta6Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Tempo de solução do problema:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta2" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta2" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta2" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta2" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta2" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta7" TYPE="radio"  id="pergunta7" NAME="pergunta7" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta7Pessimo" NAME="pergunta7Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>
			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 10pt">&nbsp;
					<? echo utf8_decode(" Qualidade do serviço prestado:");?>
					</font><br>&nbsp;&nbsp;&nbsp;
					<font style="font-size: 10pt;"><? echo utf8_decode(" (01) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="a" checked value="no">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ótimo\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (02) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="b">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Bom\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (03) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="c" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Regular  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (04) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="d" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Ruim  - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;					
					<font style="font-size: 10pt;"><? echo utf8_decode(" (05) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="e" onchange="window.alert('Preencher o motivo no campo abaixo \t\t\n\n')">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Péssimo - Porque?\n");?></font><br>&nbsp;&nbsp;&nbsp;
										
					<font style="font-size: 10pt;"><? echo utf8_decode(" (06) ");?>
					<INPUT title="pergunta8" TYPE="radio"  id="pergunta8" NAME="pergunta8" VALUE="f">
					<font style="font-size: 10pt;"><? echo utf8_decode(" Não Sabe / Não quiz responder\n");?></font>&nbsp;&nbsp;&nbsp;
					
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<i><? echo utf8_decode(" (Preencher abaixo em caso de alternativa 03, 04 ou 05)\n");?></i>
					</td><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta8Pessimo" NAME="pergunta8Pessimo" ROWS="3" COLS="50" ><? echo utf8_decode("Por que... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;<br><br>
					</td>
			</tr>

			<tr>		
					<td height="40" bordercolor="#FFFFFF" bgcolor="#FFFFFF" valign="top" colspan="3">
					<font  class="titulos" style="font-size: 11pt">&nbsp;<b>
					<? echo utf8_decode(" 4 - O Sr(a) tem algum comentário ou sugestão a respeito do atendimento?\n");?></b>
					</font><br><font  class="titulos" style="font-size: 10pt">&nbsp;
					<table><tr><td>&nbsp;&nbsp;&nbsp;
					<TEXTAREA  id="pergunta9" NAME="pergunta9" ROWS="3" COLS="50" ><? echo utf8_decode("... ");?></TEXTAREA> 
					<br></font></td><tr></table>&nbsp;&nbsp;&nbsp;					

					</td>
			</tr>
			
<?/*
			<tr>
					<td valign="center" colspan="3" height="30" bordercolor="#FFFFFF" bgcolor="#f0f0f0" valign="top">
						<font  class="titulos" style="font-size: 11pt">&nbsp;
						<? echo utf8_decode(" Coment&aacute;rio do solicitante\n");?><br></font>
						<TEXTAREA  id="comentarios" NAME="comentarios" ROWS="2" COLS="100" ><? echo utf8_decode(" ");?></TEXTAREA>
						
					</td>
			</tr>
*/?>
			</table><br>
			</td>
		</tr>
		</table>
<tr>
<td>
<table align="center" bgcolor="#F7F7F7" border="0" bordercolor="#ffffff" cellpadding="0" cellspacing="0" width="99%">
		<tr bordercolor="#FFFFFF" class="titulos" bgcolor="#c0c0c0">
			<td height="35"><font face="Arial" size="3">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input title="Para Salvar as respostas"  type=submit value=" Salvar" name="submit2" 
					style="font-weight: bold; color: #000000; font-size: 12; font-family: Arial; letter-spacing: 3pt; 
					text-transform: uppercase; border: 4px outset #BEBEBE; padding-left: 4px; padding-right: 4px; 
					padding-middle: 1px; padding-bottom: 1px; background-color: #BEBEBE" >
</form>
</table>
</td>
</tr>
<?
} //fim else linhas editando
mysql_close($conn);
?>
<? //acabamento tabela?>
	</td>
	<td background="./imgs/fundo_cinza_d.jpg" width="9" height="80">&nbsp;</td>
	</tr>
	<tr>
			<td width="9" height="9">
				<img src="./imgs/fundo_cinza_re.jpg" height="9" width="9">
			</td>
			<td width="100%" height="9" background="./imgs/fundo_cinza_r.jpg">
			</td>
			<td width="9" height="9">
				<img src="./imgs/fundo_cinza_rd.jpg" height="9" width="9">
			</td>
	</tr>
</table>








