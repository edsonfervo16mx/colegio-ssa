<?php
	/**/
	if($_SESSION['usuario'] == 'secundariajp'){
			$campus1 = 'SEC';
			$campus2 = 'BAC';
		}

	if($_SESSION['usuario'] != 'secundariajp'){
			$campus1 = 'PRI';
			$campus2 = 'PRE';
		}
	/**/



	$cuentacole = new CuentaColegiatura;
	//
	$datosCuentaColegiatura = $cuentacole->listarView($key, $campus1, $campus2);

	$abonocole = new AbonoColegiatura;
	

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Lista de cuentas de colegiatura</h4>
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
					foreach ($datosCuentaColegiatura as $colCuentaColegiatura) {
						//MaestroDetallaCuenta
						$datosAbonoColegiatura = $abonocole->listarDetalle($key, $colCuentaColegiatura->cve_cuenta_colegiatura);

						$abono = 0;
						foreach ($datosAbonoColegiatura as $colAbonoColegiatura) {
							$abono = $abono + $colAbonoColegiatura->deposito_abono_colegiatura;
						}
						$deuda = ($colCuentaColegiatura->monto_cuenta_colegiatura * $colCuentaColegiatura->beca_cuenta_colegiatura) - $abono;

						//MaestroDetallaCuenta
						echo '<tr>';
						echo '<td>'.$colCuentaColegiatura->folio_cuenta_colegiatura.$colCuentaColegiatura->cve_cuenta_colegiatura.'</td>';
						echo '<td>'.$colCuentaColegiatura->fecha_cuenta_colegiatura.'</td>';
						echo '<td>'.$colCuentaColegiatura->nombre_completo.'</td>';
						echo '<td>'.$colCuentaColegiatura->monto_cuenta_colegiatura * $colCuentaColegiatura->beca_cuenta_colegiatura.'</td>';
						echo '<td>'.$abono.'</td>';
						echo '<td>'.$deuda.'</td>';
						echo '<td>'.$colCuentaColegiatura->cve_estado_pago.'</td>';
						echo '
							<td>
								<a href="colegiaturacuenta-ver.php?id='.$colCuentaColegiatura->cve_cuenta_colegiatura.'">
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