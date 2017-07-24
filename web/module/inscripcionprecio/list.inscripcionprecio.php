<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);

	$precioinscripcion = new PrecioInscripcion;
	$datosPrecioInscripcion = $precioinscripcion->listar($key);
	
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Precios de Inscripción</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/inscripcionprecio.add.php" method="POST">
				<div class="row">
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="titulo" id="titulo" placeholder="" class="validate" autofocus>
							<label for="titulo">Titulo del precio</label>
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
							<input type="text" name="monto" id="monto" placeholder="" class="validate" autofocus>
							<label for="monto">Costo</label>
						</div>
						<div class="input-field col m12">
							<textarea name="detalle" id="detalle" class="materialize-textarea"></textarea>
							<label for="detalle">Detalle</label>
						</div>
					</div>
					<div class="col m12 s12 right-align">
						<input type="submit" value="Registrar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Catalogo de Precios</h4>
	</div>
	<div class="col m12 s12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<!--<td>Clave</td>-->
					<td>Ciclo</td>
					<td>Titulo</td>
					<td>Monto</td>
					<td>Detalle</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosPrecioInscripcion as $colPrecioInscripcion) {
						echo '<tr>';
						//echo '<td>'.substr($colPrecioInscripcion->cve_precio_inscripcion, 28).'</td>';
						echo '<td>'.$colPrecioInscripcion->cve_ciclo.'</td>';
						echo '<td>'.$colPrecioInscripcion->titulo_precio_inscripcion.'</td>';
						echo '<td>'.$colPrecioInscripcion->monto_precio_inscripcion.'</td>';
						echo '
						<td>
							<a href="inscripcionprecio-ver.php?id='.$colPrecioInscripcion->cve_precio_inscripcion.'">
								<i class="material-icons">visibility</i>
							</a>
						</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>