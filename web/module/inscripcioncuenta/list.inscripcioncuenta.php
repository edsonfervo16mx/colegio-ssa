<?php 
	$cuentainscripcion = new CuentaInscripcion;
	$datosCuentaInscripcion = $cuentainscripcion->listar($key);

	$abonoinscripcion = new AbonoInscripcion;
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Cuentas</h4>
	</div>
	<div class="col m12">
		<table id="example" class="mdl-data-table">
			<thead>
				<tr>
					<td>Folio</td>
					<td>Fecha</td>
					<td>Nombre</td>
					<td>Monto</td>
					<td>Abono</td>
					<td>Adeudo</td>
					<td>Estado</td>
					<td>Detalle</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($datosCuentaInscripcion as $colCuentaInscripcion) {
						//MaestroDetalle Cuenta
							$datosAbonoInscripcion = $abonoinscripcion->listarDetalle($key, $colCuentaInscripcion->cve_cuenta_inscripcion);
							$abono = 0;
							foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {
								$abono = $abono + $colAbonoInscripcion->deposito_abono_inscripcion;
							}
							$adeudo = $colCuentaInscripcion->monto_cuenta_inscripcion - $abono;
						//MaestroDetalle Cuenta
						echo '<tr>';
						echo '<td>'.$colCuentaInscripcion->folio_cuenta_inscripcion.''.$colCuentaInscripcion->cve_cuenta_inscripcion.'</td>';
						echo '<td>'.$colCuentaInscripcion->fecha_cuenta_inscripcion.'</td>';
						echo '<td>'.$colCuentaInscripcion->nombre_completo.'</td>';
						echo '<td>'.$colCuentaInscripcion->monto_cuenta_inscripcion.'</td>';
						echo '<td>'.$abono.'</td>';
						echo '<td>'.$adeudo.'</td>';
						echo '<td>'.$colCuentaInscripcion->cve_estado_pago.'</td>';
						echo '
							<td>
								<a href="inscripcioncuenta-ver.php?id='.$colCuentaInscripcion->cve_cuenta_inscripcion.'">
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