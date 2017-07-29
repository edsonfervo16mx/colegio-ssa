<?php 
	$preciocolegiatura = new PrecioColegiatura;
	$datosPrecioColegiatura = $preciocolegiatura->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Colegiaturas precios</h4>
	</div>
	<div class="col m12">
		<a href="colegiaturaprecio-registrar.php" class="waves-effect waves-light btn">
			<i class="material-icons left">add</i>Registrar precio
		</a>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Detalle</th>
					<th>Meses</th>
					<th>Monto</th>
					<th>Campus</th>
					<th>Op</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosPrecioColegiatura as $colPrecioColegiatura) {
						echo '<tr>';
						echo '<td>'.$colPrecioColegiatura->titulo_precio_colegiatura.'</td>';
						echo '<td>'.$colPrecioColegiatura->detalle_precio_colegiatura.'</td>';
						echo '<td>'.$colPrecioColegiatura->meses_precio_colegiatura.'</td>';
						echo '<td>'.$colPrecioColegiatura->monto_precio_colegiatura.'</td>';
						echo '<td>'.$colPrecioColegiatura->nombre_campus.'</td>';
						echo '
						<td>
							<a href="colegiaturaprecio-ver.php?id='.$colPrecioColegiatura->cve_precio_colegiatura.'">
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