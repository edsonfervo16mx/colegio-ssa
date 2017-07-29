<?php 
	$gasto = new Gasto;
	$datosGasto = $gasto->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Listado de Gastos</h4>
	</div>
	<div class="col m12">
		<a href="gasto-registrar.php" class="waves-effect waves-light btn">
			<i class="material-icons left">add</i>Registrar Gasto
		</a>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Titulo</th>
					<th>Descripción</th>
					<th>Monto</th>
					<th>Metodo</th>
					<th>Campus</th>
					<th>Op</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosGasto as $colGasto) {
						echo '<tr>';
						echo '<td>'.$colGasto->fecha_gasto.'</td>';
						echo '<td>'.$colGasto->titulo_gasto.'</td>';
						echo '<td>'.$colGasto->descripcion_gasto.'</td>';
						echo '<td>'.$colGasto->monto_gasto.'</td>';
						echo '<td>'.$colGasto->cve_metodo_pago.'</td>';
						echo '<td>'.$colGasto->nombre_campus.'</td>';
						echo '
							<td>
								<a href="gasto-ver.php?id='.$colGasto->cve_gasto.'">
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