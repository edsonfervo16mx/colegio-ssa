<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//constructor de clave
		$clave = $_POST['cve_ciclo']."/".$_POST['nombre_grupo'];
		//atributos
		$atr = array(
			'cve_grupo' => $clave,
			'nombre_grupo' => $_POST['nombre_grupo'],
			'cve_ciclo' => $_POST['cve_ciclo']
		);
		//print_r($atr);
		$grupo = new Grupo;
		$grupo->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../grupos.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>