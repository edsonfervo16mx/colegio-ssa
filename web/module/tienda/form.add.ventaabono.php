<?php

	$cuentaventa = new CuentaVenta;
	$datosCuentaVenta = $cuentaventa->ver($key, $_GET['id']);
	foreach ($datosCuentaVenta as $colCuentaVenta) {}

	$rel = new RelVentasProducto;
	$datosRelacionVentasProducto = $rel->listarDetalles($key, $_GET['id']);

	$abonoventa = new AbonoVenta;
	$datosAbonoVenta = $abonoventa->listarDetalles($key, $_GET['id']);

	$abono = 0;
	foreach ($datosAbonoVenta as $colAbonoVenta) {
		$abono = $abono + $colAbonoVenta->deposito_abono_venta;
	}
	$deuda = $colCuentaVenta->monto_cuenta_venta - $abono;

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Abono a Cuenta Venta</h4>
	</div>
	<div class="col m6 s12">
		<div class="col m12 s12">
			<div class="card-panel grey lighten-4">
				<span class="black-text">
					<label>FOLIO CUENTA VENTA: </label><?php echo $colCuentaVenta->folio_cuenta_venta.$colCuentaVenta->cve_cuenta_venta; ?><br>
					<label>TITULAR DE LA CUENTA: </label><?php echo $colCuentaVenta->nombre_cuenta_venta; ?><br>
					<label>FECHA DE CREACIÓN DE LA CUENTA: </label><?php echo $colCuentaVenta->fecha_cuenta_venta; ?><br>
					<label>MONTO A PAGAR: </label><?php echo '$ '.number_format($colCuentaVenta->monto_cuenta_venta); ?><br>
					<label>DESCRIPCIÓN: </label><?php echo $colCuentaVenta->descripcion_cuenta_venta; ?><br>
					<label>CONCEPTO: </label>
					<table>
						<thead>
							<tr>
								<th>PRODUCTO</th>
								<th>DETALLE</th>
								<th>PRECIO</th>
								<th>CATEGORIA</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($datosRelacionVentasProducto as $colRelProducto) {
									echo '<tr>';
									echo '<td>'.$colRelProducto->titulo_producto.'</td>';
									echo '<td>'.$colRelProducto->detalle_producto.'</td>';
									echo '<td>$ '.number_format($colRelProducto->precio_producto).'</td>';
									echo '<td>'.$colRelProducto->cve_categoria.'</td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</span>
			</div>	
		</div>
		<div class="col m12 s12">
			<div class="col m12">
				<div class="card-panel light-blue darken-2">
					<span class="white-text center-align">
						Monto a Pagar
						<h3><?php echo $colCuentaVenta->monto_cuenta_venta; ?></h3>
					</span>
				</div>
			</div>
			<div class="col m6">
				<div class="card-panel light-green darken-1">
					<span class="white-text center-align">
						Abonado
						<h3><?php echo $abono; ?></h3>
					</span>
				</div>
			</div>
			<div class="col m6">
				<div class="card-panel red darken-3">
					<span class="white-text center-align">
						Deuda
						<h3><?php echo $deuda; ?></h3>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col m6 s12">
		<div class="card-panel grey lighten-5">
			<form action="procs/ventaabono.add.php" method="POST">
				<div class="row">
					<input type="text" name="id_cuenta" id="id_cuenta" value="<?php echo $_GET['id']; ?>" hidden>
					<div class="col m12">
						<div class="col m12">
							<label for="saldopendiente">SALDO PENDIENTE</label>
							<input type="text" name="saldopendiente" id="saldopendiente" class="validate" value="<?php echo $deuda; ?>" disabled>
						</div>
						<div class="col m12">
							<label for="deposito">DEPOSITO</label>
							<input type="text" name="deposito" id="deposito" class="validate" onkeyup="calculate()" autocomplete="off" required>
						</div>
						<div class="col m12">
							<label for="adeudo">ADEUDO</label>
							<input type="text" name="adeudo" id="adeudo" class="validate" disabled>
						</div>
						<div class="input-field col m12 s12">
							<label>Metodo de Pago</label><br><br>
							<?php 
								foreach ($datosMetodoPago as $colMetodoPago) {
									echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label><br>';
								}
							?>
							<br>
						</div>
						<div class="input-field col m12 s12">
							<textarea id="detalle" name="detalle" class="materialize-textarea"></textarea>
							<label for="detalle">Detalle de la venta</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col m12 s12 right-align">
						<input type="submit" value="Vender" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>