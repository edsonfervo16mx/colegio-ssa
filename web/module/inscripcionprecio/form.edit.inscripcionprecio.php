<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);

	$precioinscripcion = new PrecioInscripcion;
	$datosPrecioInscripcion = $precioinscripcion->ver($key, $_GET['id']);
	foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {}

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Precio de Inscripción</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/inscripcionprecio.edit.php" method="POST">
				<div class="row">
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="id" id="id" placeholder="" class="validate" value="<?php echo $colPrecioInscripcion->cve_precio_inscripcion; ?>" hidden>
						</div>
						<div class="input-field col m12">
							<input type="text" name="titulo" id="titulo" placeholder="" class="validate" value="<?php echo $colPrecioInscripcion->titulo_precio_inscripcion; ?>">
							<label for="titulo">Titulo del precio</label>
						</div>
						<div class="input-field col m12">
							<select name="cve_ciclo">
								<option value="" disabled selected>Choose your option</option>
								<?php 
									foreach ($datosCiclo as $colCiclo) {
										if ($colPrecioInscripcion->cve_ciclo == $colCiclo->cve_ciclo) {
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
							<input type="text" name="monto" id="monto" placeholder="" class="validate" value="<?php echo $colPrecioInscripcion->monto_precio_inscripcion; ?>">
							<label for="monto">Costo</label>
						</div>
						<div class="input-field col m12">
							<textarea name="detalle" id="detalle" class="materialize-textarea"><?php echo $colPrecioInscripcion->detalle_precio_inscripcion; ?></textarea>
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