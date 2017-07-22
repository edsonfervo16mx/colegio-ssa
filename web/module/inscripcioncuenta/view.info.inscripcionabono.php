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
	$abonoAnterior = 0;
	$abonoActual = 0;
	foreach ($cantidades as $colCantidad) {
		if($colCantidad->cve_abono_inscripcion != $_GET['id']){
			$abonoAnterior = $abonoAnterior + $colCantidad->deposito_abono_inscripcion;
		}
	}
	$descuento = $colAbonoInscripcion->monto_precio_inscripcion - $colAbonoInscripcion->monto_cuenta_inscripcion;
	$deudaAnterior = $colAbonoInscripcion->monto_cuenta_inscripcion - $abonoAnterior;
	$abonoActual = $abonoAnterior +  $colAbonoInscripcion->deposito_abono_inscripcion;
	$deudaActual = $colAbonoInscripcion->monto_cuenta_inscripcion - $abonoActual;

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
							<strong>SUBTOTAL ABONO: </strong><br>
							<strong>USTED DEBÍA: </strong><br>
							<strong>MONTO DE PAGO: </strong><br>
							<strong>TOTAL ABONADO: </strong><br>
							<strong>USTED ADEUDA: </strong><br>
						</p>
					</div>
					<div class="col m4 right-align">
						<p>
							<?php echo '$ '.number_format($colAbonoInscripcion->monto_precio_inscripcion); ?><br>
							<?php echo '$ '.number_format($descuento); ?><br>
							<?php echo '$ '.number_format($colAbonoInscripcion->monto_cuenta_inscripcion); ?><br>
							<?php echo '$ '.number_format($abonoAnterior); ?><br>
							<?php echo '$ '.number_format($deudaAnterior); ?><br>
							<?php echo '$ '.number_format($colAbonoInscripcion->deposito_abono_inscripcion); ?><br>
							<?php echo '$ '.number_format($abonoActual); ?><br>
							<?php echo '$ '.number_format($deudaActual); ?><br>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>