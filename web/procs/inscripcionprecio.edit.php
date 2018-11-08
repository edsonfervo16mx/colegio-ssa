<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {

		//atributos
		$atr = array(
			'id' => $_POST['id'],
			'titulo_precio_inscripcion' => $_POST['titulo'],
			'monto_precio_inscripcion' => $_POST['monto'],
			'detalle_precio_inscripcion' => $_POST['detalle'],
			'cve_ciclo' => $_POST['cve_ciclo']
		);
		//print_r($atr);
		$precioinscripcion = new PrecioInscripcion;
		$precioinscripcion->modificar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../inscripcionprecio-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>