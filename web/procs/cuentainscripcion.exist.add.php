<?php
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//echo "Datos Enviados...";

		//atributos
		/*
			curp
			nombre
			apellido_paterno
			apellido_materno
			anio
			mes
			dia
			sexo
			campus
			cve_grupo
			cve_precio_inscripcion
			metodo_pago
			monto
			abono
			adeudo
			detalle
		*/
		/**/

		//folio cuenta
		$foliocuenta = 'F-INSC/'.date('y').'-';

		//fecha cuenta
		$fechacuenta = date('Y-m-d');

		if ($_POST['abono'] >= $_POST['monto']) {
			$estadopago = 'PAGADO';
		}else{
			$estadopago = 'ADEUDO';
		}

		//CONSULTAR LA CURP DEL ALUMNO
		/**/
		$alumno = new Alumno;
		$datosAlumno = $alumno->consultaCurp($key, utf8_decode($_POST['alumno']));
		foreach ($datosAlumno as $colAlumno) {}
		$curp = $colAlumno->curp_alumno;
		/**/
		$atr = array(
			'curp_alumno' => $curp,
			'cve_grupo' => $_POST['cve_grupo'],
			'cve_constructor_grupo' => $_POST['cve_grupo'].'/'.$curp,
			'folio_cuenta_inscripcion' => $foliocuenta,
			'fecha_cuenta_inscripcion' => $fechacuenta,
			'cve_precio_inscripcion' => $_POST['cve_precio_inscripcion'],
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'monto_cuenta_inscripcion' => $_POST['monto'],
			'cve_estado_pago' => $estadopago,
			'fecha_abono_inscripcion' => $fechacuenta,
			'deposito_abono_inscripcion' => $_POST['abono'],
			'detalle_abono_inscripcion' => $_POST['detalle'],
			'nombre_usuario' => $_SESSION['usuario']
		);
		/**/
		#print_r($atr);
		/**/
		//REGISTRO DE CONSTRUCTOR DEL GRUPO
		$constructorgrupo = new ConstructorGrupo;
		$constructorgrupo->registrar($key, $atr);
		//REGISTRO DE CUENTA INSCRIPCION
		$cuentainscripcion = new CuentaInscripcion;
		$id_cuenta = $cuentainscripcion->registrar($key, $atr);
		//REGISTRO DEL ABONO A CUENTA INSCRIPCION
		//echo $id_cuenta;
		$abonoinscripcion = new AbonoInscripcion;
		$abonoinscripcion->registrarNew($key, $id_cuenta, $atr);
		//REDIRECCION
		print '<meta http-equiv="REFRESH" content="0; url=../inscripcioncuenta-ver.php?id='.$id_cuenta.'">';
		/**/
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}
?>