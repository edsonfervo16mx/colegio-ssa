<?php 
	$precioinscripcion = new PrecioInscripcion;
	$datosPrecioInscripcion = $precioinscripcion->ver($key, $_GET['id']);
	foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Costo de Inscripción</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<label>CLAVE: </label><?php echo $colPrecioInscripcion->cve_precio_inscripcion; ?><br>
				<label>TITULO: </label><?php echo $colPrecioInscripcion->titulo_precio_inscripcion; ?><br>
				<label>MONTO: </label><?php echo $colPrecioInscripcion->monto_precio_inscripcion; ?><br>
				<label>DETALLE: </label><?php echo $colPrecioInscripcion->detalle_precio_inscripcion; ?><br>
				<label>CICLO: </label><?php echo $colPrecioInscripcion->cve_ciclo; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="inscripcionprecio-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">replay</i>Regresar</a>
		<a href="inscripcionprecio-modificar.php?id=<?php echo $colPrecioInscripcion->cve_precio_inscripcion; ?>" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Editar</a>
	</div>
</div>