<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	//echo $_POST['alumno_constructor'];
	//echo $_POST['cve_grupo'];

	if (isset($_SESSION['status'])) {
		//atributos
		$atr = array(
			'id' => $_POST['id'],
			'cve_constructor_grupo' => $_POST['cve_grupo'].'/'.$_POST['curp'],
			'cve_grupo' => $_POST['cve_grupo'],
			'curp_alumno' => $_POST['curp']
		);
		//print_r($atr);
		$constructor = new ConstructorGrupo;
		$constructor->modificar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../constructor-registro.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>