<?php 
	require_once '../config/string.connection.php';
	require_once '../module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		$folio = 'F-VENTA/'.date('y').'-';
		$fecha = date('Y-m-d');

		//validar el estado pago
		if ($_POST['monto_pago'] >= $_POST['monto_venta']) {
			$estadoPago = 'PAGADO';
		}else{
			$estadoPago = 'ADEUDO';
		}

		//atributos
		$cuenta = array(
			'folio_cuenta_venta' => $folio,
			'nombre_cuenta_venta' => $_POST['alumno'],
			'fecha_cuenta_venta' => $fecha,
			'monto_cuenta_venta' => $_POST['monto_venta'],
			'descripcion_cuenta_venta' => $_POST['detalle'],
			'cve_estado_pago' => $estadoPago,
			'caja_campus' => $_POST['caja_campus']
		);



		//test
		#print_r($cuenta);
		#echo '<br>';
		#print_r($abono);

		$cuentaventa = new CuentaVenta;
		$id_cuenta = $cuentaventa->registrar($key, $cuenta);

		$abono = array(
			'fecha_abono_venta' => $fecha,
			'deposito_abono_venta' => $_POST['monto_pago'],
			'detalle_abono_venta' => $_POST['detalle'],
			'cve_cuenta_venta' => $id_cuenta,
			'cve_estado_pago' => 'PAGADO',
			'cve_metodo_pago' => $_POST['metodo_pago'],
			'nombre_usuario' => $_SESSION['usuario']
		);

		$abonoventa = new AbonoVenta;
		$abonoventa->registrar($key, $abono);

		$rel = new RelVentasProducto;
		/**/
		$producto = new Producto;
		#echo "Prueba";
		
		/**/
		#echo $_POST['ID0'];
		//-------------------
		for ($i=0; $i <=20 ; $i++) {
			#echo $_POST['ID'.$i].'<br>';
			if ($_POST['ID'.$i]) {
				#echo '<br>-----------------------------------<br>';
				#echo $_POST['ID'.$i].'|||'.$_POST['cantidadID'.$_POST['ID'.$i]];
				//------------------------------------------------------
				$datoProducto = $producto->ver($key, $_POST['ID'.$i]);
				foreach ($datoProducto as $colProducto) {}
				#echo $colProducto->cve_producto.'<br>'.$colProducto->existencia_producto;
				$existencia_actual = $colProducto->existencia_producto - $_POST['cantidadID'.$_POST['ID'.$i]];
				#cho $colProducto->existencia_producto.'<br>';
				#echo $_POST['cantidadID'.$_POST['ID'.$i]].'<br>';
				#echo $existencia_actual.'<br>';
				#echo '***********************<br>';
				$producto->modificarExistencia($key, $_POST['ID'.$i], $existencia_actual);
				//------------------------------------------------------

				$lista = array(
							'cve_producto' => $_POST['ID'.$i],
							'cve_cuenta_venta' => $id_cuenta,
							'cantidad_rel_ventas_producto' => $_POST['cantidadID'.$_POST['ID'.$i]]
						);
				$rel->registrar($key, $lista);
			}
		}

		//print_r($atr);
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../ventacuenta-ver.php?id='.$id_cuenta.'">';
	}else{
		session_destroy();
		//print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		echo 'pagina de error';
	}

?>