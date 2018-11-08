<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);

	$gasto = new Gasto;
	$datosGasto = $gasto->ver($key, $_GET['id']);
	foreach ($datosGasto as $colGasto) {}
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Gasto</h4>
	</div>
	<div class="col m12">
		<form action="procs/gasto.edit.php" method="POST">
			<div class="row">
				<div class="col m6 s12">
					<input type="text" name="id" id="id" class="validate" placeholder="" value="<?php echo $colGasto->cve_gasto; ?>" hidden>
					<div class="input-field col m12 s12">
						<input type="text" name="titulo" id="titulo" class="validate" placeholder="" value="<?php echo $colGasto->titulo_gasto; ?>">
						<label for="titulo">Titulo</label>
					</div>
					<div class="col m12 s12">
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" id="fecha" class="browser-default" placeholder="" value="<?php echo $colGasto->fecha_gasto; ?>">
					</div>
					<div class="input-field col m12 s12">
						<select name="ciclo" id="ciclo">
							<option value="" disabled selected>Elige una opción</option>
							<?php 
								foreach ($datosCiclo as $colCiclo) {
									if ($colGasto->cve_ciclo == $colCiclo->cve_ciclo) {
										echo '<option value="'.$colCiclo->cve_ciclo.'" selected>'.$colCiclo->nombre_ciclo.'</option>';
									}else{
										echo '<option value="'.$colCiclo->cve_ciclo.'">'.$colCiclo->nombre_ciclo.'</option>';
									}
								}
							?>
						</select>
						<label>Ciclo</label>
					</div>
				</div>
				<div class="col m6 s12">
					<div class="input-field col m12 s12">
						<input type="text" name="monto" id="monto" class="validate" placeholder="" value="<?php echo $colGasto->monto_gasto; ?>">
						<label for="monto">Monto</label>
					</div>
					<div class="input-field col m12 s12">
						<label>Metodo de Pago</label><br><br>
						<?php 
							foreach ($datosMetodoPago as $colMetodoPago) {
								if ($colGasto->cve_metodo_pago == $colMetodoPago->cve_metodo_pago) {
									echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
								}else{
									echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'"><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
								}
							}
						?>
					</div>
				</div>
				<div class="col m12 s12">
					<div class="input-field col m12 s12">
						<textarea id="detalle" name="detalle" class="materialize-textarea"><?php echo $colGasto->descripcion_gasto; ?></textarea>
						<label for="detalle">Detalle del gasto</label>
					</div>
				</div>
				<div class="col m12 s12 right-align">
					<input type="submit" value="Modificar Gasto" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>