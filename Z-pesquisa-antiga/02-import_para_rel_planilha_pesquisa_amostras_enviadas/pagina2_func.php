<?php
require_once("funcoes.php");

$nomeTemp = abreArquivo("arquivo");
if(verificaConsistencia($nomeTemp))
{
	$matriz = preparaLinhas($nomeTemp);
	gravaDados($matriz);	
}
else
{
	echo 'erro';
}
?>
