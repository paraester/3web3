<?php
ini_set('error_reporting',E_ALL);//lembrar php.ini
$fatorial = 5;
$resultado = 1;
for ($n = 1; $n <= $fatorial; $n++) {
    $resultado *= $n;
}
echo "O fatorial de $fatorial é $resultado.\n";
