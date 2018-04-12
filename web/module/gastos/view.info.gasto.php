<?php 
	$gasto = new Gasto;
	$datosGasto = $gasto->ver($key, $_GET['id']);
	foreach ($datosGasto as $colGasto) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Detalles del Gasto</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<strong>Titulo del Gasto: </strong><?php echo $colGasto->titulo_gasto; ?><br>
				<strong>Fecha: </strong><?php echo $colGasto->fecha_gasto; ?><br>
				<strong>Descripción: </strong><?php echo $colGasto->descripcion_gasto; ?><br>
				<strong>Monto: </strong><?php echo $colGasto->monto_gasto; ?><br>
				<strong>Metodo de Pago: </strong><?php echo $colGasto->cve_metodo_pago; ?><br>
				<strong>Ciclo: </strong><?php echo $colGasto->cve_ciclo; ?><br>
				<strong>Campus: </strong><?php echo $colGasto->nombre_campus; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12">
		<a href="gastos-lista.php" class="waves-effect waves-light btn"><i class="material-icons left">replay</i>Regresar</a>
		<a href="gastos-modificar.php?id=<?php echo $colGasto->cve_gasto; ?>" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Editar</a>
	</div>
</div>