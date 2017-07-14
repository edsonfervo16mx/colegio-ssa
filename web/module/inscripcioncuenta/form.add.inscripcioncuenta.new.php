<?php 
	$utilidad = new Utilidad;
	$sexo = new Sexo;
	$datosSexo = $sexo->listar($key);
	$campus = new Campus;
	$datosCampus = $campus->listar($key);

	$grupo = new Grupo;
	$datosGrupo = $grupo->listar($key);

	$precioinscripcion = new PrecioInscripcion;
	$datosPrecioInscripcion = $precioinscripcion->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Inscripción Alumno Nuevo</h4>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<form action="" method="POST">
			<div class="row">
				<div class="col m12 s12">
					<div class="card-panel grey lighten-5">
						<div class="row">
							<div class="col m12 s12">
								<h5>Datos del Alumno</h5>
								<div class="input-field col m6 s12">
									<input type="text" name="curp" id="curp" placeholder="Ingrese la Curp" class="validate" autofocus>
									<label for="curp">C.U.R.P</label>
								</div>
								<div class="input-field col m6 s12">
									<input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" class="validate">
									<label for="nombre">Nombre alumno</label>
								</div>
								<div class="input-field col m6 s12">
									<input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese el apellido paterno" class="validate">
									<label for="apellido_paterno">Apellido Paterno</label>
								</div>
								<div class="input-field col m6 s12">
									<input type="text" name="apellido_materno" id="apellido_materno" placeholder="Ingrese el apellido materno" class="validate">
									<label for="apellido_materno">Apellido Materno</label>
								</div>
							</div>
							<div class="col m12 s12">
								<div class="col m12 s12">
									<?php 
										$utilidad->formNacimiento();
									?>
								</div>
								<div class="col m6 s12">
									<label>Sexo</label><br>
									<?php 
										foreach ($datosSexo as $colSexo) {
											echo '<input name="sexo" type="radio" id="'.$colSexo->cve_sexo.'" value="'.$colSexo->cve_sexo.'" checked><label for="'.$colSexo->cve_sexo.'">'.$colSexo->cve_sexo.'</label>';
										}
									?>
								</div>
								<div class="input-field col m6 s12">
									<select name="campus" id="campus">
										<option value="" disabled selected>Elige una opción</option>
										<?php 
											foreach ($datosCampus as $colCampus) {
												echo '<option value="'.$colCampus->cve_campus.'">'.$colCampus->nombre_campus.'</option>';
											}
										?>
									</select>
									<label>Campus</label>
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
												echo '<option value="'.$colGrupo->cve_grupo.'">'.$colGrupo->nombre_grupo.' ('.$colGrupo->nombre_ciclo.')</option>';
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
							<div class="col m6 s12">
								<div class="input-field col m12 s12">
									<select name="">
										<option value="" disabled selected>Choose your option</option>
										<?php 
											foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {
												echo '<option value="'.$colPrecioInscripcion->cve_precio_inscripcion.'">'.$colPrecioInscripcion->titulo_precio_inscripcion.'</option>';
											}
										?>
									</select>
									<label>Costo de Inscripción</label>
								</div>
							</div>
							<div class="col m6 s12">
								<div class="input-field col m12 s12">
									<input type="text" name="monto" id="monto" class="validate">
									<label for="monto">Monto Inscripción</label>
								</div>
								<div class="input-field col m12 s12">
									<input type="text" name="monto" id="monto" class="validate">
									<label for="monto">Abono</label>
								</div>
								<div class="input-field col m12 s12">
									<input type="text" name="monto" id="monto" class="validate">
									<label for="monto">Adeudo</label>
								</div>
							</div>
							<div class="col m12 s12">
								<div class="input-field col m12 s12">
									<textarea name="observaciones" id="observaciones" class="materialize-textarea" length="120"></textarea>
									<label for="observaciones">Observaciones</label>
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