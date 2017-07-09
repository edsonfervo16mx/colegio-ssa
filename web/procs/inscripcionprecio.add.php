<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {

		$f = rand(1000,9999);
		$clave = $_POST['cve_ciclo'].'/'.'INSC/'.date('Y').date('m').date('d').'/'.$f;

		//atributos
		$atr = array(
			'cve_precio_inscripcion' => $clave,
			'titulo_precio_inscripcion' => $_POST['titulo'],
			'monto_precio_inscripcion' => $_POST['monto'],
			'detalle_precio_inscripcion' => $_POST['detalle'],
			'cve_ciclo' => $_POST['cve_ciclo']
		);
		//print_r($atr);
		$precioinscripcion = new PrecioInscripcion;
		$precioinscripcion->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../inscripcionprecio-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>