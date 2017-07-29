<?php 
	$preciocolegiatura = new PrecioColegiatura;
	$datosPrecioColegiatura = $preciocolegiatura->ver($key, $_GET['id']);
	foreach ($datosPrecioColegiatura as $colPrecioColegiatura) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Colegiaturas Precio</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<strong>TITULO: </strong><?php echo $colPrecioColegiatura->titulo_precio_colegiatura; ?><br>
				<strong>DETALLE: </strong><?php echo $colPrecioColegiatura->detalle_precio_colegiatura; ?><br>
				<strong>MESES: </strong><?php echo $colPrecioColegiatura->meses_precio_colegiatura; ?><br>
				<strong>COSTO: </strong><?php echo '$ '.number_format($colPrecioColegiatura->monto_precio_colegiatura); ?><br>
				<strong>CICLO: </strong><?php echo $colPrecioColegiatura->cve_ciclo; ?><br>
				<strong>CAMPUS: </strong><?php echo $colPrecioColegiatura->nombre_campus; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="colegiaturaprecio-lista.php" class="waves-effect waves-light btn">
			<i class="material-icons left">replay</i>Regresar
		</a>
		<a href="colegiaturaprecio-modificar.php?id=<?php echo $colPrecioColegiatura->cve_precio_colegiatura; ?>" class="waves-effect waves-light btn">
			<i class="material-icons left">mode_edit</i>Editar
		</a>
	</div>
</div>