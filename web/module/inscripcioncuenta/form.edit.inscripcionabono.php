<?php 
	$abonoinscripcion = new AbonoInscripcion;
	$datosAbonoInscripcion = $abonoinscripcion->generarRecibo($key, $_GET['id']);
	#print_r($datosAbonoInscripcion);
	foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {}

	//
	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);
?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Modificar Abono a Cuenta</h4>
	</div>
	<div class="card-panel grey lighten-4">
		<span class="black-text">
			<label>FOLIO CUENTA INSCRIPCIÓN: </label><?php echo $colAbonoInscripcion->folio_cuenta_inscripcion.$colAbonoInscripcion->cve_cuenta_inscripcion; ?><br>
			<label>TITULAR DE LA CUENTA: </label><?php echo $colAbonoInscripcion->nombre_completo; ?><br>
			<label>FECHA DE CREACIÓN DE LA CUENTA: </label><?php echo $colAbonoInscripcion->fecha_cuenta_inscripcion; ?><br>
			<label>MONTO A PAGAR: </label><?php echo $colAbonoInscripcion->monto_cuenta_inscripcion; ?><br>
			<label>CONCEPTO: </label><?php echo $colAbonoInscripcion->titulo_precio_inscripcion; ?><br>
			<label>ESTADO DE LA CUENTA: </label><?php echo $colAbonoInscripcion->cve_estado_pago; ?><br>
		</span>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<form action="procs/abonoinscripcion.edit.php" method="POST">
				<div class="row">
					<div class="col m12 s12">
						<div class="col m12 s12">
							<input type="text" name="id_abono" id="id_abono" class="validate" value="<?php echo $_GET['id'] ?>" hidden>
							<input type="text" name="id_cuenta" id="id_cuenta" class="validate" value="<?php echo $colAbonoInscripcion->cve_cuenta_inscripcion; ?>" hidden>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="col m12 s12">
							<label for="fecha">FECHA DE ABONO</label>
							<input type="date" name="fecha" id="fecha" value="<?php echo $colAbonoInscripcion->fecha_cuenta_inscripcion; ?>">
						</div>
						<div class="input-field col m12 s12">
							<input type="text" name="deposito" id="deposito" class="validate" value="<?php echo $colAbonoInscripcion->deposito_abono_inscripcion; ?>">
							<label for="deposito">MONTO DEPOSITADO</label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="input-field col m12 s12">
							<label>Metodo de Pago</label><br><br>
							<?php 
								foreach ($datosMetodoPago as $colMetodoPago) {
									if($colMetodoPago->cve_metodo_pago == $colAbonoInscripcion->cve_metodo_pago){
										echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
									}else{
										echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'"><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
									}
								}
							?>
						</div>
					</div>
					<div class="col m12 s12">
						<div class="input-field col m12 s12">
							<textarea id="detalle" name="detalle" class="materialize-textarea"><?php echo $colAbonoInscripcion->detalle_abono_inscripcion; ?></textarea>
							<label for="detalle">Detalle del pago</label>
						</div>
					</div>
					<div class="col m12 s12 right-align">
						<a href="inscripcioncuenta-ver.php?id=<?php echo $colAbonoInscripcion->cve_cuenta_inscripcion; ?>" class="waves-effect waves-light btn">
							<i class="material-icons left">replay</i>Regresar
						</a>
						<input type="submit" value="Modificar" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>