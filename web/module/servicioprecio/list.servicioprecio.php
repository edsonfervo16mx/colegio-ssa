<?php 
	$ciclo = new Ciclo;
	$datosCiclo = $ciclo->listar($key);

	$precioservicio = new PrecioServicio;
	$datosPrecioServicio = $precioservicio->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Servicios</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/servicioprecio.add.php" method="POST">
				<div class="row">
					<div class="col m6 s12">
						<div class="input-field col m12">
							<input type="text" name="titulo" id="titulo" placeholder="" class="validate" autofocus>
							<label for="titulo">Titulo del Servicio</label>
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
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>Ciclo</th>
					<th>Titulo</th>
					<th>Monto</th>
					<th>Detalle</th>
				</tr>
			</thead>
			<tbody>
				<?php
				/**/
					foreach ($datosPrecioServicio as $colPrecioServicio) {
						echo '<tr>';
						echo '<td>'.$colPrecioServicio->cve_ciclo.'</td>';
						echo '<td>'.$colPrecioServicio->titulo_precio_servicios.'</td>';
						echo '<td> $ '.number_format($colPrecioServicio->monto_precio_servicios).'</td>';
						echo '
						<td>
							<a href="servicioprecio-ver.php?id='.$colPrecioServicio->cve_precio_servicios.'">
								<i class="material-icons">visibility</i>
							</a>
						</td>';
						echo '</tr>';
					}
				/**/
				?>
			</tbody>
		</table>
	</div>
</div>