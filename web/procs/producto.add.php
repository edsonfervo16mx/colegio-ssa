<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {

		//atributos
		$atr = array(
			'titulo_producto' => $_POST['titulo_producto'],
			'detalle_producto' => $_POST['detalle_producto'],
			'descripcion_producto' => $_POST['descripcion_producto'],
			'precio_producto' => $_POST['precio_producto'],
			'existencia_producto' => $_POST['existencia_producto'],
			'cve_categoria' => $_POST['cve_categoria']
		);
		#print_r($atr);

		$producto = new Producto;
		$producto->registrar($key, $atr);

		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../producto-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>