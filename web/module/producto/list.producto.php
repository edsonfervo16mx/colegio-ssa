<?php

	$producto = new Producto;
	$datosProducto = $producto->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Lista de Productos</h4>
	</div>
	<div class="col m12">
		<a href="producto-registrar.php" class="waves-effect waves-light btn">
			<i class="material-icons left">add</i>Registrar Producto
		</a>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>CLAVE</th>
					<th>TITULO</th>
					<th>DETALLE</th>
					<th>DESCRIPCION</th>
					<th>PRECIO</th>
					<th>EXISTENCIA</th>
					<th>CATEGORIA</th>
					<th>OP</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if ($_SESSION['usuario'] == 'secundariajp') {
						$cam1 = 'SEC';
						$cam2 = 'BAC';
					}else{
						$cam1 = 'PRE';
						$cam2 = 'PRI';
					}
					foreach ($datosProducto as $colProducto) {
						if ($colProducto->cve_campus == $cam1 || $colProducto->cve_campus == $cam2) {
							echo '<tr>';
						echo '<td>'.$colProducto->cve_campus.'/'.$colProducto->cve_producto.'</td>';
						echo '<td>'.$colProducto->titulo_producto.'</td>';
						echo '<td>'.$colProducto->detalle_producto.'</td>';
						echo '<td>'.$colProducto->descripcion_producto.'</td>';
						echo '<td>'.$colProducto->precio_producto.'</td>';
						echo '<td>'.$colProducto->existencia_producto.'</td>';
						echo '<td>'.$colProducto->cve_categoria.'</td>';
						echo '
							<td>
								<a href="producto-ver.php?id='.$colProducto->cve_producto.'">
									<i class="material-icons">visibility</i>
								</a>
							</td>';
						echo '</tr>';
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>