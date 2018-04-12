<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		
		//atributos
		/**/
		$atr = array(
			'cve_abono_servicios' => $_POST['id_abono'],
			'fecha_abono_servicios' => $_POST['fecha'],
			'deposito_abono_servicios' => $_POST['deposito'],
			'detalle_abono_servicios' => $_POST['detalle'],
			'cve_cuenta_servicios' => $_POST['id_cuenta'],
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
		);
		/**/
		//print_r($atr);

		$abonoservicio = new AbonoServicio;
		$abonoservicio->modificar($key, $atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../serviciocuenta-ver.php?id='.$_POST['id_cuenta'].'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>