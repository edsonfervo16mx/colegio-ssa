<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//print_r($atr);
		$alumno = new Alumno;
		$alumno->darAlta($key,$_GET['curp']);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../alumno-baja.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>