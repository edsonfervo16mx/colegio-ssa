<?php 
	$campus = new Campus;
	$datosCampus = $campus->listar($key);
	$sexo = new Sexo;
	$datosSexo = $sexo->listar($key);
	$utilidad = new Utilidad;
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Registrar Alumno</h4>
	</div>
	<form action="procs/alumno.add.php" method="POST">
		<div class="col m6 s12">
			<div class="row">
				<div class="input-field col m12 s12">
					<input type="text" name="curp" id="curp" placeholder="Ingrese la Curp" class="validate" autofocus>
					<label for="curp">C.U.R.P</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" class="validate">
					<label for="nombre">Nombre alumno</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese el apellido paterno" class="validate">
					<label for="apellido_paterno">Apellido Paterno</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="apellido_materno" id="apellido_materno" placeholder="Ingrese el apellido materno" class="validate">
					<label for="apellido_materno">Apellido Materno</label>
				</div>
				<div class="col m12 s12">
					<?php 
						$utilidad->formNacimiento();
					?>
				</div>
			</div>
		</div>
		<div class="col m6 s12">
			<div class="row">
				<div class="col m12 s12">
					<label>Sexo</label><br>
					<?php 
						foreach ($datosSexo as $colSexo) {
							echo '<input name="sexo" type="radio" id="'.$colSexo->cve_sexo.'" value="'.$colSexo->cve_sexo.'" checked><label for="'.$colSexo->cve_sexo.'">'.$colSexo->cve_sexo.'</label>';
						}
					?>
				</div>
				<div class="input-field col m12 s12">
					<input type="email" name="correo" id="correo" placeholder="Ingrese email" class="validate">
					<label for="correo">Correo Electronico</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="direccion" id="direccion" placeholder="Ingrese dirección" class="validate">
					<label for="direccion">Dirección</label>
				</div>
				<div class="input-field col m12 s12">
					<textarea name="observaciones" id="observaciones" class="materialize-textarea" length="120"></textarea>
					<label for="observaciones">Observaciones</label>
				</div>
				<div class="input-field col m12 s12">
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
		<div class="col m12 s12 right-align">
			<input type="submit" value="Registrar" class="waves-effect waves-light btn">
		</div>
	</form>
</div>