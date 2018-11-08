<?php 
	$campus = new Campus;
	$datosCampus = $campus->listar($key);
	$sexo = new Sexo;
	$datosSexo = $sexo->listar($key);
	$utilidad = new Utilidad;
	//
	$alumno = new Alumno;
	$datosAlumno = $alumno->ver($key,$_GET['curp']);
	foreach ($datosAlumno as $colAlumno) {
	}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Alumno</h4>
	</div>
	<form action="procs/alumno.edit.php" method="POST">
		<div class="col m6 s12">
			<div class="row">
				<div class="input-field col m12 s12">
					<!-- -->
					<input type="text" name="id" id="id" placeholder="Ingrese la Curp" class="validate" value="<?php echo $colAlumno->curp_alumno; ?>" hidden>
					<!-- -->
					<input type="text" name="curp" id="curp" placeholder="Ingrese la Curp" class="validate" value="<?php echo $colAlumno->curp_alumno; ?>">
					<label for="curp">C.U.R.P</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" class="validate" value="<?php echo $colAlumno->nombre_alumno; ?>">
					<label for="nombre">Nombre alumno</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese el apellido paterno" class="validate" value="<?php echo $colAlumno->apellidop_alumno; ?>">
					<label for="apellido_paterno">Apellido Paterno</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="apellido_materno" id="apellido_materno" placeholder="Ingrese el apellido materno" class="validate" value="<?php echo $colAlumno->apellidom_alumno; ?>">
					<label for="apellido_materno">Apellido Materno</label>
				</div>
				<div class="col m12 s12">
					<?php 
						$utilidad->formNacimientoValidate($colAlumno->nacimiento_alumno);
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
							if ($colAlumno->cve_sexo == $colSexo->cve_sexo) {
								echo '<input name="sexo" type="radio" id="'.$colSexo->cve_sexo.'" value="'.$colSexo->cve_sexo.'" checked><label for="'.$colSexo->cve_sexo.'">'.$colSexo->cve_sexo.'</label>';
							}else{
								echo '<input name="sexo" type="radio" id="'.$colSexo->cve_sexo.'" value="'.$colSexo->cve_sexo.'"><label for="'.$colSexo->cve_sexo.'">'.$colSexo->cve_sexo.'</label>';
							}
						}
					?>
				</div>
				<div class="input-field col m12 s12">
					<input type="email" name="correo" id="correo" placeholder="Ingrese email" class="validate" value="<?php echo $colAlumno->correo_alumno; ?>">
					<label for="correo">Correo Electronico</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="direccion" id="direccion" placeholder="Ingrese dirección" class="validate" value="<?php echo $colAlumno->direccion_alumno; ?>">
					<label for="direccion">Dirección</label>
				</div>
				<div class="input-field col m12 s12">
					<textarea name="observaciones" id="observaciones" class="materialize-textarea" length="120"><?php echo $colAlumno->observaciones_alumno; ?></textarea>
					<label for="observaciones">Observaciones</label>
				</div>
				<div class="input-field col m12 s12">
					<select name="campus" id="campus">
						<?php 
							foreach ($datosCampus as $colCampus) {
								if ($colAlumno->cve_campus == $colCampus->cve_campus) {
									echo '<option value="'.$colCampus->cve_campus.'" selected>'.$colCampus->nombre_campus.'</option>';
								}else{
									echo '<option value="'.$colCampus->cve_campus.'">'.$colCampus->nombre_campus.'</option>';
								}
							}
						?>
					</select>
					<label>Campus</label>
				</div>
			</div>
		</div>
		<div class="col m12 s12 right-align">
			<input type="submit" value="Modificar" class="waves-effect waves-light btn">
		</div>
	</form>
</div>