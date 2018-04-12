<?php

	$catproducto = new CategoriaProducto;
	$datosCategoriaProducto = $catproducto->ver($key, $_GET['id']);
	foreach ($datosCategoriaProducto as $colCategoriaProducto) {}

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Categoria</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-5">
			<strong>CLAVE: </strong><?php echo $colCategoriaProducto->cve_categoria; ?><br>
			<strong>NOMBRE: </strong><?php echo $colCategoriaProducto->nombre_categoria; ?><br>
			<strong>DETALLE: </strong><?php echo $colCategoriaProducto->detalle_categoria; ?><br>
			<strong>CAMPUS: </strong><?php echo $colCategoriaProducto->nombre_campus; ?><br>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<a href="categoriaproductos-lista.php" class="waves-effect waves-light btn">
			<i class="material-icons left">replay</i>Regresar
		</a>
		<a href="categoriaproductos-modificar.php?id=<?php echo $colCategoriaProducto->cve_categoria; ?>" class="waves-effect waves-light btn">
			<i class="material-icons left">mode_edit</i>Modificar
		</a>
	</div>
</div>