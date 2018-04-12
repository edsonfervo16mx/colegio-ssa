<?php 

	$preciocoleg = new PrecioColegiatura;
	$datosPrecioColegiatura= $preciocoleg->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Crear cuenta colegiatura</h4>
	</div>
	<div class="col m12">
		<form action="procs/colegiaturacuenta.add.php" method="POST">
			<div class="row">
				<div class="col m12 s12">
					<div class="col m12 s12">
						<h5>Alumno</h5>
						<div class="input-field col m9 s12">
							<i class="material-icons prefix">perm_identity</i>
							<input type="text" id="alumno" name="alumno" class="autocomplete" autofocus autocomplete="off">
							<label for="alumno">Alumno</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col m8 s12">
					<div class="input-field col m12 s12">
						<?php
							foreach ($datosPrecioColegiatura as $colPrecioColegiatura) {
								echo '<input type="text" name="'.$colPrecioColegiatura->cve_precio_colegiatura.'" id="'.$colPrecioColegiatura->cve_precio_colegiatura.'" class="validate" value="'.$colPrecioColegiatura->monto_precio_colegiatura.'" hidden>';
								echo '<input type="text" name="mes'.$colPrecioColegiatura->cve_precio_colegiatura.'" id="mes'.$colPrecioColegiatura->cve_precio_colegiatura.'" class="validate" value="'.$colPrecioColegiatura->meses_precio_colegiatura.'" hidden>';
							}
						?>
					</div>
					<div class="form-select-price">
						<label>Costo de Colegiatura</label><br><br>
						<select name="cve_precio_colegiatura" id="cve_precio_colegiatura" class="browser-default" onchange="loadMonto();">
							<option value="" disabled selected>Choose your option</option>
							<?php
								/**/
								foreach ($datosPrecioColegiatura as $colPrecioColegiatura) {
									echo '<option value="'.$colPrecioColegiatura->cve_precio_colegiatura.'">$ '.number_format($colPrecioColegiatura->monto_precio_colegiatura).' ('.$colPrecioColegiatura->titulo_precio_colegiatura.' )</option>';
								}
								/**/
							?>
						</select>
					</div>
				</div>
				<div class="col m4 s12">
					<div class="col m12 s12"><br>
						<label for="monto">Monto Total de Colegiaturas</label>
						<input type="text" name="monto" id="monto" class="validate" onkeyup="loadAdeudoUpdate();" autocomplete="false" required>
					</div>
					<div class="input-field col m12 s12">
						<select name="beca" id="beca">
							<option value="1">Beca no aplica</option>
							<option value=".5">Beca de 50%</option>
							<option value=".7">Beca de 30%</option>
							<option value=".75">Beca de 25%</option>
						</select>
						<label for="beca">Beca / Descuento</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col m12 s12">
					<div class="input-field col m12 s12">
						<textarea name="detalle" id="detalle" class="materialize-textarea" length="120"></textarea>
						<label for="detalle">Descripción</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col m12 s12 right-align">
					<a href="colegiaturacuenta-panel.php" class="waves-effect waves-light btn">
						<i class="material-icons left">replay</i>Regresar
					</a>
					<input type="submit" value="Registrar" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>