<?php 
	/**/
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

	/**/
	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Abono a cuenta</h4>
	</div>
	<div class="col m12 s12">
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
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/abonoinscripcion.add.php" method="POST">
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
						<a href="inscripcioncuenta-ver.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn">
							<i class="material-icons left">replay</i>Regresar
						</a>
						<input type="submit" value="Abonar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>