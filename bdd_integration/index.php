<?php

include 'integrador.php';

$file = fopen("cedulas.csv","r");
$file_o = fopen("cedulas_extendida.csv","w");

$marca = false;
$count = 1;

while(!feof($file))  {
	
	$temp_integrante = fgetcsv($file);
	$elementoIntegrante = $temp_integrante[0];
    $autoriza = obtieneToken();
	if($autoriza!='1'){
		echo $count . '**************';
		$varAux = consultaCedulaRegistroCivil($elementoIntegrante, $autoriza);
		if ($varAux == 0) {
			echo $varAux;
		} elseif ($varAux == 10) {
			echo $varAux;
		} else {
			$marca = true;
			$ced = explode('##', $varAux);
			fputcsv($file_o,$ced);
		}
	} else 
		echo "No se pudo establecer conexion con el Registro Civil";
	
	//usleep(500);
	$count++;
	
}

fclose($file);
fclose($file_o);

?>