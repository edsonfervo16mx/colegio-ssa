<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//--------------
		//folio cuenta
		$foliocuenta = 'F-COLE/'.date('y').'-';

		//fecha cuenta
		$fecha = date('Y-m-d');

		$constructor = new ConstructorGrupo;
		$datosConstructor = $constructor->consultaCurp($key, utf8_decode($_POST['alumno']));
		foreach ($datosConstructor as $colConstructor) {}

		//--------------
		//atributos
		$atr = array(
			'folio_cuenta_colegiatura' => $foliocuenta,
			'fecha_cuenta_colegiatura' => $fecha,
			'monto_cuenta_colegiatura' => $_POST['monto'],
			'beca_cuenta_colegiatura' => $_POST['beca'],
			'descripcion_cuenta_colegiatura' => $_POST['detalle'],
			'cve_precio_colegiatura' => $_POST['cve_precio_colegiatura'],
			'cve_constructor_grupo' => $colConstructor->cve_constructor_grupo,
			'cve_estado_pago' => 'ADEUDO'
		);
		#print_r($atr);
		#echo $colConstructor->cve_constructor_grupo;

		$cuentacole = new CuentaColegiatura;
		$id_cuenta = $cuentacole->registrar($key, $atr);

		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../colegiaturacuenta-ver.php?id='.$id_cuenta.'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>