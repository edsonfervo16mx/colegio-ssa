<?php 
	$catproducto = new CategoriaProducto;
	$datosCategoriaProducto = $catproducto->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Registrar Producto</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-5">
			<form action="procs/producto.add.php" method="POST">
				<div class="row">
					<div class="col m6 s12">
						<div class="input-field col m12 s12">
							<input type="text" name="titulo_producto" id="titulo_producto" class="validate" placeholder="Ingresar el nombre del producto" required>
							<label for="titulo_producto">TITULO DEL PRODUCTO</label>
						</div>
						<div class="input-field col m12 s12">
							<input type="text" name="detalle_producto" id="detalle_producto" class="validate" placeholder="Ingresar el detalle del producto" required>
							<label for="detalle_producto">DETALLE DEL PRODUCTO</label>
						</div>
						<div class="input-field col m12 s12">
							<select name="cve_categoria" id="cve_categoria">
								<option value="" disabled selected>Choose your option</option>
								<?php 
									foreach ($datosCategoriaProducto as $colCategoriaProducto) {
										echo '<option value="'.$colCategoriaProducto->cve_categoria.'">'.$colCategoriaProducto->cve_categoria.' - '.$colCategoriaProducto->nombre_categoria.' - ('.$colCategoriaProducto->nombre_campus.')</option>';
									}
								?>
							</select>
							<label for="cve_categoria">Categoria</label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="input-field col m12 s12">
							<input type="text" name="precio_producto" id="precio_producto" class="validate" placeholder="Ingresar el precio del producto al publico" required>
							<label for="precio_producto">PRECIO DEL PRODUCTO</label>
						</div>
						<div class="input-field col m12 s12">
							<input type="number" name="existencia_producto" id="existencia_producto" class="validate" placeholder="Ingresar existencia del producto" required>
							<label for="existencia_producto">EXISTENCIA DEL PRODUCTO</label>
						</div>
						<div class="input-field col m12 s12">
							<textarea id="descripcion_producto" name="descripcion_producto" class="materialize-textarea" placeholder="Ingresar la descripción de la categoria"></textarea>
							<label for="descripcion_producto">DESCRIPCIÓN DEL PRODUCTO</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col m12 s12 right-align">
						<a href="producto-lista.php" class="waves-effect waves-light btn">
							<i class="material-icons left">replay</i>Regresar
						</a>
						<input type="submit" value="Registrar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>