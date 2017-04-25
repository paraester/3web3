<?php
/*
converter o arquivo que vem da planilha para um arquivo sem acentos
ou caracteres especiais.

*/

function AcentosParaSemAcento($string)
{ 
    $a = str_replace('ã', 'a', $string);
    $b = str_replace('õ', 'o', $a);
    $c = str_replace('á', 'a', $b);
    $d = str_replace('é', 'eacute', $c);
    $e = str_replace('í', 'iacute', $d);
    $f = str_replace('ó', 'oacute', $e);
    $g = str_replace('ú', 'uacute', $f);
    $h = str_replace('ç', 'ccedil', $g);
    $i = str_replace('â', 'acirc', $h);
    $j = str_replace('ê', 'ecirc', $i);
    $k = str_replace('î', 'icirc', $j);
    $l = str_replace('ô', 'ocirc', $k);
    $m = str_replace('û', 'ucirc', $l);
    $n = str_replace('Á', 'Aacute', $m);
    $o = str_replace('É', 'Eacute', $n);
    $p = str_replace('Í', 'Iacute', $o);
    $q = str_replace('Ó', 'Oacute', $p);
    $r = str_replace('Ú', 'Uacute', $q);
    $r = str_replace('Ã', 'Atilde', $r);
    $r = str_replace('Õ', 'Otilde', $r);
    $r = str_replace('Ç', 'Ccedil', $r); 
    $r = str_replace('Â', 'Acirc', $r);
    $r = str_replace('Ê', 'Ecirc', $r);
    $r = str_replace('Ô', 'Ocirc', $r);
    return $r;
}

?>

