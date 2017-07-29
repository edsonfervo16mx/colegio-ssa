<?php 
	$preciocolegiatura = new PrecioColegiatura;
	$datosPrecioColegiatura = $preciocolegiatura->ver($key, $_GET['id']);
	foreach ($datosPrecioColegiatura as $colPrecioColegiatura) {}

	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Colegiaturas precios</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/colegiaturaprecio.edit.php" method="POST">
				<div class="row">
					<div class="col m6 s12">
						<input type="text" name="id" id="id" placeholder="" class="validate" value="<?php echo $colPrecioColegiatura->cve_precio_colegiatura; ?>" hidden>
						<div class="input-field col m12">
							<input type="text" name="titulo" id="titulo" placeholder="" class="validate" autofocus value="<?php echo $colPrecioColegiatura->titulo_precio_colegiatura; ?>">
							<label for="titulo">Titulo Colegiatura</label>
						</div>
						<div class="input-field col m12">
							<select name="cve_ciclo">
								<option value="" disabled selected>Choose your option</option>
								<?php
									foreach ($datosCiclo as $colCiclo) {
										if ($colCiclo->cve_ciclo == $colPrecioColegiatura->cve_ciclo) {
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
							<input type="text" name="monto" id="monto" placeholder="" class="validate" value="<?php echo $colPrecioColegiatura->monto_precio_colegiatura; ?>">
							<label for="monto">Costo</label>
						</div>
						<div class="input-field col m12">
							<select name="meses">
								<option value="" disabled selected>Choose your option</option>
								<option value="10">10 Meses</option>
								<option value="12">12 Meses</option>
								<?php 
									if ($colPrecioColegiatura->meses_precio_colegiatura == 10) {
										echo '<option value="10" selected>10 Meses</option>';
										echo '<option value="12">12 Meses</option>';
									}else{
										echo '<option value="10">10 Meses</option>';
										echo '<option value="12" selected>12 Meses</option>';
									}
								?>
							</select>
							<label>Meses</label>
						</div>
					</div>
					<div class="col m12">
						<div class="input-field col m12">
							<textarea name="detalle" id="detalle" class="materialize-textarea"><?php echo $colPrecioColegiatura->detalle_precio_colegiatura; ?></textarea>
							<label for="detalle">Detalle</label>
						</div>
					</div>
					<div class="col m12 s12 right-align">
						<a href="colegiaturaprecio-ver.php?id=<?php echo $_GET['id']?>" class="waves-effect waves-light btn">
							<i class="material-icons left">replay</i>Regresar
						</a>
						<input type="submit" value="Modificar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>