<?php
	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);

	$producto = new Producto;
	$datosProducto = $producto->listar($key);

?>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Tienda <i class="material-icons">shopping_cart</i></h4>
	</div>
	<div class="col m12">
		<div class="row">
			<div class="col m6 s12">
				<form action="procs/ventacuenta.add.php" method="POST">
					<div class="card-panel grey lighten-5">
						<span class="black-text">
							<div class="row">
								<div class="col m12 s12">
									<div class="input-field col m12 s12">
										<i class="material-icons prefix">perm_identity</i>
										<input type="text" id="alumno" name="alumno" class="autocomplete" autofocus autocomplete="off">
										<label for="alumno">Alumno</label>
									</div>
									<div class="input-field col m12 s12">
										<label>Metodo de Pago</label><br><br>
										<?php 
											foreach ($datosMetodoPago as $colMetodoPago) {
												echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label><br>';
											}
										?>
									</div>
									<div class="col m6 s12">
										<br>
										<h6 class="grey-text text-darken-1"><i class="material-icons">shopping_cart</i> Lista de compra </h6>
									</div>
									<div class="col m6 s12 right-align">
										<br>
										<a onclick="clean();"><h6 class=""><i class="material-icons">loop</i>Vaciar carrito</h6></a>
									</div>
									<div class="col m12 s12">
										<table>
											<thead>
												<tr>
													<th>PRODUCTO</th>
													<th>PRECIO</th>
													<th>CANTIDAD</th>
													<th>IMPORTE</th>
													<th></th>
												</tr>
											</thead>
											<tbody id="listacompra">

											</tbody>
										</table>
									</div>
									<div class="input-field col m6 s12 offset-m6" id="totalcompra">
										<!-- -->
										<input type="text" name="monto_venta" id="monto_venta" value="0" disabled>
										<label for="monto_venta">Monto de Venta</label>
										<!-- -->
									</div>
								</div>
							</div>
						</span>
					</div>
				</form>
				<button onclick="imprimir();">Imprimir Carrito</button>
			</div>
			<div class="col m6 s12">
				<table id="example" class="mdl-data-table">
					<thead>
						<tr>
							<th>CATEGORIA</th>
							<th>NOMBRE</th>
							<th>EXISTENCIA</th>
							<th>PRECIO</th>
							<th>OP</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($datosProducto as $colProducto) {
								echo '<tr>';
								echo '<td>'.$colProducto->cve_categoria.'</td>';
								echo '<td id='.$colProducto->titulo_producto."nombre".'>'.$colProducto->titulo_producto.'</td>';
								echo '<td id='.$colProducto->existencia_producto."cantidad".'>'.$colProducto->existencia_producto.'</td>';
								echo '<td id='.$colProducto->precio_producto."precio".'>$ '.$colProducto->precio_producto.'</td>';
								echo '
									<td>
										<a href="#" onclick="addProducto('.$colProducto->cve_producto.',\''.$colProducto->titulo_producto.'\','.$colProducto->precio_producto.',1);">
											<i class="material-icons">add</i>
										</a>
									</td>
								';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>