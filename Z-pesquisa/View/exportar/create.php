<?php
 // Iniciando Sessão
session_start();   
//include '../../conectbd.php';
//Nome da tabela a ser exportada
$table="girpesquisaresposta";
 
    $select = "SELECT * FROM ".$table;                
    $export = mysql_query($select);
    $fields = mysql_num_fields($export);
     
    for ($i = 0; $i < $fields; $i++) {
        $header = '"' . mysql_field_name($export, $i) . '"' . "\t";

     //   $header .= mysql_field_name($export, $i) . "\t";
    }
         
    while($row = mysql_fetch_row($export)) {
        $line = '';
        foreach($row as $value) {                                            
            if ((!isset($value)) OR ($value == "")) {
                $value = "\t";
            } else {
                $value = str_replace('"', '""', $value);
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
       // $data = '"' . trim($line) . '"' . "\n";

        $data .= trim($line)."\n";
    }
    $data = str_replace("\r","",$data);
     
    if ($data == "") {
        $data = "\n(0) Records Found!\n";                        
    }
    else{
        $hoje=date("Y_m_j");              
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=".$table."_".$hoje.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        print_r($header); echo "\n"; print_r($data);  
        
    }
     
?>