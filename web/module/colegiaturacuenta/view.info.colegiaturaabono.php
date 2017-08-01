<?php 
	$abonocole = new AbonoColegiatura;
	$datosAbonoColegiatura = $abonocole->generarRecibo($key, $_GET['id']);
	foreach ($datosAbonoColegiatura as $colAbonoColegiatura) {}

	//
	$cantidades = $abonocole->listarDetalle($key, $colAbonoColegiatura->cve_cuenta_colegiatura);
	$abono = 0;
	foreach ($cantidades as $colCantidad) {
		if ($colCantidad->cve_abono_colegiatura < $_GET['id']) {
			$abono = $abono + $colCantidad->deposito_abono_colegiatura;
		}
	}

	#$deuda = $colAbonoColegiatura->monto_cuenta_colegiatura - ($abono + $colAbonoColegiatura->deposito_abono_colegiatura);

	//MESES ABONADOS
	$abonomes = new AbonoMes;
	$datosAbonoMes = $abonomes->listarMes($key, $_GET['id']);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Abono a cuenta colegiatura</h4>
	</div>
</div>
<!-- Recibo-->
<div class="row">
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<div class="row">
				<div class="col m12 s12">
					<span class="black-text center-align">
						<h5>RECIBO DE PAGO</h5>
					</span>
				</div>
				<div class="col m3">
					<img src="img/logos/bachiller.png" class="responsive-img">
				</div>
				<div class="col m9 center-align">
					<h6><?php echo $colAbonoColegiatura->nombre_colegio; ?></h6>
					<h6><?php echo $colAbonoColegiatura->direccion_campus; ?></h6>
				</div>
			</div>
			<div class="row">
				<div class="col m4">
					<p>
						<strong>FOLIO: </strong>
						<?php echo $colAbonoColegiatura->folio_cuenta_colegiatura.$colAbonoColegiatura->cve_cuenta_colegiatura.'/A-'.$colAbonoColegiatura->cve_abono_colegiatura; ?><br>
					</p>
				</div>
				<div class="col m8 right-align">
					<p>
						<h6><?php echo $colAbonoColegiatura->correo_campus; ?></h6>
						<strong><?php echo date('l, d F Y H:i:s'); ?></strong>
					</p>
				</div>
				<div class="col m12">
					<strong>NOMBRE DEL ALUMNO: </strong>
					<?php echo $colAbonoColegiatura->nombre_completo; ?><br>
					<strong>ID ALUMNO: </strong>
					<?php echo $colAbonoColegiatura->curp_alumno; ?><br>
					<strong>DETALLES: </strong>
					<?php echo $colAbonoColegiatura->cve_constructor_grupo; ?><br>
					<strong>METODO PAGO: </strong>
					<?php echo $colAbonoColegiatura->cve_metodo_pago; ?><br>
					<strong>FECHA PAGO: </strong>
					<?php echo $colAbonoColegiatura->fecha_abono_colegiatura; ?><br>
				</div>
				<div class="col m12">
					<table>
						<thead>
							<tr>
								<th class="center-align">CANTIDAD</th>
								<th class="center-align">CONCEPTO</th>
								<th class="center-align">COSTO</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center-align">
									1
								</td>
								<td>
									<?php echo $colAbonoColegiatura->titulo_precio_colegiatura; ?><br>
									<?php echo $colAbonoColegiatura->detalle_precio_colegiatura; ?><br>
									<?php echo $colAbonoColegiatura->detalle_abono_colegiatura; ?><br>
									<?php 
										foreach ($datosAbonoMes as $colAbonoMes) {
											echo $colAbonoMes->cve_mes.'<br>';
										}
									?>
								</td>
								<td class="right-align">
									<?php echo '$ '.number_format($colAbonoColegiatura->monto_precio_colegiatura); ?><br>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col m3 center-align">
					<p>TUTOR</p>
				</div>
				<div class="col m4 center-align">
					<p>
						<?php echo $colAbonoColegiatura->descripcion_usuario; ?>
					</p>
				</div>
				<div class="col m5">
					<div class="col m8">
						<p>
							<strong>DEPOSITO: </strong><br>
							<strong>INTERES (10%): </strong><br>
							<strong>DEPOSITO TOTAL: </strong><br>
						</p>
					</div>
					<div class="col m4 right-align">
						<p>
							<?php echo '$ '.number_format($colAbonoColegiatura->deposito_abono_colegiatura); ?><br>
							<?php echo '$ '.number_format($colAbonoColegiatura->interes_abono_colegiatura); ?><br>
							<?php echo '$ '.number_format($colAbonoColegiatura->deposito_abono_colegiatura + $colAbonoColegiatura->interes_abono_colegiatura); ?><br>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col m12 right-align">
		<a href="colegiaturacuenta-ver.php?id=<?php echo $colAbonoColegiatura->cve_cuenta_colegiatura; ?>" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="#" class="waves-effect waves-light btn light-blue darken-2">
			<i class="material-icons right">receipt</i>Imprimir ticket
		</a>
		<a href="colegiaturaabono-modificar.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1">
			<i class="material-icons right">payment</i>Modificar Abono
		</a>
	</div>
</div>