<?php 
	$campus = new Campus;
	$datosCampus = $campus->listar($key);

	//validar fechas
	if ($_POST['fecha_inicio']) {
		$val_inicio = $_POST['fecha_inicio'];
	}else{
		$val_inicio = date('Y-m-d');
	}

	if ($_POST['fecha_final']) {
		$val_final = $_POST['fecha_final'];
	}else{
		$val_final = date('Y-m-d');
	}

	//totales de inscripcion
	$inscripcion_cheque = 0;
	$inscripcion_deposito = 0;
	$inscripcion_efectivo = 0;
	$inscripcion_credito = 0;
	$inscripcion_debito = 0;
	$inscripcion_transferencia = 0;
	$inscripcion_total = 0;
	//totales de servicios
	$servicios_cheque = 0;
	$servicios_deposito = 0;
	$servicios_efectivo = 0;
	$servicios_credito = 0;
	$servicios_debito = 0;
	$servicios_transferencia = 0;
	$servicios_total = 0;
	//totales de colegiaturas
	$colegiaturas_cheque = 0;
	$colegiaturas_deposito = 0;
	$colegiaturas_efectivo = 0;
	$colegiaturas_credito = 0;
	$colegiaturas_debito = 0;
	$colegiaturas_transferencia = 0;
	$colegiaturas_total = 0;
	//totales de ventas
	$ventas_cheque = 0;
	$ventas_deposito = 0;
	$ventas_efectivo = 0;
	$ventas_credito = 0;
	$ventas_debito = 0;
	$ventas_transferencia = 0;
	$ventas_total = 0;
	//totales gastos
	$gastos_cheque = 0;
	$gastos_deposito = 0;
	$gastos_efectivo = 0;
	$gastos_credito = 0;
	$gastos_debito = 0;
	$gastos_transferencia = 0;
	$gastos_total = 0;

