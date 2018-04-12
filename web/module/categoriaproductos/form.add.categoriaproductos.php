<?php 
	$campus = new Campus;
	$datosCampus = $campus->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Registrar Categoria</h4>
	</div>
	<div class="col m12">
		<form action="procs/categoriaproductos.add.php" method="POST">
			<div class="row">
				<div class="col m8 s12 offset-m2">
					<div class="input-field col m12 s12">
						<input type="text" name="cve_categoria" id="cve_categoria" class="validate" placeholder="Ingresar el nombre clave de la categoria producto" required>
						<label for="cve_categoria">NOMBRE CLAVE</label>
					</div>
					<div class="input-field col m12 s12">
						<input type="text" name="nombre_categoria" id="nombre_categoria" class="validate" placeholder="Ingresar el nombre largo de la categoria" required>
						<label for="nombre_categoria">NOMBRE LARGO</label>
					</div>
					<div class="input-field col m12 s12">
						<select name="cve_campus" id="cve_campus">
							<option value="" disabled selected>Choose your option</option>
							<?php 
								foreach ($datosCampus as $colCampus) {
									echo '<option value="'.$colCampus->cve_campus.'">'.$colCampus->nombre_campus.'</option>';
								}
							?>
						</select>
						<label for="cve_campus">Campus</label>
					</div>
					<div class="input-field col m12 s12">
						<textarea id="detalle_categoria" name="detalle_categoria" class="materialize-textarea" placeholder="Ingresar la descripción de la categoria"></textarea>
						<label for="detalle_categoria">DETALLE</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col m8 s12 right-align offset-m2">
					<a href="categoriaproductos-lista.php" class="waves-effect waves-light btn">
						<i class="material-icons left">replay</i>Regresar
					</a>
					<input type="submit" value="Registrar" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>