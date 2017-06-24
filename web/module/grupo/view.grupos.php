<?php 
	$grupo = new Grupo;
	$datosGrupo = $grupo->listar($key);
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Gestor de Grupos</h4>
		<h6 class="grey-text text-darken-1">Registrar Grupo</h4>
	</div>
	<div class="row">
		<div class="col m6 s12">
			<form action="procs/grupo.add.php" method="POST">
				<div class="row">
					<div class="input-field col m12 s12">
						<input type="text" name="nombre_grupo" id="nombre_grupo" placeholder="Ingrese el Nombre del grupo" class="validate" autofocus required>
						<label for="nombre_grupo">GRUPO</label>
					</div>
					<div class="col m12 s12">
						<select name="cve_ciclo" id="cve_ciclo">
							<option value="" disabled selected>Elige un ciclo</option>
							<?php 
								foreach ($datosCiclo as $colCiclo) {
									echo '<option value="'.$colCiclo->cve_ciclo.'">'.$colCiclo->nombre_ciclo.'</option>';
								}
							?>
						</select>
					</div>
					<div class="col m12 s12 right-align">
						<input type="submit" value="Registrar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
		<div class="col m6 s12">
			<div class="card-panel grey lighten-4">
				<span class="grey-text">Agrega un grupo, solo escribe el nombre del grupo (por ejemplo: <strong>1RO</strong>, <strong>2DO</strong>, <strong>3RO</strong>) y elige el campus donde desea agregar al grupo. Una vez creado el grupo podrás asignar a los alumnos a ese grupo, para comenzar a gestionar las colegiaturas, pagos de servicios, adeudo, listas, y calificaciones.
				</span>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col m12">
			<h4 class="grey-text text-darken-1">Listado de Grupos</h4>
		</div>
		<div class="col m12">
			<table id="example" class="mdl-data-table">
				<thead>
					<tr>
						<td>Clave</td>
						<td>Grupo</td>
						<td>Ciclo</td>
						<td>Campus</td>
						<td>Detalle</td>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($datosGrupo as $colGrupo) {
							echo '<tr>';
							echo '<td>'.$colGrupo->cve_grupo.'</td>';
							echo '<td>'.$colGrupo->nombre_grupo.'</td>';
							echo '<td>'.$colGrupo->nombre_ciclo.'</td>';
							echo '<td>'.$colGrupo->nombre_campus.'</td>';
							echo '
								<td>
									<a href="grupo-modificar.php?id='.$colGrupo->cve_grupo.'">
										<i class="material-icons">mode_edit</i>
									</a>
								</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>