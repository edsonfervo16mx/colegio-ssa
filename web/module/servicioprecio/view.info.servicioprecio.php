<?php 

	$precioservicio = new PrecioServicio;
	$datosPrecioServicio = $precioservicio->ver($key, $_GET['id']);
	foreach ($datosPrecioServicio as $colPrecioServicio) {}

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Costo de Servicio</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<label>CLAVE: </label><?php echo $colPrecioServicio->cve_precio_servicios; ?><br>
				<label>TITULO: </label><?php echo $colPrecioServicio->titulo_precio_servicios; ?><br>
				<label>MONTO: </label><?php echo $colPrecioServicio->monto_precio_servicios; ?><br>
				<label>DETALLE: </label><?php echo $colPrecioServicio->detalle_precio_servicios; ?><br>
				<label>CICLO: </label><?php echo $colPrecioServicio->cve_ciclo; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="servicioprecio-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">replay</i>Regresar</a>
		<a href="servicioprecio-modificar.php?id=<?php echo $colPrecioServicio->cve_precio_servicios; ?>" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Editar</a>
	</div>
</div>