<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		//atributos
		//FECHA
		$fecha = date('Y-m-d');

		//VALIDACION DEL DEPOSITO A CUENTA
		if ($_POST['inter']) {
			$depositobase = $_POST['deposito'] - ($_POST['deposito'] * .1);
			$interes = $_POST['deposito'] - $depositobase;
		}else{
			$interes = 0;
			$depositobase = $_POST['deposito'] - $interes;
		}


		/**/
		$atr = array(
			'fecha_abono_colegiatura' => $fecha,
			'deposito_abono_colegiatura' => $depositobase,
			'interes_abono_colegiatura' => $interes,
			'detalle_abono_colegiatura' => $_POST['detalle'],
			'cve_cuenta_colegiatura' => $_POST['id'],
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
		);
		/**/
		#print_r($atr);

		$abonocole = new AbonoColegiatura;
		$id_abono = $abonocole->registrar($key, $atr);

		/**/
		$abonomes = new AbonoMes;
		$meses = array(
			'AGOSTO' => $_POST['AGOSTO'],
			'SEPTIEMBRE' => $_POST['SEPTIEMBRE'],
			'OCTUBRE' => $_POST['OCTUBRE'],
			'NOVIEMBRE' => $_POST['NOVIEMBRE'],
			'DICIEMBRE' => $_POST['DICIEMBRE'],
			'ENERO' => $_POST['ENERO'],
			'FEBRERO' => $_POST['FEBRERO'],
			'MARZO' => $_POST['MARZO'],
			'ABRIL' => $_POST['ABRIL'],
			'MAYO' => $_POST['MAYO'],
			'JUNIO' => $_POST['JUNIO'],
			'JULIO' => $_POST['JULIO'],
		);
		foreach ($meses as $keyMes => $value) {
			if ($value) {
				#echo $keyMes.' >>>> '.$value.'<br>';
				$abonomes->registrar($key, $id_abono ,$keyMes);
			}
		}
		/**/
		#print_r($meses);

		//teste
		#echo $id_abono;
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../colegiaturacuenta-ver.php?id='.$_POST['id'].'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>