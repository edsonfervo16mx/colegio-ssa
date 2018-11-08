<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	//echo $_POST['alumno_constructor'];
	//echo $_POST['cve_grupo'];

	$alumno = new Alumno;
	$datosAlumno = $alumno->consultaCurp($key, utf8_decode($_POST['alumno_constructor']));
	foreach ($datosAlumno as $colAlumno) {}


	if (isset($_SESSION['status'])) {
		//atributos
		$atr = array(
			'cve_constructor_grupo' => $_POST['cve_grupo'].'/'.$colAlumno->curp_alumno,
			'cve_grupo' => $_POST['cve_grupo'],
			'curp_alumno' => $colAlumno->curp_alumno
		);
		//print_r($atr);
		$constructor = new ConstructorGrupo;
		$constructor->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../constructor-registro.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>