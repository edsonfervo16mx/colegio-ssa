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

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Abono a cuenta</h4>
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
	<div class="col m12">
		<form action="procs/abonoservicio.add.php" method="POST">
			<div class="col m12 s12">
				<div class="card-panel grey lighten-5">
					<div class="row">
						<div class="col m12 s12">
							<input type="text" name="id" id="id" class="validate" value="<?php echo $_GET['id'] ?>" hidden>
						</div>
						<div class="col m6 s12">
							<div class="col m12 s12">
								<label for="saldopendiente">Saldo Pendiente</label>
								<input type="text" name="saldopendiente" id="saldopendiente" class="validate" value="<?php echo $deuda; ?>" disabled>
							</div>
							<div class="col m12 s12">
								<label for="deposito">Deposito</label>
								<input type="text" name="deposito" id="deposito" class="validate" autofocus onkeyup="calculate()">
							</div>
							<div class="col m12 s12">
								<label for="adeudo">Adeudo</label>
								<input type="text" name="adeudo" id="adeudo" class="validate" disabled>
							</div>
						</div>
						<div class="col m6 s12">
							<div class="input-field col m12 s12">
								<label>Metodo de Pago</label><br><br>
								<?php 
									foreach ($datosMetodoPago as $colMetodoPago) {
										echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
									}
								?>
							</div>
						</div>
						<div class="col m12 s12">
							<div class="input-field col m12 s12">
								<textarea id="detalle" name="detalle" class="materialize-textarea"></textarea>
								<label for="detalle">Detalle del pago</label>
							</div>
						</div>
						<div class="col m12 s12 right-align">
							<a href="serviciocuenta-ver.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn">
								<i class="material-icons left">replay</i>Regresar
							</a>
							<input type="submit" value="Abonar" class="waves-effect waves-light btn">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>