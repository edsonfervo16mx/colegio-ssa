<?php 
	$cuenta = new CuentaColegiatura;
	$datosCuentaColegiatura = $cuenta->ver($key, $_GET['id']);
	foreach ($datosCuentaColegiatura as $colCuentaColegiatura) {}

	if ($colCuentaColegiatura->beca_cuenta_colegiatura != 1) {
		$beca = 'TIENE ASIGNADO UN DESCUENTO POR BECA ('.$colCuentaColegiatura->beca_cuenta_colegiatura.')';
	}else{
		$beca = 'NO APLICA';
	}

	//Detalles de la cuenta
	$abonoscolegiatura = new AbonoColegiatura;
	$datosAbonoColegiatura = $abonoscolegiatura->listarDetalle($key, $_GET['id']);

	$abono = 0;
	foreach ($datosAbonoColegiatura as $colAbonoColegiatura) {
		$abono = $abono + $colAbonoColegiatura->deposito_abono_colegiatura;
	}
	$deuda = ($colCuentaColegiatura->monto_cuenta_colegiatura * $colCuentaColegiatura->beca_cuenta_colegiatura) - $abono;

	//Detalles Mes
	$meses = new AbonoMes;

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Datos de la Cuenta</h4>
	</div>
	<div class="col m12 right-align">
		<a href="colegiaturacuenta-lista.php" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="#" class="waves-effect waves-light btn light-blue darken-2">
			<i class="material-icons right">description</i>Reporte
		</a>
		<a href="colegiaturaabono-registro.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Abonar
		</a>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<strong>FOLIO CUENTA: </strong><?php echo $colCuentaColegiatura->folio_cuenta_colegiatura.$colCuentaColegiatura->cve_cuenta_colegiatura; ?><br>
				<strong>NOMBRE DEL ALUMNO: </strong><?php echo $colCuentaColegiatura->nombre_completo; ?><br>
				<strong>GRUPO: </strong><?php echo $colCuentaColegiatura->cve_grupo; ?><br>
				<strong>FECHA DE LA CUENTA: </strong><?php echo $colCuentaColegiatura->fecha_cuenta_colegiatura; ?><br>
				<strong>DESCRIPCIÓN CUENTA: </strong><?php echo $colCuentaColegiatura->descripcion_cuenta_colegiatura; ?><br>
				<strong>CONCEPTO DE COLEGIATURA: </strong><?php echo $colCuentaColegiatura->titulo_precio_colegiatura; ?><br>
				<strong>CUOTA DE COLEGIATURA: </strong><?php echo '$ '.number_format($colCuentaColegiatura->monto_precio_colegiatura); ?><br>
				<strong>MESES A PAGAR: </strong><?php echo $colCuentaColegiatura->meses_precio_colegiatura; ?><br>
				<strong>MONTO TOTAL DE LA CUENTA: </strong><?php echo '$ '.number_format($colCuentaColegiatura->monto_cuenta_colegiatura); ?><br>
				<strong>BECA: </strong><?php echo $beca; ?><br>
				<strong>ESTADO DE LA CUENTA: </strong><?php echo $colCuentaColegiatura->cve_estado_pago; ?><br>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m4 s12">
		<div class="card-panel light-blue darken-2">
			<span class="white-text center-align">
				Monto a Pagar
				<h3><?php echo '$ '.number_format($colCuentaColegiatura->monto_cuenta_colegiatura); ?></h3>
			</span>
		</div>
	</div>
	<div class="col m4 s12">
		<div class="card-panel light-green darken-1">
			<span class="white-text center-align">
				Abonado
				<h3><?php echo '$ '.number_format($abono); ?></h3>
			</span>
		</div>
	</div>
	<div class="col m4 s12">
		<div class="card-panel red darken-3">
			<span class="white-text center-align">
				Deuda
				<h3><?php echo '$ '.number_format($deuda); ?></h3>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12">
		<table>
			<thead>
				<tr>
					<th>FOLIO</th>
					<th>FECHA</th>
					<th>DEPOSITO</th>
					<th>DETALLE</th>
					<th>METODO</th>
					<th>ESTADO</th>
					<th>CAJERO</th>
					<th>OP</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($datosAbonoColegiatura as $colAbonoColegiatura) {
						//
						$datosMeses = $meses->listarMes($key,$colAbonoColegiatura->cve_abono_colegiatura);
						//
						echo '<tr>';
						echo '<td>'.$colAbonoColegiatura->cve_abono_colegiatura.'</td>';
						echo '<td>'.$colAbonoColegiatura->fecha_abono_colegiatura.'</td>';
						echo '<td>$ '.number_format($colAbonoColegiatura->deposito_abono_colegiatura).'</td>';
						echo '<td>';
								foreach ($datosMeses as $colMes) {
									echo $colMes->cve_mes.'<br>';
								}
						echo '</td>';
						echo '<td>'.$colAbonoColegiatura->cve_metodo_pago.'</td>';
						echo '<td>'.$colAbonoColegiatura->estado_pago_abono.'</td>';
						echo '<td>'.$colAbonoColegiatura->nombre_usuario.'</td>';
						echo '
							<td>
								<a href="colegiaturaabono-ver.php?id='.$colAbonoColegiatura->cve_abono_colegiatura.'">
									<i class="material-icons">visibility</i>
								</a>
							</td>';
						echo '<tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>