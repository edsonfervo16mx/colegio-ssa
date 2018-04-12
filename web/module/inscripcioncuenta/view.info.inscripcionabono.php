<?php 
	$abonoinscripcion = new AbonoInscripcion;
	$datosAbonoInscripcion = $abonoinscripcion->generarRecibo($key, $_GET['id']);
	//print_r($datosAbonoInscripcion);
	foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {}

	//DETALLES DE LA CUENTA
	/**/
	$cuentainscripcion = new CuentaInscripcion;
	$datosCuentaInscripcion = $cuentainscripcion->ver($key, $colAbonoInscripcion->cve_cuenta_inscripcion);
	foreach ($datosCuentaInscripcion as $colCuentaInscripcion) {}

	$cantidades = $abonoinscripcion->listarDetalle($key, $colAbonoInscripcion->cve_cuenta_inscripcion);
	$abono = 0;
	foreach ($cantidades as $colCantidad) {
		if($colCantidad->cve_abono_inscripcion < $_GET['id']){
			$abono = $abono + $colCantidad->deposito_abono_inscripcion;
			#echo 'Estoy en el if<br>';
			#echo $colCantidad->cve_abono_inscripcion.'||'.$colCantidad->fecha_abono_inscripcion.'||'.$colCantidad->deposito_abono_inscripcion.'<br>';
		}
	}
	$descuento = $colAbonoInscripcion->monto_precio_inscripcion - $colAbonoInscripcion->monto_cuenta_inscripcion;
	$deuda = $colAbonoInscripcion->monto_cuenta_inscripcion - ($abono + $colAbonoInscripcion->deposito_abono_inscripcion);
	/**/
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Abono a cuenta inscripción</h4>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<div class="row">
				<div class="col m12 s12">
					<span class="black-text center-align">
						<h5>RECIBO DE PAGO</h5>
					</span>
				</div>
				<div class="col m3">
					<img src="img/logos/bachiller.png" class="responsive-img">
				</div>
				<div class="col m9 center-align">
					<h6><?php echo $colAbonoInscripcion->nombre_colegio; ?></h6>
					<h6><?php echo $colAbonoInscripcion->direccion_campus; ?></h6>
				</div>
			</div>
			<div class="row">
				<div class="col m4">
					<p>
						<strong>FOLIO: </strong>
						<?php echo $colAbonoInscripcion->folio_cuenta_inscripcion.$colAbonoInscripcion->cve_cuenta_inscripcion.'/A-'.$colAbonoInscripcion->cve_abono_inscripcion; ?><br>
					</p>
				</div>
				<div class="col m8 right-align">
					<p>
						<h6><?php echo $colAbonoInscripcion->correo_campus; ?></h6>
						<strong><?php echo date('l, d F Y H:i:s'); ?></strong>
					</p>
				</div>
				<div class="col m12">
					<strong>NOMBRE DEL ALUMNO: </strong>
					<?php echo $colAbonoInscripcion->nombre_completo; ?><br>
					<strong>ID ALUMNO: </strong>
					<?php echo $colAbonoInscripcion->curp_alumno; ?><br>
					<strong>DETALLES: </strong>
					<?php echo $colAbonoInscripcion->cve_constructor_grupo; ?><br>
					<strong>METODO PAGO: </strong>
					<?php echo $colAbonoInscripcion->cve_metodo_pago; ?><br>
					<strong>FECHA PAGO: </strong>
					<?php echo $colAbonoInscripcion->fecha_abono_inscripcion; ?><br>
				</div>
				<div class="col m12">
					<table>
						<thead>
							<tr>
								<th class="center-align">CANTIDAD</th>
								<th class="center-align">CONCEPTO</th>
								<th class="center-align">COSTO</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center-align">
									1
								</td>
								<td>
									<?php echo $colAbonoInscripcion->titulo_precio_inscripcion; ?><br>
									<?php echo $colAbonoInscripcion->detalle_precio_inscripcion; ?><br>
									<?php echo $colAbonoInscripcion->detalle_abono_inscripcion; ?><br>
								</td>
								<td class="right-align">
									<?php echo '$ '.number_format($colAbonoInscripcion->monto_precio_inscripcion); ?><br>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col m3 center-align">
					<p>TUTOR</p>
				</div>
				<div class="col m4 center-align">
					<p>
						<?php echo $colAbonoInscripcion->descripcion_usuario; ?>
					</p>
				</div>
				<div class="col m5">
					<div class="col m8">
						<p>
							<strong>SUBTOTAL: </strong><br>
							<strong>DESCUENTO: </strong><br>
							<strong>TOTAL A PAGAR: </strong><br>
							<strong>ABONADO: </strong><br>
							<strong>MONTO DE PAGO: </strong><br>
							<strong>USTED ADEUDA: </strong><br>
						</p>
					</div>
					<div class="col m4 right-align">
						<p>
							<?php echo '$ '.number_format($colAbonoInscripcion->monto_precio_inscripcion); ?><br>
							<?php echo '$ '.number_format($descuento); ?><br>
							<?php echo '$ '.number_format($colAbonoInscripcion->monto_cuenta_inscripcion); ?><br>
							<?php echo '$ '.number_format($abono); ?><br>
							<?php echo '$ '.number_format($colAbonoInscripcion->deposito_abono_inscripcion); ?><br>
							<?php echo '$ '.number_format($deuda); ?><br>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 right-align">
		<a href="inscripcioncuenta-ver.php?id=<?php echo $colAbonoInscripcion->cve_cuenta_inscripcion; ?>" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="recibo-inscripcion.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-blue darken-2" target="_blank">
			<i class="material-icons right">receipt</i>Imprimir ticket
		</a>
		<a href="inscripcionabono-modificar.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Modificar Abono
		</a>
	</div>
</div>