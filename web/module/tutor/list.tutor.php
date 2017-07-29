<?php 
	$tutor = new Tutor;
	$datosTutor = $tutor->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Tutores</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Observaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					foreach ($datosTutor as $colTutor) {
						echo '<tr>';
						echo '<td>'.$i.'</td>';
						echo '<td>'.$colTutor->nombre_completo.'</td>';
						echo '<td>'.$colTutor->correo_tutor.'</td>';
						echo '<td>'.$colTutor->telefono_tutor.'</td>';
						echo '<td>'.$colTutor->observaciones_tutor.'</td>';
						echo '
							<td>
								<a href="tutor-ver.php?id='.$colTutor->cve_tutor.'">
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