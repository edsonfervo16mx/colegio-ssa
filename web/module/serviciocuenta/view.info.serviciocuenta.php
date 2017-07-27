<?php 
	$cuentaservicio = new CuentaServicio;
	$datosCuentaServicio = $cuentaservicio->ver($key, $_GET['id']);
	foreach ($datosCuentaServicio as $colCuentaServicio) {}

	$abonoservicio = new AbonoServicio;
	$datosAbonoServicio = $abonoservicio->listarDetalle($key, $_GET['id']);
	$abono = 0;
	foreach ($datosAbonoServicio as $colAbonoServicio) {
		$abono = $abono + $colAbonoServicio->deposito_abono_servicios;
	}
	$deuda = $colCuentaServicio->monto_cuenta_servicios - $abono;

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Cuenta Servicio</h4>
	</div>
	<div class="col m12 right-align">
		<a href="serviciocuenta-lista.php" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="#" class="waves-effect waves-light btn light-blue darken-2">
			<i class="material-icons right">description</i>Reporte
		</a>
		<a href="servicioabono-registro.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Abonar
		</a>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<label>FOLIO CUENTA INSCRIPCIÓN: </label><?php echo $colCuentaServicio->folio_cuenta_servicios.$colCuentaServicio->cve_cuenta_servicios; ?><br>
				<label>TITULAR DE LA CUENTA: </label><?php echo $colCuentaServicio->nombre_completo; ?><br>
				<label>FECHA DE CREACIÓN DE LA CUENTA: </label><?php echo $colCuentaServicio->fecha_cuenta_servicios; ?><br>
				<label>MONTO A PAGAR: </label><?php echo $colCuentaServicio->monto_cuenta_servicios; ?><br>
				<label>CONCEPTO: </label><?php echo $colCuentaServicio->titulo_precio_servicios; ?><br>
				<label>ESTADO DE LA CUENTA: </label><?php echo $colCuentaServicio->cat_estado_pago_cve_estado_pago; ?><br>
			</span>
		</div>
	</div>
	<div class="col m4 s12">
		<div class="card-panel light-blue darken-2">
			<span class="white-text center-align">
				Monto a Pagar
				<h3><?php echo $colCuentaServicio->monto_cuenta_servicios; ?></h3>
			</span>
		</div>
	</div>
	<div class="col m4 s12">
		<div class="card-panel light-green darken-1">
			<span class="white-text center-align">
				Abonado
				<h3><?php echo $abono; ?></h3>
			</span>
		</div>
	</div>
	<div class="col m4 s12">
		<div class="card-panel red darken-3">
			<span class="white-text center-align">
				Deuda
				<h3><?php echo $deuda; ?></h3>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12">
		<h5 class="grey-text text-darken-1">Abonos a cuenta inscripción</h5>
	</div>
	<div class="col m12">
		<table>
			<thead>
				<tr>
					<th>FOLIO</th>
					<th>FECHA</th>
					<th>DEPOSITO</th>
					<th>METODO</th>
					<th>ESTADO</th>
					<th>CAJERO</th>
					<th>OP</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datosAbonoServicio as $colAbonoServicio) {
						echo '<tr>';
						echo '<td>'.$colAbonoServicio->cve_abono_servicios.'</td>';
						echo '<td>'.$colAbonoServicio->fecha_abono_servicios.'</td>';
						echo '<td>'.$colAbonoServicio->deposito_abono_servicios.'</td>';
						echo '<td>'.$colAbonoServicio->cve_metodo_pago.'</td>';
						echo '<td>'.$colAbonoServicio->cve_estado_pago.'</td>';
						echo '<td>'.$colAbonoServicio->nombre_usuario.'</td>';
						echo '
							<td>
								<a href="servicioabono-ver.php?id='.$colAbonoServicio->cve_abono_servicios.'">
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