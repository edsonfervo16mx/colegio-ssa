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

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Cuenta Venta</h4>
	</div>
	<div class="col m12 right-align">
		<a href="ventacuenta-lista.php" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="#" class="waves-effect waves-light btn light-blue darken-2">
			<i class="material-icons right">description</i>Reporte
		</a>
		<a href="ventaabono-registro.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Abonar
		</a>
	</div>
	<div class="col m8 s12">
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
	</div>
	<div class="col m4 s12">
		<div class="card-panel light-blue darken-2">
			<span class="white-text center-align">
				Monto a Pagar
				<h3><?php echo $colCuentaVenta->monto_cuenta_venta; ?></h3>
			</span>
		</div>
		<div class="card-panel light-green darken-1">
			<span class="white-text center-align">
				Abonado
				<h3><?php echo $abono; ?></h3>
			</span>
		</div>
		<div class="card-panel red darken-3">
			<span class="white-text center-align">
				Deuda
				<h3><?php echo $deuda; ?></h3>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Abonos a Cuenta</h4>
	</div>
	<div class="col m12 s12">
		<table>
			<thead>
				<tr>
					<th>FOLIO</th>
					<th>FECHA</th>
					<th>DEPOSITO</th>
					<th>METODO</th>
					<th>ESTADO</th>
					<th>Op</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosAbonoVenta as $colAbonoVenta) {
						echo '<tr>';
						echo '<td>'.$colAbonoVenta->cve_abono_venta.'</td>';
						echo '<td>'.$colAbonoVenta->fecha_abono_venta.'</td>';
						echo '<td>$ '.number_format($colAbonoVenta->deposito_abono_venta).'</td>';
						echo '<td>'.$colAbonoVenta->cve_metodo_pago.'</td>';
						echo '<td>'.$colAbonoVenta->cve_estado_pago.'</td>';
						echo '
							<td>
								<a href="ventaabono-ver.php?id='.$colAbonoVenta->cve_abono_venta.'">
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