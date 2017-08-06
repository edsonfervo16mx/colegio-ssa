<?php 
	$catproducto = new CategoriaProducto;
	$datosCategoriaProducto = $catproducto->ver($key, $_GET['id']);
	foreach ($datosCategoriaProducto as $colCategoriaProducto) {}

	$campus = new Campus;
	$datosCampus = $campus->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Categoria</h4>
	</div>
	<div class="col m12">
		<form action="procs/categoriaproductos.edit.php" method="POST">
			<div class="row">
				<div class="col m8 s12 offset-m2">
					<input type="text" name="id" id="id" class="validate" placeholder="" value="<?php echo $colCategoriaProducto->cve_categoria; ?>" required hidden>
					<div class="input-field col m12 s12">
						<input type="text" name="cve_categoria" id="cve_categoria" class="validate" placeholder="Ingresar el nombre clave de la categoria producto" value="<?php echo $colCategoriaProducto->cve_categoria; ?>" required>
						<label for="cve_categoria">NOMBRE CLAVE</label>
					</div>
					<div class="input-field col m12 s12">
						<input type="text" name="nombre_categoria" id="nombre_categoria" class="validate" placeholder="Ingresar el nombre largo de la categoria" value="<?php echo $colCategoriaProducto->nombre_categoria; ?>" required>
						<label for="nombre_categoria">NOMBRE LARGO</label>
					</div>
					<div class="input-field col m12 s12">
						<select name="cve_campus" id="cve_campus">
							<option value="" disabled selected>Choose your option</option>
							<?php 
								foreach ($datosCampus as $colCampus) {
									if ($colCampus->cve_campus == $colCategoriaProducto->cve_campus) {
										echo '<option value="'.$colCampus->cve_campus.'" selected>'.$colCampus->nombre_campus.'</option>';
									}else{
										echo '<option value="'.$colCampus->cve_campus.'">'.$colCampus->nombre_campus.'</option>';
									}
								}
							?>
						</select>
						<label for="cve_campus">Campus</label>
					</div>
					<div class="input-field col m12 s12">
						<textarea id="detalle_categoria" name="detalle_categoria" class="materialize-textarea" placeholder="Ingresar la descripción de la categoria"><?php echo $colCategoriaProducto->detalle_categoria; ?></textarea>
						<label for="detalle_categoria">DETALLE</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col m8 s12 right-align offset-m2">
					<a href="categoriaproductos-ver.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn">
						<i class="material-icons left">replay</i>Regresar
					</a>
					<input type="submit" value="Modificar" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>
	</div>
</div>