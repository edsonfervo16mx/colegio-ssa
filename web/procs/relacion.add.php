<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	//echo $_POST['alumno'];
	//echo $_POST['tutor'];

	$alumno = new Alumno;
	$datosAlumno = $alumno->consultaCurp($key, $_POST['alumno']);
	foreach ($datosAlumno as $colAlumno) {}

	$tutor = new Tutor;
	$datosTutor = $tutor->consultaId($key, $_POST['tutor']);
	foreach ($datosTutor as $colTutor) {}


	if (isset($_SESSION['status'])) {
		//atributos
		$atr = array(
			'cve_relacion' => $colAlumno->curp_alumno.'/'.$colTutor->cve_tutor,
			'curp_alumno' => $colAlumno->curp_alumno,
			'cve_tutor' => $colTutor->cve_tutor
		);
		//print_r($atr);
		$relacion = new Relacion;
		$relacion->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../relacion-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>