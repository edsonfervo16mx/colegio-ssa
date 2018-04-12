<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//atributos
		$fecha = date('Y-m-d');

		$atr = array(
			'fecha_abono_venta' => $fecha,
			'deposito_abono_venta' => $_POST['deposito'],
			'detalle_abono_venta' => $_POST['detalle'],
			'cve_cuenta_venta' => $_POST['id_cuenta'],
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
		);
		print_r($atr);

		$abonoventa = new AbonoVenta;
		$abonoventa->registrar($key, $atr);

		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../ventacuenta-ver.php?id='.$_POST['id_cuenta'].'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>