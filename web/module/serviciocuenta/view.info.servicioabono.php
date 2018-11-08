<?php 
	$abonoservicio = new AbonoServicio;
	$datosAbonoServicio = $abonoservicio->generarRecibo($key, $_GET['id']);
	//print_r($datosAbonoServicio);
	foreach ($datosAbonoServicio as $colAbonoServicio) {}

	//DETALLES DE LA CUENTA
	/**/
	$cuentaservicio = new CuentaServicio;
	$datosCuentaServicio = $cuentaservicio->ver($key, $colAbonoServicio->cve_cuenta_servicios);
	foreach ($datosCuentaServicio as $colCuentaServicio) {}

	$cantidades = $abonoservicio->listarDetalle($key, $colAbonoServicio->cve_cuenta_servicios);
	$abono = 0;
	foreach ($cantidades as $colCantidad) {
		if ($colCantidad->cve_abono_servicios < $_GET['id']) {
			$abono = $abono + $colCantidad->deposito_abono_servicios;
		}
	}
	$descuento = $colAbonoServicio->monto_precio_servicios - $colAbonoServicio->monto_cuenta_servicios;
	$deuda = $colAbonoServicio->monto_cuenta_servicios - ($abono + $colAbonoServicio->deposito_abono_servicios);
	/**/
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Abono a cuenta servicios</h4>
	</div>
</div>
<!-- Recibo-->
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
					<h6><?php echo $colAbonoServicio->nombre_colegio; ?></h6>
					<h6><?php echo $colAbonoServicio->direccion_campus; ?></h6>
				</div>
			</div>
			<div class="row">
				<div class="col m4">
					<p>
						<strong>FOLIO: </strong>
						<?php echo $colAbonoServicio->folio_cuenta_servicios.$colAbonoServicio->cve_cuenta_servicios.'/A-'.$colAbonoServicio->cve_abono_servicios; ?><br>
					</p>
				</div>
				<div class="col m8 right-align">
					<p>
						<h6><?php echo $colAbonoServicio->correo_campus; ?></h6>
						<strong><?php echo date('l, d F Y H:i:s'); ?></strong>
					</p>
				</div>
				<div class="col m12">
					<strong>NOMBRE DEL ALUMNO: </strong>
					<?php echo $colAbonoServicio->nombre_completo; ?><br>
					<strong>ID ALUMNO: </strong>
					<?php echo $colAbonoServicio->curp_alumno; ?><br>
					<strong>DETALLES: </strong>
					<?php echo $colAbonoServicio->cve_constructor_grupo; ?><br>
					<strong>METODO PAGO: </strong>
					<?php echo $colAbonoServicio->cve_metodo_pago; ?><br>
					<strong>FECHA PAGO: </strong>
					<?php echo $colAbonoServicio->fecha_abono_servicios; ?><br>
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
									<?php echo $colAbonoServicio->titulo_precio_servicios; ?><br>
									<?php echo $colAbonoServicio->detalle_precio_servicios; ?><br>
									<?php echo $colAbonoServicio->detalle_abono_servicios; ?><br>
								</td>
								<td class="right-align">
									<?php echo '$ '.number_format($colAbonoServicio->monto_precio_servicios); ?><br>
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
						<?php echo $colAbonoServicio->descripcion_usuario; ?>
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
							<?php echo '$ '.number_format($colAbonoServicio->monto_precio_servicios); ?><br>
							<?php echo '$ '.number_format($descuento); ?><br>
							<?php echo '$ '.number_format($colAbonoServicio->monto_cuenta_servicios); ?><br>
							<?php echo '$ '.number_format($abono); ?><br>
							<?php echo '$ '.number_format($colAbonoServicio->deposito_abono_servicios); ?><br>
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
		<a href="serviciocuenta-ver.php?id=<?php echo $colAbonoServicio->cve_cuenta_servicios; ?>" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="recibo-servicios.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-blue darken-2" target="_blank">
			<i class="material-icons right">receipt</i>Imprimir ticket
		</a>
		<a href="servicioabono-modificar.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Modificar Abono
		</a>
	</div>
</div>
<!-- /Recibo-->