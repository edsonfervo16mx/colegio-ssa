<?php 
	$alumno = new Alumno;
	$datosAlumno = $alumno->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Alumnos</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>#</td>
					<td>Curp</td>
					<td>Nombre</td>
					<td>Campus</td>
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
						echo '
							<td>
								<a href="#">
									<i class="material-icons">visibility</i>
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