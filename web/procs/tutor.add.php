<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//atributos
		$atr = array(
			'nombre_tutor' => $_POST['nombre_tutor'],
			'apellidop_tutor' => $_POST['apellidop_tutor'],
			'apellidom_tutor' => $_POST['apellidom_tutor'],
			'correo_tutor' => $_POST['correo_tutor'],
			'telefono_tutor' => $_POST['telefono_tutor'],
			'observaciones_tutor' => $_POST['observaciones_tutor'],
			'cve_sexo' => $_POST['sexo']
		);
		//print_r($atr);
		$tutor = new Tutor;
		$tutor->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../tutor-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>