<?php 
	$grupo = new Grupo;
	$datosGrupo = $grupo->listar($key);

	$constructor = new ConstructorGrupo;
	$datosConstructor = $constructor->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Agregar Alumno a Grupo</h4>
	</div>
	<form action="procs/constructor.add.php" method="POST">
		<div class="row">
			<div class="input-field col m6 s12">
				<i class="material-icons prefix">perm_identity</i>
				<input type="text" id="alumno_constructor" name="alumno_constructor" class="autocomplete" autofocus autocomplete="off">
				<label for="alumno_constructor">Alumno</label>
			</div>
			<div class="input-field col m6 s12">
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
			<div class="col m12 s12 right-align">
				<input type="submit" value="Agregar a Grupo" class="waves-effect waves-light btn">
			</div>
		</div>
	</form>
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Lista de Alumnos</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>Clave Grupo</td>
					<td>Alumno</td>
					<td>Detalles</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosConstructor as $colConstructor) {
						echo '<tr>';
						echo '<td>'.$colConstructor->cve_grupo.'</td>';
						echo '<td>'.$colConstructor->nombre_completo.'</td>';
						echo '
							<td>
								<a href="constructor-modificar.php?id='.$colConstructor->cve_constructor_grupo.'">
									<i class="material-icons">visibility</i>
								</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>