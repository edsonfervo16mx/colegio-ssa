<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		$fecha = date('Y-m-d');

		//validar si es saldada la cuenta
		$cuentainscripcion = new CuentaInscripcion;
		$datosCuentaInscripcion = $cuentainscripcion->ver($key, $_POST['id']);
		foreach ($datosCuentaInscripcion as $colCuentaInscripcion) {}

		$abonoinscripcion = new AbonoInscripcion;
		$datosAbonoInscripcion = $abonoinscripcion->listarDetalle($key, $_POST['id']);
		$abono = 0;
		foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {
			$abono = $abono + $colAbonoInscripcion->deposito_abono_inscripcion;
		}
		$deuda = $colCuentaInscripcion->monto_cuenta_inscripcion - $abono - $_POST['deposito'];

		if ($deuda <= 0) {
			$cuentainscripcion->liquidar($key, $_POST['id']);
		}
		//

		//atributos
		$atr = array(
			'fecha_abono_inscripcion' => $fecha,
			'deposito_abono_inscripcion' => $_POST['deposito'],
			'detalle_abono_inscripcion' => $_POST['detalle'],
			'cve_cuenta_inscripcion' => $_POST['id'],
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
		);
		//print_r($atr);

		#$abonoinscripcion = new AbonoInscripcion;
		$abonoinscripcion->registrarNew($key, $_POST['id'], $atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../inscripcioncuenta-ver.php?id='.$_POST['id'].'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>