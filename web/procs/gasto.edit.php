<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//atributos
		$atr = array(
			'id' => $_POST['id'],
			'titulo_gasto' => $_POST['titulo'],
			'fecha_gasto' => $_POST['fecha'],
			'descripcion_gasto' => $_POST['detalle'],
			'monto_gasto' => $_POST['monto'],
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'cve_ciclo' => $_POST['ciclo']
		);
		//print_r($atr);
		$gasto = new Gasto;
		$gasto->modificar($key,$atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../gastos-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>