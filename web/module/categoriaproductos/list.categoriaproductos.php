<?php
	$catProducto = new CategoriaProducto;
	$datosCategoriaProducto = $catProducto->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Categoria Productos</h4>
	</div>
	<div class="col m12">
		<a href="categoriaproductos-registrar.php" class="waves-effect waves-light btn">
			<i class="material-icons left">add</i>Registrar Categoria
		</a>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>CLAVE</th>
					<th>NOMBRE</th>
					<th>DETALLE</th>
					<th>CAMPUS</th>
					<th>Op</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosCategoriaProducto as $colCategoriaProducto) {
						echo '<tr>';
						echo '<td>'.$colCategoriaProducto->cve_categoria.'</td>';
						echo '<td>'.$colCategoriaProducto->nombre_categoria.'</td>';
						echo '<td>'.$colCategoriaProducto->detalle_categoria.'</td>';
						echo '<td>'.$colCategoriaProducto->cve_campus.'</td>';
						echo '
							<td>
								<a href="categoriaproductos-ver.php?id='.$colCategoriaProducto->cve_categoria.'">
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