?>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Panel de reporte general</h4>
	</div>
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<form action="" method="POST">
				<div class="row">
					<div class="col m12 s12">
						<div class="input-field col m6">
							<select name="campus">
								<option value="" disabled selected>Choose your option</option>
								<?php 
									foreach ($datosCampus as $colCampus) {
										//secundaria-bachiller
										if ($_SESSION['usuario'] == 'secundariajp' && ($colCampus->cve_campus == 'SEC' || $colCampus->cve_campus == 'BAC')) {
											echo '<option value="'.$colCampus->cve_campus.'" selected>'.$colCampus->nombre_campus.'</option>';
										}
										//primaria-preescolar
										if ($_SESSION['usuario'] != 'secundariajp' && ($colCampus->cve_campus == 'PRI' || $colCampus->cve_campus == 'PRE')) {
											echo '<option value="'.$colCampus->cve_campus.'">'.$colCampus->nombre_campus.'</option>';
										}
									}
								?>
							</select>
							<label>Campus</label>
						</div>
						<div class="col m3">
							<label for="fecha_inicio">Fecha Inicio</label>
							<input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $val_inicio; ?>">
						</div>
						<div class="col m3">
							<label for="fecha_final">Fecha Fin</label>
							<input type="date" name="fecha_final" id="fecha_final" value="<?php echo $val_final; ?>">
						</div>
					</div>
					<div class="col m12 s12">
						<div class="col m12 s12 right-align">
							<input type="submit" value="CONSULTAR" class="waves-effect waves-light btn">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- inscripciones -->
	<?php 
		$inscripcion = new AbonoInscripcion;
		$reporteInscripcion = $inscripcion->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);

		foreach ($reporteInscripcion as $colInscripcion) {
			if ($colInscripcion->cve_metodo_pago == "CHEQUE") {
				$inscripcion_cheque = $inscripcion_cheque + $colInscripcion->deposito_abono_inscripcion;
			}
			if ($colInscripcion->cve_metodo_pago == "DEPOSITO CUENTA") {
				$inscripcion_deposito = $inscripcion_deposito + $colInscripcion->deposito_abono_inscripcion;
			}
			if ($colInscripcion->cve_metodo_pago == "EFECTIVO") {
				$inscripcion_efectivo = $inscripcion_efectivo + $colInscripcion->deposito_abono_inscripcion;
			}
			if ($colInscripcion->cve_metodo_pago == "TARJETA DE CREDITO") {
				$inscripcion_credito = $inscripcion_credito + $colInscripcion->deposito_abono_inscripcion;
			}
			if ($colInscripcion->cve_metodo_pago == "TARJETA DE DEBITO") {
				$inscripcion_debito = $inscripcion_debito + $colInscripcion->deposito_abono_inscripcion;
			}
			if ($colInscripcion->cve_metodo_pago == "TRANSFERENCIA") {
				$inscripcion_transferencia = $inscripcion_transferencia + $colInscripcion->deposito_abono_inscripcion;
			}
		}
	?>
	<div class="col m12 s12">
		<h5 class="grey-text text-darken-1">Inscripciones</h5>
		<table>
			<thead>
				<tr>
					<th>MÉTODO DE PAGO</th>
					<th>CANTIDAD</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHEQUE</td>
					<td><?php echo number_format($inscripcion_cheque); ?></td>
				</tr>
					<tr>
					<td>DEPOSITO CUENTA</td>
					<td><?php echo number_format($inscripcion_deposito); ?></td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td><?php echo number_format($inscripcion_efectivo); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE CREDITO</td>
					<td><?php echo number_format($inscripcion_credito); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td><?php echo number_format($inscripcion_debito); ?></td>
				</tr>
				<tr>
					<td>TRANSFERENCIA</td>
					<td><?php echo number_format($inscripcion_transferencia); ?></td>
				</tr>
				<tr>
					<td>
						<strong>TOTAL</strong>
					</td>
					<td>
						<strong>
						<?php 
							$inscripcion_total = $inscripcion_cheque + $inscripcion_deposito +$inscripcion_efectivo + $inscripcion_credito + $inscripcion_debito + $inscripcion_transferencia;
							echo number_format($inscripcion_total);
						?>
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- servicios -->
	<?php 
		$servicio = new AbonoServicio;
		$reporteServicio = $servicio->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);
		foreach ($reporteServicio as $colServicio) {
			if ($colServicio->cve_metodo_pago == "CHEQUE") {
				$servicios_cheque = $servicios_cheque + $colServicio->deposito_abono_servicios;
			}
			if ($colServicio->cve_metodo_pago == "DEPOSITO CUENTA") {
				$servicios_deposito = $servicios_deposito + $colServicio->deposito_abono_servicios;
			}
			if ($colServicio->cve_metodo_pago == "EFECTIVO") {
				$servicios_efectivo = $servicios_efectivo + $colServicio->deposito_abono_servicios;
			}
			if ($colServicio->cve_metodo_pago == "TARJETA DE CREDITO") {
				$servicios_credito = $servicios_credito + $colServicio->deposito_abono_servicios;
			}
			if ($colServicio->cve_metodo_pago == "TARJETA DE DEBITO") {
				$servicios_debito = $servicios_debito + $colServicio->deposito_abono_servicios;
			}
			if ($colServicio->cve_metodo_pago == "TRANSFERENCIA") {
				$servicios_transferencia = $servicios_transferencia + $colServicio->deposito_abono_servicios;
			}
		}
	?>
	<div class="col m12 s12">
		<h5 class="grey-text text-darken-1">Servicios</h5>
		<table>
			<thead>
				<tr>
					<th>MÉTODO DE PAGO</th>
					<th>CANTIDAD</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHEQUE</td>
					<td><?php echo number_format($servicios_cheque); ?></td>
				</tr>
					<tr>
					<td>DEPOSITO CUENTA</td>
					<td><?php echo number_format($servicios_deposito); ?></td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td><?php echo number_format($servicios_efectivo); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE CREDITO</td>
					<td><?php echo number_format($servicios_credito); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td><?php echo number_format($servicios_debito); ?></td>
				</tr>
				<tr>
					<td>TRANSFERENCIA</td>
					<td><?php echo number_format($servicios_transferencia); ?></td>
				</tr>
				<tr>
					<td>
						<strong>TOTAL</strong>
					</td>
					<td>
						<strong>
						<?php 
							$servicios_total = $servicios_cheque + $servicios_deposito +$servicios_efectivo + $servicios_credito + $servicios_efectivo + $servicios_debito;
							echo number_format($servicios_total);
						?>
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- colegiaturas -->
	<?php
		$colegiatura = new AbonoColegiatura;
		$reporteColegiatura = $colegiatura->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);

		foreach ($reporteColegiatura as $colColegiatura) {
			//$total_colegiatura = $total_colegiatura + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			if ($colColegiatura->cve_metodo_pago == "CHEQUE") {
				$colegiaturas_cheque = $colegiaturas_cheque + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			}
			if ($colColegiatura->cve_metodo_pago == "DEPOSITO CUENTA") {
				$colegiaturas_deposito = $colegiaturas_deposito + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			}
			if ($colColegiatura->cve_metodo_pago == "EFECTIVO") {
				$colegiaturas_efectivo = $colegiaturas_efectivo + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			}
			if ($colColegiatura->cve_metodo_pago == "TARJETA DE CREDITO") {
				$colegiaturas_credito = $colegiaturas_credito + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			}
			if ($colColegiatura->cve_metodo_pago == "TARJETA DE DEBITO") {
				$colegiaturas_debito = $colegiaturas_debito + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			}
			if ($colColegiatura->cve_metodo_pago == "TRANSFERENCIA") {
				$colegiaturas_transferencia = $colegiaturas_transferencia + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
			}
		}
	?>
	<div class="col m12 s12">
		<h5 class="grey-text text-darken-1">Colegiaturas</h5>
		<table>
			<thead>
				<tr>
					<th>MÉTODO DE PAGO</th>
					<th>CANTIDAD</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHEQUE</td>
					<td><?php echo number_format($colegiaturas_cheque); ?></td>
				</tr>
					<tr>
					<td>DEPOSITO CUENTA</td>
					<td><?php echo number_format($colegiaturas_deposito); ?></td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td><?php echo number_format($colegiaturas_efectivo); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE CREDITO</td>
					<td><?php echo number_format($colegiaturas_credito); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td><?php echo number_format($colegiaturas_debito); ?></td>
				</tr>
				<tr>
					<td>TRANSFERENCIA</td>
					<td><?php echo number_format($colegiaturas_transferencia); ?></td>
				</tr>
				<tr>
					<td>
						<strong>TOTAL</strong>
					</td>
					<td>
						<strong>
						<?php 
							$colegiaturas_total = $colegiaturas_cheque + $colegiaturas_deposito +$colegiaturas_efectivo + $colegiaturas_credito + $colegiaturas_debito + $colegiaturas_transferencia;
							echo number_format($colegiaturas_total);
						?>
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- ventas -->
	<?php 
		$venta = new AbonoVenta;
		$reporteVenta = $venta->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);
		foreach ($reporteVenta as $colVenta) {
			//$total_venta = $total_venta + $colVenta->deposito_abono_venta;
			if ($colVenta->cve_metodo_pago == "CHEQUE") {
				$ventas_cheque = $ventas_cheque + $colVenta->deposito_abono_venta;
			}
			if ($colVenta->cve_metodo_pago == "DEPOSITO CUENTA") {
				$ventas_deposito = $ventas_deposito + $colVenta->deposito_abono_venta;
			}
			if ($colVenta->cve_metodo_pago == "EFECTIVO") {
				$ventas_efectivo = $ventas_efectivo + $colVenta->deposito_abono_venta;
			}
			if ($colVenta->cve_metodo_pago == "TARJETA DE CREDITO") {
				$ventas_credito = $ventas_credito + $colVenta->deposito_abono_venta;
			}
			if ($colVenta->cve_metodo_pago == "TARJETA DE DEBITO") {
				$ventas_debito = $ventas_debito + $colVenta->deposito_abono_venta;
			}
			if ($colVenta->cve_metodo_pago == "TRANSFERENCIA") {
				$ventas_transferencia = $ventas_transferencia + $colVenta->deposito_abono_venta;
			}
		}
	?>
	<div class="col m12 s12">
		<h5 class="grey-text text-darken-1">Ventas</h5>
		<table>
			<thead>
				<tr>
					<th>MÉTODO DE PAGO</th>
					<th>CANTIDAD</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHEQUE</td>
					<td><?php echo number_format($ventas_cheque); ?></td>
				</tr>
					<tr>
					<td>DEPOSITO CUENTA</td>
					<td><?php echo number_format($ventas_deposito); ?></td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td><?php echo number_format($ventas_efectivo); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE CREDITO</td>
					<td><?php echo number_format($ventas_credito); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td><?php echo number_format($ventas_debito); ?></td>
				</tr>
				<tr>
					<td>TRANSFERENCIA</td>
					<td><?php echo number_format($ventas_transferencia); ?></td>
				</tr>
				<tr>
					<td>
						<strong>TOTAL</strong>
					</td>
					<td>
						<strong>
						<?php 
							$ventas_total = $ventas_cheque + $ventas_deposito +$ventas_efectivo + $ventas_credito + $ventas_debito + $ventas_transferencia;
							echo number_format($ventas_total);
						?>
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- Gastos -->
	<?php
		$gasto = new Gasto;
		$reporteGasto = $gasto->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);
		foreach ($reporteGasto as $colGasto) {
			if ($colGasto->cve_metodo_pago == "CHEQUE") {
				$gastos_cheque = $gastos_cheque + $colGasto->monto_gasto;
			}
			if ($colGasto->cve_metodo_pago == "DEPOSITO CUENTA") {
				$gastos_deposito = $gastos_deposito + $colGasto->monto_gasto;
			}
			if ($colGasto->cve_metodo_pago == "EFECTIVO") {
				$gastos_efectivo = $gastos_efectivo + $colGasto->monto_gasto;
			}
			if ($colGasto->cve_metodo_pago == "TARJETA DE CREDITO") {
				$gastos_credito = $gastos_credito + $colGasto->monto_gasto;
			}
			if ($colGasto->cve_metodo_pago == "TARJETA DE DEBITO") {
				$gastos_debito = $gastos_debito + $colGasto->monto_gasto;
			}
			if ($colGasto->cve_metodo_pago == "TRANSFERENCIA") {
				$gastos_transferencia = $gastos_transferencia + $colGasto->monto_gasto;
			}
		}
	?>
	<div class="col m12 s12">
		<h5 class="grey-text text-darken-1">Gastos</h5>
		<table>
			<thead>
				<tr>
					<th>MÉTODO DE PAGO</th>
					<th>CANTIDAD</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CHEQUE</td>
					<td><?php echo number_format($gastos_cheque); ?></td>
				</tr>
					<tr>
					<td>DEPOSITO CUENTA</td>
					<td><?php echo number_format($gastos_deposito); ?></td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td><?php echo number_format($gastos_efectivo); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE CREDITO</td>
					<td><?php echo number_format($gastos_credito); ?></td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td><?php echo number_format($gastos_debito); ?></td>
				</tr>
				<tr>
					<td>TRANSFERENCIA</td>
					<td><?php echo number_format($gastos_transferencia); ?></td>
				</tr>
				<tr>
					<td>
						<strong>TOTAL</strong>
					</td>
					<td>
						<strong>
						<?php 
							$gastos_total = $gastos_cheque + $gastos_deposito +$gastos_efectivo + $gastos_credito + $gastos_debito + $gastos_transferencia;
							echo number_format($gastos_total);
						?>
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php 
		$arrayInscripcion = array($inscripcion_cheque,$inscripcion_deposito,$inscripcion_efectivo,$inscripcion_credito,$inscripcion_debito,$inscripcion_transferencia,$inscripcion_total);

		$arrayServicios = array($servicios_cheque,$servicios_deposito,$servicios_efectivo,$servicios_credito,$servicios_debito,$servicios_transferencia,$servicios_total);

		$arrayColegiaturas = array($colegiaturas_cheque,$colegiaturas_deposito,$colegiaturas_efectivo,$colegiaturas_credito,$colegiaturas_debito,$colegiaturas_transferencia,$colegiaturas_total);

		$arrayVentas = array($ventas_cheque,$ventas_deposito,$ventas_efectivo,$ventas_credito,$ventas_debito,$ventas_transferencia,$ventas_total);

		$arrayGastos = array($gastos_cheque,$gastos_deposito,$gastos_efectivo,$gastos_credito,$gastos_debito,$gastos_transferencia,$gastos_total);
	?>
	<div class="col m12 s12">
	<!-- PENDIENTE ESTE REPORTE -->
	<!-- pasar otros parametros -->
		<a href="reportes-balance.php?campus=<?php echo base64_encode($_POST['campus']); ?>&fecha_inicio=<?php echo base64_encode($_POST['fecha_inicio']); ?>&fecha_final=<?php echo base64_encode($_POST['fecha_final']); ?>&arrayInscripcion=<?php echo serialize($arrayInscripcion); ?>&arrayServicios=<?php echo serialize($arrayServicios); ?>&arrayColegiaturas=<?php echo serialize($arrayColegiaturas); ?>&arrayVentas=<?php echo serialize($arrayVentas); ?>&arrayGastos=<?php echo serialize($arrayGastos); ?>" class="waves-effect waves-light btn" target="_blank">
			<i class="material-icons left">library_books</i> Generar Reporte
		</a>
	<!-- PENDIENTE ESTE REPORTE -->
	</div>
</div>