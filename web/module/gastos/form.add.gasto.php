<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Registrar Gasto</h4>
	</div>
	<div class="col m12">
		<form action="procs/gasto.add.php" method="POST">
			<div class="row">
				<div class="col m6 s12">
					<div class="input-field col m12 s12">
						<input type="text" name="titulo" id="titulo" class="validate" placeholder="">
						<label for="titulo">Titulo</label>
					</div>
					<div class="col m12 s12">
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" id="fecha" class="browser-default" placeholder="" value="<?php echo date('Y-m-d'); ?>">
					</div>
					<div class="input-field col m12 s12">
						<select name="ciclo" id="ciclo">
							<option value="" disabled selected>Elige una opción</option>
							<?php 
								foreach ($datosCiclo as $colCiclo) {
									if ($_SESSION['usuario'] == 'secundariajp' && ($colCiclo->cve_campus == 'SEC' || $colCiclo->cve_campus == 'BAC')){
										echo '<option value="'.$colCiclo->cve_ciclo.'">'.$colCiclo->nombre_ciclo.'</option>';
									}
									if ($_SESSION['usuario'] != 'secundariajp' && ($colCiclo->cve_campus == 'PRI' || $colCiclo->cve_campus == 'PRE')){
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
						<input type="text" name="monto" id="monto" class="validate" placeholder="">
						<label for="monto">Monto</label>
					</div>
					<div class="input-field col m12 s12">
						<label>Metodo de Pago</label><br><br>
						<?php 
							foreach ($datosMetodoPago as $colMetodoPago) {
								echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
							}
						?>
					</div>
				</div>
				<div class="col m12 s12">
					<div class="input-field col m12 s12">
						<textarea id="detalle" name="detalle" class="materialize-textarea"></textarea>
						<label for="detalle">Detalle del gasto</label>
					</div>
				</div>
				<div class="col m12 s12 right-align">
					<input type="submit" value="Registrar Gasto" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>