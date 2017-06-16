<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Ciclos Escolares</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombre</td>
					<td>Inicio</td>
					<td>Fin</td>
					<td>Campus</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosCiclo as $colCiclo) {
						echo '<tr>';
						echo '<td>'.$colCiclo->cve_ciclo.'</td>';
						echo '<td>'.$colCiclo->nombre_ciclo.'</td>';
						echo '<td>'.$colCiclo->inicio_ciclo.'</td>';
						echo '<td>'.$colCiclo->fin_ciclo.'</td>';
						echo '<td>'.$colCiclo->cve_campus.'</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>