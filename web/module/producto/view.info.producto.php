<?php

	$producto = new Producto;
	$datosProducto = $producto->ver($key, $_GET['id']);
	foreach ($datosProducto as $colProducto) {}

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Descripción Producto</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-5">
			<span class="black-text">
				<strong>CLAVE PRODUCTO: </strong><?php echo $colProducto->cve_producto; ?><br>
				<strong>CATEGORIA PRODUCTO: </strong><?php echo $colProducto->cve_categoria; ?><br>
				<strong>TITULO PRODUCTO: </strong><?php echo $colProducto->titulo_producto; ?><br>
				<strong>DETALLE PRODUCTO: </strong><?php echo $colProducto->detalle_producto; ?><br>
				<strong>PRECIO PRODUCTO: </strong><?php echo $colProducto->precio_producto; ?><br>
				<strong>EXISTENCIA PRODUCTO: </strong><?php echo $colProducto->existencia_producto; ?><br>
				<strong>CAMPUS: </strong><?php echo $colProducto->nombre_campus; ?><br>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<a href="producto-lista.php" class="waves-effect waves-light btn">
			<i class="material-icons left">replay</i>Regresar
		</a>
		<a href="producto-modificar.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn">
			<i class="material-icons left">mode_edit</i>Modificar
		</a>
	</div>
</div>