<?php 
	$sexo = new Sexo;
	$datosSexo = $sexo->listar($key);
	$tutor = new Tutor;
	$datosTutor = $tutor->ver($key, $_GET['id']);
	foreach ($datosTutor as $colTutor) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Tutor</h4>
	</div>
	<form action="procs/tutor.edit.php" method="POST">
		<div class="col m6 s12">
			<div class="row">
				<div class="input-field col m12 s12">
					<input type="text" name="cve_tutor" id="cve_tutor" placeholder="Ingrese el nombre del tutor" class="validate" value="<?php echo $colTutor->cve_tutor; ?>" hidden>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="nombre_tutor" id="nombre_tutor" placeholder="Ingrese el nombre del tutor" class="validate" value="<?php echo $colTutor->nombre_tutor; ?>">
					<label for="nombre_tutor">Nombre</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="apellidop_tutor" id="apellidop_tutor" placeholder="Ingrese el apellido paterno" class="validate" value="<?php echo $colTutor->apellidop_tutor; ?>">
					<label for="apellidop_tutor">Apellido Paterno</label>
				</div>
				<div class="input-field col m12 s12">
					<input type="text" name="apellidom_tutor" id="apellidom_tutor" placeholder="Ingrese el apellido materno" class="validate" value="<?php echo $colTutor->apellidom_tutor; ?>">
					<label for="apellidom_tutor">Apellido Materno</label>
				</div>
				<div class="col m12 s12">
					<label>Sexo</label><br>
					<?php 
						foreach ($datosSexo as $colSexo) {
							if ($colTutor->cve_sexo == $colSexo->cve_sexo) {
								echo '<input name="sexo" type="radio" id="'.$colSexo->cve_sexo.'" value="'.$colSexo->cve_sexo.'" checked><label for="'.$colSexo->cve_sexo.'">'.$colSexo->cve_sexo.'</label>';
							}else{
								echo '<input name="sexo" type="radio" id="'.$colSexo->cve_sexo.'" value="'.$colSexo->cve_sexo.'"><label for="'.$colSexo->cve_sexo.'">'.$colSexo->cve_sexo.'</label>';
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="col m6 s12">
			<div class="input-field col m12 s12">
				<input type="email" name="correo_tutor" id="correo_tutor" placeholder="Ingrese el Email" class="validate" value="<?php echo $colTutor->correo_tutor; ?>">
				<label for="correo_tutor">Email</label>
			</div>
			<div class="input-field col m12 s12">
				<input type="text" name="telefono_tutor" id="telefono_tutor" placeholder="Ingrese el Numero de Teléfono" class="validate" value="<?php echo $colTutor->telefono_tutor; ?>">
				<label for="telefono_tutor">Teléfono</label>
			</div>
			<div class="input-field col m12 s12">
				<textarea name="observaciones_tutor" id="observaciones_tutor" class="materialize-textarea" length="120"><?php echo $colTutor->observaciones_tutor; ?></textarea>
				<label for="observaciones">Observaciones</label>
			</div>
		</div>
		<div class="col m12 s12 right-align">
			<input type="submit" value="Modificar" class="waves-effect waves-light btn">
		</div>
	</form>
</div>