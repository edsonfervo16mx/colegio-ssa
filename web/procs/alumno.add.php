<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//fecha
		$nacimiento = $_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];

		//atributos
		$atr = array(
			'curp_alumno' => $_POST['curp'],
			'nombre_alumno' => $_POST['nombre'],
			'apellidop_alumno' => $_POST['apellido_paterno'],
			'apellidom_alumno' => $_POST['apellido_materno'],
			'nacimiento_alumno' => $nacimiento,
			'cve_sexo' => $_POST['sexo'],
			'correo_alumno' => $_POST['correo'],
			'direccion_alumno' => $_POST['direccion'],
			'observaciones_alumno' => $_POST['observaciones'],
			'cve_campus' => $_POST['campus']
		);
		//print_r($atr);
		$alumno = new Alumno;
		$alumno->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../alumno-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>