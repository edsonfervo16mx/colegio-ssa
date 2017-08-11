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
?>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Panel de reporte de corte</h4>
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
										if ($_POST['campus'] == $colCampus->cve_campus) {
											echo '<option value="'.$colCampus->cve_campus.'" selected>'.$colCampus->nombre_campus.'</option>';
										}else{
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
</div>
<?php
	//---------------------------------------------------

	$inscripcion = new AbonoInscripcion;
	$reporteInscripcion = $inscripcion->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);

	$servicio = new AbonoServicio;
	$reporteServicio = $servicio->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);

	$colegiatura = new AbonoColegiatura;
	$reporteColegiatura = $colegiatura->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);

	$venta = new AbonoVenta;
	$reporteVenta = $venta->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);

	$total_inscripcion = 0;
	$total_servicio = 0;
	$total_colegiatura = 0;
	$total_venta = 0;
	$total_ingreso = 0;

	foreach ($reporteInscripcion as $colInscripcion) {
		$total_inscripcion = $total_inscripcion + $colInscripcion->deposito_abono_inscripcion;
	}

	foreach ($reporteServicio as $colServicio) {
		$total_servicio = $total_servicio + $colServicio->deposito_abono_servicios;
	}

	foreach ($reporteColegiatura as $colColegiatura) {
		$total_colegiatura = $total_colegiatura + $colColegiatura->deposito_abono_colegiatura;
	}

	foreach ($reporteVenta as $colVenta) {
		$total_venta = $total_venta + $colVenta->deposito_abono_venta;
	}

	$total_ingreso = $total_inscripcion + $total_servicio + $total_colegiatura + $total_venta;

	//---------------------------------------------------
?>
<div class="row">
	<div class="col m3">
		<div class="card-panel center-align light-blue darken-1">
			<span class="white-text">
				<h5 class="center-align">Inscripciones</h5>
				<?php echo '$ '.number_format($total_inscripcion); ?>
			</span>
		</div>
	</div>
	<div class="col m3">
		<div class="card-panel center-align light-blue darken-3">
			<span class="white-text">
				<h5 class="center-align">Servicios</h5>
				<?php echo '$ '.number_format($total_servicio); ?>
			</span>
		</div>
	</div>
	<div class="col m3">
		<div class="card-panel center-align cyan darken-2">
			<span class="white-text">
				<h5 class="center-align">Colegiaturas</h5>
				<?php echo '$ '.number_format($total_colegiatura); ?>
			</span>
		</div>
	</div>
	<div class="col m3">
		<div class="card-panel center-align cyan darken-4">
			<span class="white-text">
				<h5 class="center-align">Ventas</h5>
				<?php echo '$ '.number_format($total_venta); ?>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<div class="row">
			<div class="col m12 s12">
				<a href="reportes-ingresos.php?campus=<?php echo base64_encode($_POST['campus']); ?>&fecha_inicio=<?php echo base64_encode($_POST['fecha_inicio']); ?>&fecha_final=<?php echo base64_encode($_POST['fecha_final']); ?>" class="waves-effect waves-light btn" target="_blank">
					<i class="material-icons left">library_books</i> Generar Reporte
				</a>
			</div>
		</div>
		<div class="card-panel grey lighten-5">
			<table class="highlight">
				<thead>
					<tr>
						<th>FOLIO</th>
						<th>FECHA</th>
						<th>CONCEPTO</th>
						<th>NOMBRE COMPLETO</th>
						<th>METODO PAGO</th>
						<th>DEPOSITO</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($reporteInscripcion as $colInscripcion) {
							echo '<tr>';
							echo '<td><small>'.$colInscripcion->folio_cuenta_inscripcion.$colInscripcion->cve_cuenta_inscripcion.'/A-'.$colInscripcion->cve_abono_inscripcion.'</small></td>';
							echo '<td><small>'.$colInscripcion->fecha_abono_inscripcion.'</small></td>';
							echo '<td><small>'.$colInscripcion->titulo_precio_inscripcion.'</small></td>';
							echo '<td><small>'.$colInscripcion->nombre_completo.'</small></td>';
							echo '<td><small>'.$colInscripcion->cve_metodo_pago.'</small></td>';
							echo '<td class="right-align">$ '.number_format($colInscripcion->deposito_abono_inscripcion).'</td>';
							echo '</tr>';
						}
						foreach ($reporteServicio as $colServicio) {
							echo '<tr>';
							echo '<td><small>'.$colServicio->folio_cuenta_servicios.$colServicio->cve_cuenta_servicios.'/A-'.$colServicio->cve_abono_servicios.'</small></td>';
							echo '<td><small>'.$colServicio->fecha_abono_servicios.'</small></td>';
							echo '<td><small>'.$colServicio->titulo_precio_servicios.'</small></td>';
							echo '<td><small>'.$colServicio->nombre_completo.'</small></td>';
							echo '<td><small>'.$colServicio->cve_metodo_pago.'</small></td>';
							echo '<td class="right-align">$ '.number_format($colServicio->deposito_abono_servicios).'</td>';
							echo '</tr>';
						}
						foreach ($reporteColegiatura as $colColegiatura) {
							echo '<tr>';
							echo '<td><small>'.$colColegiatura->folio_cuenta_colegiatura.$colColegiatura->cve_cuenta_colegiatura.'/A-'.$colColegiatura->cve_abono_colegiatura.'</small></td>';
							echo '<td><small>'.$colColegiatura->fecha_abono_colegiatura.'</small></td>';
							echo '<td><small>'.$colColegiatura->titulo_precio_colegiatura.'</small></td>';
							echo '<td><small>'.$colColegiatura->nombre_completo.'</small></td>';
							echo '<td><small>'.$colColegiatura->cve_metodo_pago.'</small></td>';
							echo '<td class="right-align">$ '.number_format($colColegiatura->deposito_abono_colegiatura).'</td>';
							echo '</tr>';
						}
						foreach ($reporteVenta as $colVenta) {
							echo '<tr>';
							echo '<td><small>'.$colVenta->folio_cuenta_venta.$colVenta->cve_cuenta_venta.'/A-'.$colVenta->cve_abono_venta.'</small></td>';
							echo '<td><small>'.$colVenta->fecha_abono_venta.'</small></td>';
							echo '<td><small>VENTA DE PRODUCTOS</small></td>';
							echo '<td><small>'.$colVenta->nombre_cuenta_venta.'</small></td>';
							echo '<td><small>'.$colVenta->cve_metodo_pago.'</small></td>';
							echo '<td class="right-align">$ '.number_format($colVenta->deposito_abono_venta).'</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>