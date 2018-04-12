<?php 
	/*
	$utilidad = new Utilidad;
	$sexo = new Sexo;
	$datosSexo = $sexo->listar($key);
	$campus = new Campus;
	$datosCampus = $campus->listar($key);
	/**/
	$grupo = new Grupo;
	$datosGrupo = $grupo->listar($key);

	$precioinscripcion = new PrecioInscripcion;
	$datosPrecioInscripcion = $precioinscripcion->listar($key);

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Inscripción Alumno Existente</h4>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<form action="procs/cuentainscripcion.exist.add.php" method="POST">
			<div class="row">
				<div class="col m12 s12">
					<div class="card-panel grey lighten-5">
						<div class="row">
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
				</div>
				<div class="col m12 s12">
					<div class="card-panel grey lighten-5">
						<div class="row">
							<div class="col m12 s12">
								<h5>Asignación de Grupo</h5>
								<div class="input-field col m12 s12">
									<select name="cve_grupo">
										<option value="" disabled selected>Choose your option</option>
										<?php 
											foreach ($datosGrupo as $colGrupo) {
												/**/
												if ($_SESSION['usuario'] == 'secundariajp' && ($colGrupo->cve_campus == 'SEC' || $colGrupo->cve_campus == 'BAC')){
													echo '<option value="'.$colGrupo->cve_grupo.'">'.$colGrupo->nombre_grupo.' ('.$colGrupo->nombre_ciclo.')</option>';
												}
												if ($_SESSION['usuario'] != 'secundariajp' && ($colGrupo->cve_campus == 'PRI' || $colGrupo->cve_campus == 'PRE')){
													echo '<option value="'.$colGrupo->cve_grupo.'">'.$colGrupo->nombre_grupo.' ('.$colGrupo->nombre_ciclo.')</option>';
												}
												/**/
											}
										?>
									</select>
									<label>Grupo</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col m12 s12">
					<div class="card-panel grey lighten-5">
						<div class="row">
							<div class="col m12 s12">
								<h5>Cobro de Servicio</h5>
							</div>
							<div class="col m12 s12">
								<!--<button onclick="loadMonto(20);">test</button>-->
							</div>
							<div class="col m8 s12">
								<div class="input-field col m12 s12">
									<label>Costo de Inscripción</label><br><br>
									<select name="cve_precio_inscripcion" id="cve_precio_inscripcion" class="browser-default" onchange="loadMonto();">
										<option value="" disabled selected>Choose your option</option>
										<?php 
											foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {
												echo '<option value="'.$colPrecioInscripcion->cve_precio_inscripcion.'">$ '.number_format($colPrecioInscripcion->monto_precio_inscripcion).' ('.$colPrecioInscripcion->titulo_precio_inscripcion.' )</option>';
											}
										?>
									</select>
								</div>
								<div class="input-field col m12 s12">
									<?php 
										foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {
												echo '<input type="text" name="'.$colPrecioInscripcion->cve_precio_inscripcion.'" id="'.$colPrecioInscripcion->cve_precio_inscripcion.'" class="validate" value="'.$colPrecioInscripcion->monto_precio_inscripcion.'" hidden>';
											}
									?>
								</div>
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
							<div class="col m12 s12">
								<div class="input-field col m12 s12">
									<textarea name="detalle" id="detalle" class="materialize-textarea" length="120"></textarea>
									<label for="detalle">Observaciones</label>
								</div>
							</div>
							<div class="col m12 s12 right-align">
								<a href="inscripcioncuenta-panel.php" class="waves-effect waves-light btn">
									<i class="material-icons left">replay</i>Regresar al panel
								</a>
								<input type="submit" value="Registrar" class="waves-effect waves-light btn">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>