<?php 
	$precioservicio = new PrecioServicio;
	$datosPrecioServicio = $precioservicio->listar($key);

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Crear cuenta de servicios</h4>
	</div>
	<div class="col m12">
		<form action="procs/serviciocuenta.add.php" method="POST">
			<div class="col m12 s12">
				<div class="card-panel grey lighten-5">
					<div class="row">
						<div class="col m12 s12">
							<div class="col m12 s12">
								<h5>Alumno</h5>
								<div class="input-field col m9 s12">
									<i class="material-icons prefix">perm_identity</i>
									<input type="text" id="alumno" name="alumno" class="autocomplete" autofocus autocomplete="off">
									<label for="alumno">Alumno</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col m12 s12">
							<div class="input-field col m12 s12">
								<?php 
									foreach ($datosPrecioServicio as $colPrecioServicio) {
											echo '<input type="text" name="'.$colPrecioServicio->cve_precio_servicios.'" id="'.$colPrecioServicio->cve_precio_servicios.'" class="validate" value="'.$colPrecioServicio->monto_precio_servicios.'" hidden>';
										}
								?>
							</div>
							<div class="col m8 s12">
								<h5>Servicio</h5>
								<label>Costo de Inscripción</label><br><br>
								<select name="cve_precio_servicios" id="cve_precio_servicios" class="browser-default" onchange="loadMonto();">
									<option value="" disabled selected>Choose your option</option>
									<?php 
										/**/
										foreach ($datosPrecioServicio as $colPrecioServicio) {
											echo '<option value="'.$colPrecioServicio->cve_precio_servicios.'">$ '.number_format($colPrecioServicio->monto_precio_servicios).' ('.$colPrecioServicio->titulo_precio_servicios.' )</option>';
										}
										/**/
									?>
								</select>
								<div class="input-field col m12 s12">
									<label>Metodo de Pago</label><br><br>
									<?php 
										foreach ($datosMetodoPago as $colMetodoPago) {
											echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
										}
									?>
								</div>
							</div>
							<div class="col m4 s12">
								<div class="col m12 s12">
									<label for="monto">Monto Inscripción</label>
									<input type="text" name="monto" id="monto" class="validate" onkeyup="loadAdeudoUpdate();" autocomplete="false" required>
								</div>
								<div class="col m12 s12">
									<label for="abono">Abono</label>
									<input type="text" name="abono" id="abono" class="validate" onkeyup="loadAdeudo();" required>
								</div>
								<div class="col m12 s12">
									<label for="adeudo">Adeudo</label>
									<input type="text" name="adeudo" id="adeudo" class="validate" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col m12 s12">
							<div class="input-field col m12 s12">
								<textarea name="detalle" id="detalle" class="materialize-textarea" length="120"></textarea>
								<label for="detalle">Observaciones</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col m12 s12 right-align">
							<a href="serviciocuenta-panel.php" class="waves-effect waves-light btn">
								<i class="material-icons left">replay</i>Regresar al panel
							</a>
							<input type="submit" value="Registrar" class="waves-effect waves-light btn">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>