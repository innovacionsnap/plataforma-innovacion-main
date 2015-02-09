<?php

include_once('../../config.php');

//var_dump($_POST);
//echo $_SESSION['codigo_del_solicitante'];

$formData[0] = $_POST['innovacion_accion'];

if ($formData[0] == '') {
	
	//echo 'Ingreso RTV1';

	require_once '../controller/pag1.php';
	$controller = new pag1_controller();
	$resultado = $controller->ejemplo_funcion_pag1($formData, 'ingreso');
	
}

?>