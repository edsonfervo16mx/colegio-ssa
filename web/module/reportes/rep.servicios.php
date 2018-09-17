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

	$precioservicio = new PrecioServicio;
	$datosPrecioServicio = $precioservicio->listar($key);
?>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Conceptos por Servicios</h4>
	</div>
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<form action="" method="POST">
				<div class="row">
					<div class="col m12 s12">
						<div class="input-field col m4">
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
						<div class="col m4">
							<label for="fecha_inicio">Fecha Inicio</label>
							<input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $val_inicio; ?>">
						</div>
						<div class="col m4">
							<label for="fecha_final">Fecha Fin</label>
							<input type="date" name="fecha_final" id="fecha_final" value="<?php echo $val_final; ?>">
						</div>
					</div>
					<div class="col m12 s12">
						<div class="col m6">
							<label>Costo de Inscripción</label>
							<select name="cve_precio_servicios" id="cve_precio_servicios">
								<option value="" disabled selected>Choose your option</option>
								<?php 
									/**/
									foreach ($datosPrecioServicio as $colPrecioServicio) {
										echo '<option value="'.$colPrecioServicio->cve_precio_servicios.'">$ '.number_format($colPrecioServicio->monto_precio_servicios).' ('.$colPrecioServicio->titulo_precio_servicios.' )</option>';
									}
									/**/
								?>
							</select>
						</div>
						<div class="col m4 right-align">
							<input type="submit" value="CONSULTAR" class="waves-effect waves-light btn">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<a href="reportes-conceptosservicios.php?campus=<?php echo base64_encode($_POST['campus']); ?>&fecha_inicio=<?php echo base64_encode($_POST['fecha_inicio']); ?>&fecha_final=<?php echo base64_encode($_POST['fecha_final']); ?>&cve_servicio=<?php echo base64_encode($_POST['cve_precio_servicios']); ?>" class="waves-effect waves-light btn" target="_blank">
			<i class="material-icons left">library_books</i> Generar Reporte
		</a>
	</div>
</div>
<?php
	$servicio = new AbonoServicio;
	$reporteServicio = $servicio->reporte($key,$_POST['campus'], $_POST['fecha_inicio'], $_POST['fecha_final']);
?>
<div class="row">
	<div class="col m12 s12">
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
					foreach ($reporteServicio as $colServicio) {
						if ($_POST['cve_precio_servicios'] == $colServicio->cve_precio_servicios) {
							echo '<tr>';
							echo '<td><small>'.$colServicio->folio_cuenta_servicios.$colServicio->cve_cuenta_servicios.'/A-'.$colServicio->cve_abono_servicios.'</small></td>';
							echo '<td><small>'.$colServicio->fecha_abono_servicios.'</small></td>';
							echo '<td><small>'.$colServicio->titulo_precio_servicios.'</small></td>';
							echo '<td><small>'.$colServicio->nombre_completo.'</small></td>';
							echo '<td><small>'.$colServicio->cve_metodo_pago.'</small></td>';
							echo '<td class="right-align">$ '.$colServicio->deposito_abono_servicios.'</td>';
							echo '</tr>';
							}
					}
				?>
			</tbody>
		</table>
	</div>
</div>