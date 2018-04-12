<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//atributos
		$fecha = date('Y-m-d');

		$atr = array(
					'id' => $_POST['id_abono'],
					'fecha_abono_colegiatura' => $fecha,
					'deposito_abono_colegiatura' => $_POST['deposito_base'],
					'interes_abono_colegiatura' => $_POST['interes_base'],
					'detalle_abono_colegiatura' => $_POST['detalle'],
					'cve_cuenta_colegiatura' => $_POST['id_cuenta'],
					'cve_metodo_pago' => $_POST['metodo_pago'],
					'nombre_usuario' => $_SESSION['usuario']
				);

		#print_r($atr);
		$abonocole = new AbonoColegiatura;
		$abonocole->modificar($key, $atr);

		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../colegiaturaabono-ver.php?id='.$_POST['id_abono'].'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>