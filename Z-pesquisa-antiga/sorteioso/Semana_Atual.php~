<?
/*não será mais utilizado a funcao date do PHP pois para o mysql as semanas são contadas diferentemente. Ex.: semana 0, semana 1 e semana 2 são para o mysql enquanto para o php seria semana 1, semana 2 e semana 3
$Semana_Atual = date("W");//pegar semana atual*/
$sql ="SELECT week(NOW()) as semana, year(NOW()) as ano, month(NOW()) as mes";
$res = mysql_query($sql) or die (mysql_error());
$consulta = mysql_fetch_array($res);
$Semana_Atual = $consulta['semana'];
$Semana_Atual2 = $consulta['semana'];
$Ano_Atual = $consulta['ano'];
$mes = $consulta['mes'];

/*$Semana_Anterior = $Semana_Atual; //ver soc semanas anteriores   ver soc semanas anteriores antendeu priori2 e nao priori1
$Semana_Atual_all = $Semana_Atual; //ver soc semana anterior all*/
$Semana_Anterior = $Semana_Atual-1; //ver soc semanas anteriores   ver soc semanas anteriores antendeu priori2 e nao priori1
$Semana_Atual_all = $Semana_Atual-1; //ver soc semana anterior all
$Tempo_espera_retornar_ligacao = 7200; //duas horas de espera
$Exclui_de_ligar_em_semanas = 4; //o contato/ cliente ficará sem receber ligação por 4 semanas
?>
