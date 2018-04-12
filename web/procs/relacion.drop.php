<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	//echo $_GET['id'];

	if (isset($_SESSION['status'])) {
		//atributos
		$atr = array(
			'id' => $_GET['id']
		);
		//print_r($atr);
		$relacion = new Relacion;
		$relacion->eliminar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../relacion-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>