<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//echo "Datos Enviados...";

		//atributos
		/*
			cve_cuenta_servicios[ai]
			folio_cuenta_servicios
			fecha_cuenta_servicios
			monto_cuenta_servicios
			descripcion_cuenta_servicios
			cve_precio_servicios
			cve_constructor_grupo
			cat_estado_pago_cve_estado_pago
			cve_abono_servicios
			fecha_abono_servicios
			deposito_abono_servicios
			detalle_abono_servicios
			cve_cuenta_servicios[fk]
			cve_estado_pago
			cve_metodo_pago
			nombre_usuario
		*/
		/**/

		//folio cuenta
		$foliocuenta = 'F-SERV/'.date('y').'-';

		//fecha cuenta
		$fechacuenta = date('Y-m-d');

		if ($_POST['abono'] >= $_POST['monto']) {
			$estadopago = 'PAGADO';
		}else{
			$estadopago = 'ADEUDO';
		}

		//CONSULTAR EL CONSTRUCTOR DEL ALUMNO
		$constructor = new ConstructorGrupo;
		$datosCostructor = $constructor->consultaCurp($key, $_POST['alumno']);
		foreach ($datosCostructor as $colConstructor) {}
		//----------------

		$atr = array(
			'folio_cuenta_servicios' => $foliocuenta,
			'fecha_cuenta_servicios' => $fechacuenta,
			'monto_cuenta_servicios'=> $_POST['monto'],
			'cve_precio_servicios' => $_POST['cve_precio_servicios'],
			'cve_constructor_grupo' => $colConstructor->cve_constructor_grupo,
			'cat_estado_pago_cve_estado_pago' => $estadopago,
			'fecha_abono_servicios' => $fechacuenta,
			'deposito_abono_servicios' => $_POST['abono'],
			'detalle_abono_servicios' => $_POST['detalle'],
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
		);
		/**/
		//print_r($atr);
		/**/
		//REGISTRO DE CUENTA INSCRIPCION
		$cuentaservicio = new CuentaServicio;
		$id_cuenta = $cuentaservicio->registrar($key,$atr);

		//REGISTRO DEL ABONO A CUENTA INSCRIPCION
		#echo $id_cuenta;
		$abonoservicio = new AbonoServicio;
		$abonoservicio->registrar($key, $id_cuenta, $atr);

		//REDIRECCION
		print '<meta http-equiv="REFRESH" content="0; url=../serviciocuenta-ver.php?id='.$id_cuenta.'">';
		/**/
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>