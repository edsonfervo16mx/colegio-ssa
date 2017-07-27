<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {

		$f = rand(1000,9999);
		$clave = $_POST['cve_ciclo'].'/'.'SERV/'.date('Y').date('m').date('d').'/'.$f;

		//atributos
		$atr = array(
			'cve_precio_servicios' => $clave,
			'titulo_precio_servicios' => $_POST['titulo'],
			'monto_precio_servicios' => $_POST['monto'],
			'detalle_precio_servicios' => $_POST['detalle'],
			'cve_ciclo' => $_POST['cve_ciclo']
		);
		//print_r($atr);
		$precioservicio = new PrecioServicio;
		$precioservicio->registrar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../servicioprecio-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>