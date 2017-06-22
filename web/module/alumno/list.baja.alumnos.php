<?php 
	$alumno = new Alumno;
	$datosAlumno = $alumno->listar($key);
	$datosAlumnoBajas = $alumno->listarBajas($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Alumnos Activos</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>#</td>
					<td>Curp</td>
					<td>Nombre</td>
					<td>Campus</td>
					<td>Estado</td>
					<td>Detalle</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					foreach ($datosAlumno as $colAlumno) {
						echo '<tr>';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$colAlumno->curp_alumno.'</td>';
						echo '<td>'.$colAlumno->nombre_completo.'</td>';
						echo '<td>'.$colAlumno->nombre_campus.'</td>';
						echo '<td>'.$colAlumno->status_alumno.'</td>';
						echo '
							<td>
								<a href="procs/alumno-darbaja.php?curp='.$colAlumno->curp_alumno.'">
									<i class="material-icons">delete</i>
								</a>
							</td>';
						echo '</tr>';
						$i++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Alumnos Baja</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>#</td>
					<td>Curp</td>
					<td>Nombre</td>
					<td>Campus</td>
					<td>Estado</td>
					<td>Detalle</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					foreach ($datosAlumnoBajas as $colAlumnoInactive) {
						echo '<tr>';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$colAlumnoInactive->curp_alumno.'</td>';
						echo '<td>'.$colAlumnoInactive->nombre_completo.'</td>';
						echo '<td>'.$colAlumnoInactive->nombre_campus.'</td>';
						echo '<td>'.$colAlumnoInactive->status_alumno.'</td>';
						echo '
							<td>
								<a href="procs/alumno-daralta.php?curp='.$colAlumnoInactive->curp_alumno.'">
									<i class="material-icons">add</i>
								</a>
							</td>';
						echo '</tr>';
						$i++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>