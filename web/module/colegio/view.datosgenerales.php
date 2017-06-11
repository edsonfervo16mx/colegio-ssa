<?php 
	$colegio = new Colegio;
	$datosColegio = $colegio->consulta($key);
	foreach ($datosColegio as $colColegio) {}

	$campus = new Campus;
	$datosCampus = $campus->listar($key);

?>
<div class="row">
	<h1 class="grey-text text-darken-1 center">Sistema Académico</h1>
	<div class="col m12">
		<div class="card-panel grey lighten-2 center-align">
			<span class="grey-text text-darken-4">
				<strong>ID:</strong> <?php echo $colColegio->cve_colegio; ?>
				<strong>Colegio:</strong> <?php echo $colColegio->nombre_colegio; ?>
				<strong>Estado:</strong> <?php echo $colColegio->status_colegio; ?>
			</span>
		</div>
	</div>
	<div class="col m12">
		<table class="responsive-table">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Detalle</th>
					<th>Telefono</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($datosCampus as $colCampus) {
						echo '<tr>';
						echo '<td>'.$colCampus->cve_campus.'</td>';
						echo '<td>'.$colCampus->nombre_campus.'</td>';
						echo '<td>'.$colCampus->descripcion_campus.'</td>';
						echo '<td>'.$colCampus->telefono_campus.'</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>