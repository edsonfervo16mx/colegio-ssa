<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {

		//atributos
		$atr = array(
			'cve_categoria' => $_POST['cve_categoria'],
			'nombre_categoria' => $_POST['nombre_categoria'],
			'detalle_categoria' => $_POST['detalle_categoria'],
			'cve_campus' => $_POST['cve_campus']
		);
		//print_r($atr);

		$catproducto = new CategoriaProducto;
		$catproducto->registrar($key, $atr);

		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../categoriaproductos-lista.php">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>