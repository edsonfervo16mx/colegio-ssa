<?php 
	$relacion = new Relacion;
	$datosRelacion = $relacion->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Asignación de tutores</h4>
	</div>
	<div class="col s12">
		<form action="procs/relacion.add.php" method="POST">
			<div class="row">
				<div class="input-field col m6 s12">
						<i class="material-icons prefix">perm_identity</i>
						<input type="text" id="alumno" name="alumno" class="autocomplete" autofocus>
						<label for="alumno">Alumno</label>
				</div>
				<div class="input-field col m6 s12">
						<i class="material-icons prefix">perm_contact_calendar</i>
						<input type="text" id="tutor" name="tutor" class="autocomplete">
						<label for="tutor">Tutor</label>
				</div>
			</div>
			<div class="col m12 s12 right-align">
				<input type="submit" value="Crear Asignación" class="waves-effect waves-light btn">
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Asignaciones</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>#</td>
					<td>Alumno</td>
					<td>Tutor</td>
					<td>Detalle</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					foreach ($datosRelacion as $colRelacion) {
						echo '<tr>';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$colRelacion->curp_alumno.'</td>';
						echo '<td>'.$colRelacion->cve_tutor.'</td>';
						echo '<td></td>';
						echo '</tr>';
						$i++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>