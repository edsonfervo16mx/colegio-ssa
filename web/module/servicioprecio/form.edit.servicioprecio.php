<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);

	//Consulta
	$precioservicio = new PrecioServicio;
	$datosPrecioServicio = $precioservicio->ver($key, $_GET['id']);
	foreach ($datosPrecioServicio as $colPrecioServicio) {}
?>

<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Servicio</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/servicioprecio.edit.php" method="POST">
				<div class="row">
					<input type="text" name="id" id="id" class="validate" value="<?php echo $colPrecioServicio->cve_precio_servicios; ?>" hidden>
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="titulo" id="titulo" placeholder="" class="validate" value="<?php echo $colPrecioServicio->titulo_precio_servicios; ?>">
							<label for="titulo">Titulo del Servicio</label>
						</div>
						<div class="input-field col m12">
							<select name="cve_ciclo">
								<?php
									foreach ($datosCiclo as $colCiclo) {
										if ($colCiclo->cve_ciclo == $colPrecioServicio->cve_ciclo) {
											echo '<option value="'.$colCiclo->cve_ciclo.'" selected>'.$colCiclo->nombre_ciclo.'</option>';
										}else{
											echo '<option value="'.$colCiclo->cve_ciclo.'">'.$colCiclo->nombre_ciclo.'</option>';
										}
									}
								?>
							</select>
							<label>Ciclo Escolar</label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="monto" id="monto" placeholder="" class="validate" value="<?php echo $colPrecioServicio->monto_precio_servicios; ?>">
							<label for="monto">Costo</label>
						</div>
						<div class="input-field col m12">
							<textarea name="detalle" id="detalle" class="materialize-textarea"><?php echo $colPrecioServicio->detalle_precio_servicios; ?></textarea>
							<label for="detalle">Detalle</label>
						</div>
					</div>
					<div class="col m12 s12 right-align">
						<input type="submit" value="Modificar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>