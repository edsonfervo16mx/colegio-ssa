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
	$mes = new Mes;
	$datosMes = $mes->listar($key);

	//VALIDACION DE INTERES
	$dia = date('d');
	if ($dia > 10) {
		$saldo = ($colCuentaColegiatura->monto_precio_colegiatura * 1.10);
	}else{
		$saldo = $colCuentaColegiatura->monto_precio_colegiatura;
	}

	//VALIDACION DE INTERES
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Crear abono colegiatura</h4>
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
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<form action="procs/abonocolegiatura.add.php" method="POST">
				<div class="row">
					<div class="col m7 s12">
						<div class="col m12 s12">
							<h5 class="grey-text text-darken-1">Elegir mes</h5>
						</div>
						<div class="col m6 s12">
							<p>
								<input type="checkbox" id="AGOSTO" name="AGOSTO">
								<label for="AGOSTO">AGOSTO</label>
							</p>
							<p>
								<input type="checkbox" id="SEPTIEMBRE" name="SEPTIEMBRE">
								<label for="SEPTIEMBRE">SEPTIEMBRE</label>
							</p>
							<p>
								<input type="checkbox" id="OCTUBRE" name="OCTUBRE">
								<label for="OCTUBRE">OCTUBRE</label>
							</p>
							<p>
								<input type="checkbox" id="NOVIEMBRE" name="NOVIEMBRE">
								<label for="NOVIEMBRE">NOVIEMBRE</label>
							</p>
							<p>
								<input type="checkbox" id="DICIEMBRE" name="DICIEMBRE">
								<label for="DICIEMBRE">DICIEMBRE</label>
							</p>
							<p>
								<input type="checkbox" id="ENERO" name="ENERO">
								<label for="ENERO">ENERO</label>
							</p>
						</div>
						<div class="col m6 s12">
							<p>
								<input type="checkbox" id="FEBRERO" name="FEBRERO">
								<label for="FEBRERO">FEBRERO</label>
							</p>
							<p>
								<input type="checkbox" id="MARZO" name="MARZO">
								<label for="MARZO">MARZO</label>
							</p>
							<p>
								<input type="checkbox" id="ABRIL" name="ABRIL">
								<label for="ABRIL">ABRIL</label>
							</p>
							<p>
								<input type="checkbox" id="MAYO" name="MAYO">
								<label for="MAYO">MAYO</label>
							</p>
							<p>
								<input type="checkbox" id="JUNIO" name="JUNIO">
								<label for="JUNIO">JUNIO</label>
							</p>
							<p>
								<input type="checkbox" id="JULIO" name="JULIO">
								<label for="JULIO">JULIO</label>
							</p>
						</div>
					</div>
					<div class="col m5 s12">
						<div class="col m12 s12">
							<input type="text" name="id" id="id" class="validate" value="<?php echo $_GET['id'] ?>" hidden>
						</div>
						<div class="col m12 s12">
							<input type="checkbox" id="test7" checked="checked"/>
							<label for="test7">Aplica interes 10%</label>
						</div>
						<div class="col m12 s12"><br>
							<label for="saldopendiente">Monto a Pagar</label>
							<input type="text" name="saldopendiente" id="saldopendiente" class="validate" value="<?php echo $saldo; ?>" disabled>
						</div>
						<div class="col m12 s12">
							<label for="deposito">Deposito</label>
							<input type="text" name="deposito" id="deposito" class="validate" autofocus onkeyup="calculate()" autocomplete="off">
						</div>
						<div class="col m12 s12">
							<label for="adeudo">Adeudo</label>
							<input type="text" name="adeudo" id="adeudo" class="validate" disabled>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>