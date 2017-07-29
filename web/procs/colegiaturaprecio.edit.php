<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {

		

		//atributos
		$atr = array(
			'id' => $_POST['id'],
			'titulo_precio_colegiatura' => $_POST['titulo'],
			'monto_precio_colegiatura' => $_POST['monto'],
			'meses_precio_colegiatura' => $_POST['meses'],
			'detalle_precio_colegiatura' => $_POST['detalle'],
			'cve_ciclo' => $_POST['cve_ciclo']
		);
		//print_r($atr);
		$preciocolegiatura = new PrecioColegiatura;
		$preciocolegiatura->modificar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../colegiaturaprecio-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>