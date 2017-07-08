<?php 
	$grupo = new Grupo;
	$datosGrupo = $grupo->listar($key);

	$constructor = new ConstructorGrupo;
	$datosConstructor = $constructor->ver($key,$_GET['id']);

	foreach ($datosConstructor as $colConstructor) { }
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Editar constructor de grupo.</h4>
	</div>
	<div class="col m12 s12">
		<form action="procs/constructor.edit.php" method="POST">
			<div class="row">
				<div class="col m12 s12">
					<div class="card-panel teal">
						<span class="white-text">
							<strong>Alumno: </strong>
							<?php echo $colConstructor->nombre_completo; ?><br>
							<strong>Grupo Actual: </strong>
							<?php echo $colConstructor->cve_grupo.' ( '; ?>
							<?php echo $colConstructor->nombre_ciclo; ?>
							<?php echo $colConstructor->nombre_campus; ?>
							<?php echo $colConstructor->nombre_grupo.' )'; ?>
						</span>
					</div>
				</div>
				<div class="input-field col m6 s12">
					<input type="text" name="id" id="id" placeholder="Ingrese la Curp" class="validate" value="<?php echo $colConstructor->cve_constructor_grupo; ?>" hidden>
				</div>
				<div class="input-field col m6 s12">
					<input type="text" name="curp" id="curp" placeholder="Ingrese la Curp" class="validate" value="<?php echo $colConstructor->curp_alumno; ?>" hidden>
				</div>
				<div class="input-field col m7 s12">
					<select name="cve_grupo">
						<option value="" disabled selected>Choose your option</option>
						<?php 
							foreach ($datosGrupo as $colGrupo) {
								if ($colConstructor->cve_grupo == $colGrupo->cve_grupo) {
									echo '<option value="'.$colGrupo->cve_grupo.'" selected>'.$colGrupo->nombre_grupo.' ('.$colGrupo->nombre_ciclo.')</option>';
								}else{
									echo '<option value="'.$colGrupo->cve_grupo.'">'.$colGrupo->nombre_grupo.' ('.$colGrupo->nombre_ciclo.')</option>';
								}
							}
						?>
					</select>
					<label>Mover a</label>
				</div>
				<div class="col m12 s12">
					<div class="card-panel grey lighten-4">
						<span class="grey-text">
							Editar el contructor del grupo, significa que el alumno pasará al grupo seleccionado.
						</span>
					</div>
				</div>
				<div class="col m12 s12 right-align">
					<input type="submit" value="Cambiar alumno de grupo" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>