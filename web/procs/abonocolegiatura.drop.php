<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//atributos
		$fecha_actual = date('Y-m-d');
		$fecha_folio = $_GET['fecha_folio'];

		if ($fecha_actual == $fecha_folio) {

			$folio = $_GET['folio'];
			$cuenta = $_GET['cuenta'];

			$abonocole = new AbonoColegiatura;
			$abonocole->eliminar($key, $folio);

			//redireccion
			print '<meta http-equiv="REFRESH" content="0; url=../colegiaturacuenta-ver.php?id='.$cuenta.'">';

		}else{
			session_destroy();
			//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
			echo 'pagina de error-request';
		}
		
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>