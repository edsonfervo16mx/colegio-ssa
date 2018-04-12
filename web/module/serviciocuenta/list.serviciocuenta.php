<?php 
	$cuenta = new CuentaServicio;
	$datosCuentaServicio = $cuenta->listar($key);

	$abonoservicio = new AbonoServicio;

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Cuentas por Servicio</h4>
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
					<th>Detalle</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosCuentaServicio as $colCuentaServicio) {
						//MaestroDetalleCuenta
						$datosAbonoServicio = $abonoservicio->listarDetalle($key,$colCuentaServicio->cve_cuenta_servicios);
						$abono = 0;
						foreach ($datosAbonoServicio as $colAbonoServicio) {
							$abono = $abono + $colAbonoServicio->deposito_abono_servicios;
						}
						$adeudo = $colCuentaServicio->monto_cuenta_servicios - $abono;
						//MaestroDetalleCuenta
						echo '<tr>';
						echo '<td>'.$colCuentaServicio->folio_cuenta_servicios.$colCuentaServicio->cve_cuenta_servicios.'</td>';
						echo '<td>'.$colCuentaServicio->fecha_cuenta_servicios.'</td>';
						echo '<td>'.$colCuentaServicio->nombre_completo.'</td>';
						echo '<td>'.$colCuentaServicio->monto_cuenta_servicios.'</td>';
						echo '<td>'.$abono.'</td>';
						echo '<td>'.$adeudo.'</td>';
						echo '<td>'.$colCuentaServicio->cat_estado_pago_cve_estado_pago.'</td>';
						echo '
							<td>
								<a href="serviciocuenta-ver.php?id='.$colCuentaServicio->cve_cuenta_servicios.'">
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