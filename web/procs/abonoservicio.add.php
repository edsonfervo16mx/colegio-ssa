<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	//PENDIENTE ESTE PROCESAR

	if (isset($_SESSION['status'])) {
		$fecha = date('Y-m-d');

		//validar si es saldada la cuenta
		$cuentaservicio = new CuentaServicio;
		$datosCuentaServicio = $cuentaservicio->ver($key, $_POST['id']);
		foreach ($datosCuentaServicio as $colCuentaServicio) {}

		$abonoservicio = new AbonoServicio;
		$datosAbonoServicio = $abonoservicio->listarDetalle($key, $_POST['id']);
		$abono = 0;
		foreach ($datosAbonoServicio as $colAbonoServicio) {
			$abono = $abono + $colAbonoServicio->deposito_abono_servicios;
		}
		$deuda = $colCuentaServicio->monto_cuenta_servicios - ($abono + $_POST['deposito']);

		if ($deuda <= 0) {
			$cuentaservicio->liquidar($key, $_POST['id']);
			#echo 'Estoy en el IF...<br>';
		}
		#echo $deuda.' = '.$colCuentaServicio->monto_cuenta_servicios.' - ('.$abono.'+'.$_POST['deposito'].')<br>';
		//atributos-----------------
		$atr = array(
			'fecha_abono_servicios' => $fecha,
			'deposito_abono_servicios' => $_POST['deposito'],
			'detalle_abono_servicios' => $_POST['detalle'],
			'cve_cuenta_servicios' => $_POST['id'],
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
			);
		//print_r($atr);
		//atributos-----------------
		//REGISTRO DEL ABONO A CUENTA DE SERVICIOS
		$abonoservicio->registrar($key,$_POST['id'],$atr);

		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../serviciocuenta-ver.php?id='.$_POST['id'].'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>