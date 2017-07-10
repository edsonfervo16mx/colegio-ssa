<?php 
	$precioinscripcion = new PrecioInscripcion;
	$datosPrecioInscripcion = $precioinscripcion->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Crear Cuenta</h4>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<form action="" method="POST">
			<div class="row">
				<div class="col m6 s12">
					<div class="input-field col m12 s12">
						<select name="">
							<option value="" disabled selected>Choose your option</option>
							<?php 
								foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {
									echo '<option value="'.$colPrecioInscripcion->cve_precio_inscripcion.'">'.$colPrecioInscripcion->titulo_precio_inscripcion.'</option>';
								}
							?>
						</select>
						<label>Costo de Inscripción</label>
					</div>
				</div>
				<div class="col m6 s12">
					<div class="input-field col m12 s12">
						<select name="">
							<option value="" disabled selected>Choose your option</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
						<label>Elegir Alumno</label>
					</div>
				</div>
				<div class="col m12 s12">
					<div class="input-field col m12 s12">
						<textarea name="observaciones" id="observaciones" class="materialize-textarea" length="120"></textarea>
						<label for="observaciones">Observaciones</label>
					</div>
				</div>
				<div class="col m12 s12 right-align">
					<a href="inscripcioncuenta-panel.php" class="waves-effect waves-light btn">
						<i class="material-icons left">replay</i>Regresar al panel
					</a>
					<input type="submit" value="Registrar" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>