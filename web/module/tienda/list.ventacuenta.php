<?php

	$cuentaventa = new CuentaVenta;
	$datosCuentaVenta = $cuentaventa->listar($key);

	$abonoventa = new AbonoVenta;

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Cuentas por Ventas</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Nombre</th>
					<th>Monto</th>
					<th>Abono</th>
					<th>Adeudo</th>
					<th>Estado</th>
					<th>Caja</th>
					<th>Detalle</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($datosCuentaVenta as $colCuentaVenta) {
						//MaestroDetalle
						$abono = 0;
						$datosAbonoVenta = $abonoventa->listarDetalles($key, $colCuentaVenta->cve_cuenta_venta);
						foreach ($datosAbonoVenta as $colAbonoVenta) {
							$abono = $abono + $colAbonoVenta->deposito_abono_venta;
						}
						$deuda = $colCuentaVenta->monto_cuenta_venta - $abono;
						//
						echo '<tr>';
						echo '<td>'.$colCuentaVenta->folio_cuenta_venta.$colCuentaVenta->cve_cuenta_venta.'</td>';
						echo '<td>'.$colCuentaVenta->fecha_cuenta_venta.'</td>';
						echo '<td>'.$colCuentaVenta->nombre_cuenta_venta.'</td>';
						echo '<td>'.$colCuentaVenta->monto_cuenta_venta.'</td>';
						echo '<td>'.$abono.'</td>';
						echo '<td>'.$deuda.'</td>';
						echo '<td>'.$colCuentaVenta->cve_estado_pago.'</td>';
						echo '<td>'.$colCuentaVenta->caja_campus.'</td>';
						echo '
							<td>
								<a href="ventacuenta-ver.php?id='.$colCuentaVenta->cve_cuenta_venta.'">
									<i class="material-icons">visibility</i>
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