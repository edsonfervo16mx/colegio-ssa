<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Colegiaturas precios</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/colegiaturaprecio.add.php" method="POST">
				<div class="row">
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="titulo" id="titulo" placeholder="" class="validate" autofocus>
							<label for="titulo">Titulo Colegiatura</label>
						</div>
						<div class="input-field col m12">
							<select name="cve_ciclo">
								<option value="" disabled selected>Choose your option</option>
								<?php
									foreach ($datosCiclo as $colCiclo) {
										echo '<option value="'.$colCiclo->cve_ciclo.'">'.$colCiclo->nombre_ciclo.'</option>';
									}
								?>
							</select>
							<label>Ciclo Escolar</label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="monto" id="monto" placeholder="" class="validate">
							<label for="monto">Costo</label>
						</div>
						<div class="input-field col m12">
							<select name="meses">
								<option value="" disabled selected>Choose your option</option>
								<option value="10">10 Meses</option>
								<option value="12">12 Meses</option>
							</select>
							<label>Meses</label>
						</div>
					</div>
					<div class="col m12">
						<div class="input-field col m12">
							<textarea name="detalle" id="detalle" class="materialize-textarea"></textarea>
							<label for="detalle">Detalle</label>
						</div>
					</div>
					<div class="col m12 s12 right-align">
						<a href="colegiaturaprecio-lista.php" class="waves-effect waves-light btn">
							<i class="material-icons left">replay</i>Regresar
						</a>
						<input type="submit" value="Registrar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>