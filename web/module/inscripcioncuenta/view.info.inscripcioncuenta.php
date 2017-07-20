<?php 
	$cuentainscripcion = new CuentaInscripcion;
	$datosCuentaInscripcion = $cuentainscripcion->ver($key, $_GET['id']);
	foreach ($datosCuentaInscripcion as $colCuentaInscripcion) {}

	$abonoinscripcion = new AbonoInscripcion;
	$datosAbonoInscripcion = $abonoinscripcion->listarDetalle($key, $_GET['id']);
	$abono = 0;
	foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {
		$abono = $abono + $colAbonoInscripcion->deposito_abono_inscripcion;
	}
	$deuda = $colCuentaInscripcion->monto_cuenta_inscripcion - $abono;
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Cuenta Inscripción</h4>
	</div>
	<div class="col m12 right-align">
		<a href="inscripcioncuenta-lista.php" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="#" class="waves-effect waves-light btn light-blue darken-2">
			<i class="material-icons right">description</i>Reporte
		</a>
		<a href="inscripcionabono-registro.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Abonar
		</a>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<label>FOLIO CUENTA INSCRIPCIÓN: </label><?php echo $colCuentaInscripcion->folio_cuenta_inscripcion.$colCuentaInscripcion->cve_cuenta_inscripcion; ?><br>
				<label>TITULAR DE LA CUENTA: </label><?php echo $colCuentaInscripcion->nombre_completo; ?><br>
				<label>FECHA DE CREACIÓN DE LA CUENTA: </label><?php echo $colCuentaInscripcion->fecha_cuenta_inscripcion; ?><br>
				<label>MONTO A PAGAR: </label><?php echo $colCuentaInscripcion->monto_cuenta_inscripcion; ?><br>
				<label>CONCEPTO: </label><?php echo $colCuentaInscripcion->titulo_precio_inscripcion; ?><br>
				<label>ESTADO DE LA CUENTA: </label><?php echo $colCuentaInscripcion->cve_estado_pago; ?><br>
			</span>
		</div>
	</div>
	<div class="col m4 s12">
		<div class="card-panel light-blue darken-2">
			<span class="white-text center-align">
				Monto a Pagar
				<h3><?php echo $colCuentaInscripcion->monto_cuenta_inscripcion; ?></h3>
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
		<table id="" class="mdl-data-table striped">
			<thead>
				<tr>
					<td>FOLIO</td>
					<td>FECHA</td>
					<td>DEPOSITO</td>
					<td>DETALLE</td>
					<td>METODO</td>
					<td>ESTADO</td>
					<td>CAJERO</td>
					<td>OP</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {
						echo '<tr>';
						echo '<td>'.$colAbonoInscripcion->cve_abono_inscripcion.'</td>';
						echo '<td>'.$colAbonoInscripcion->fecha_abono_inscripcion.'</td>';
						echo '<td>'.$colAbonoInscripcion->deposito_abono_inscripcion.'</td>';
						echo '<td>'.$colAbonoInscripcion->detalle_abono_inscripcion.'</td>';
						echo '<td>'.$colAbonoInscripcion->cve_metodo_pago.'</td>';
						echo '<td>'.$colAbonoInscripcion->cve_estado_pago.'</td>';
						echo '<td>'.$colAbonoInscripcion->nombre_usuario.'</td>';
						echo '
							<td>
								<a href="inscripcionabono-ver.php?id='.$colAbonoInscripcion->cve_abono_inscripcion.'">
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