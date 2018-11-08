<?php 
	$abonocole = new AbonoColegiatura;
	$datosAbonoColegiatura = $abonocole->generarRecibo($key, $_GET['id']);
	foreach ($datosAbonoColegiatura as $colAbonoColegiatura) {}

	if ($colAbonoColegiatura->beca_cuenta_colegiatura != 1) {
		$beca = 'TIENE ASIGNADO UN DESCUENTO POR BECA ('.$colAbonoColegiatura->beca_cuenta_colegiatura.')';
	}else{
		$beca = 'NO APLICA';
	}

	//
	$saldo = $colAbonoColegiatura->deposito_abono_colegiatura + $colAbonoColegiatura->interes_abono_colegiatura;

	$metodopago = new MetodoPago;
	$datosMetodoPago = $metodopago->listar($key);
	
	$abonomes = new AbonoMes;
	$datosAbonoMes = $abonomes->listarMes($key, $_GET['id']);
	#print_r($datosAbonoMes);
	foreach ($datosAbonoMes as $colAbonoMes) {
		echo $colAbonoMes->cve_mes.'<br>';
	}

	$utilidad = new Utilidad;
	$arrayMesesA = $utilidad->listarMesesA();
	$arrayMesesB = $utilidad->listarMesesB();

?>
<div class="row">
	<div class="col m12">
		<h4 class="grey-text text-darken-1">Crear abono colegiatura</h4>
	</div>
	<div class="col m12">
		<div class="card-panel grey lighten-4">
			<span class="black-text">
				<strong>FOLIO CUENTA: </strong><?php echo $colAbonoColegiatura->folio_cuenta_colegiatura.$colAbonoColegiatura->cve_cuenta_colegiatura; ?><br>
				<strong>NOMBRE DEL ALUMNO: </strong><?php echo $colAbonoColegiatura->nombre_completo; ?><br>
				<strong>GRUPO: </strong><?php echo $colAbonoColegiatura->cve_grupo; ?><br>
				<strong>FECHA DE LA CUENTA: </strong><?php echo $colAbonoColegiatura->fecha_cuenta_colegiatura; ?><br>
				<strong>DESCRIPCIÓN CUENTA: </strong><?php echo $colAbonoColegiatura->descripcion_cuenta_colegiatura; ?><br>
				<strong>CONCEPTO DE COLEGIATURA: </strong><?php echo $colAbonoColegiatura->titulo_precio_colegiatura; ?><br>
				<strong>CUOTA DE COLEGIATURA: </strong><?php echo '$ '.number_format($colAbonoColegiatura->monto_precio_colegiatura); ?><br>
				<strong>MESES A PAGAR: </strong><?php echo $colAbonoColegiatura->meses_precio_colegiatura; ?><br>
				<strong>MONTO TOTAL DE LA CUENTA: </strong><?php echo '$ '.number_format($colAbonoColegiatura->monto_cuenta_colegiatura); ?><br>
				<strong>BECA: </strong><?php echo $beca; ?><br>
				<strong>ESTADO DE LA CUENTA: </strong><?php echo $colAbonoColegiatura->estado_pago_cuenta; ?><br>
			</span>
		</div>
	</div>
	<div class="col m12 s12">
		<div class="card-panel grey lighten-5">
			<form action="procs/abonocolegiatura.edit.php" method="POST">
				<div class="row">
					<div class="col m7 s12">
						<div class="col m12 s12">
							<h5 class="grey-text text-darken-1">Elegir mes</h5>
						</div>
						<div class="col m6 s12">
						<input type="text" name="contador_meses" id="contador_meses" class="validate" value="0" hidden>
							<?php 

								foreach ($arrayMesesA as $colArrayMesesA => $valArrayMesesA) {
									foreach ($datosAbonoMes as $colAbonoMes) {
										if ($valArrayMesesA == $colAbonoMes->cve_mes) {
											echo '
													<p>
														<input type="checkbox" id="'.$valArrayMesesA.'" name="'.$valArrayMesesA.'" onclick="agregarMes("'.$valArrayMesesA.'");" disabled checked>
														<label for="'.$valArrayMesesA.'">'.$valArrayMesesA.'</label>
													</p>
												';
										}else{
											echo '
													<p>
														<input type="checkbox" id="'.$valArrayMesesA.'" name="'.$valArrayMesesA.'" onclick="agregarMes("'.$valArrayMesesA.'");" disabled>
														<label for="'.$valArrayMesesA.'">'.$valArrayMesesA.'</label>
													</p>
												';
										}
									}
								}
							?>
						</div>
						<div class="col m6 s12">
							<?php 
								foreach ($arrayMesesB as $colArrayMesesB => $valArrayMesesB) {
									foreach ($datosAbonoMes as $colAbonoMes) {
										if ($valArrayMesesB == $colAbonoMes->cve_mes) {
											echo '
													<p>
														<input type="checkbox" id="'.$valArrayMesesB.'" name="'.$valArrayMesesB.'" onclick="agregarMes("'.$valArrayMesesB.'");" disabled checked>
														<label for="'.$valArrayMesesB.'">'.$valArrayMesesB.'</label>
													</p>
												';
										}else{
											echo '
													<p>
														<input type="checkbox" id="'.$valArrayMesesB.'" name="'.$valArrayMesesB.'" onclick="agregarMes("'.$valArrayMesesB.'");" disabled>
														<label for="'.$valArrayMesesB.'">'.$valArrayMesesB.'</label>
													</p>
												';
										}
									}
								}
							?>
						</div>
					</div>
					<div class="col m5 s12">
						<div class="col m12 s12">
							<input type="text" name="id_abono" id="id_abono" class="validate" value="<?php echo $_GET['id']; ?>" hidden>
							<input type="text" name="id_cuenta" id="id_cuenta" class="validate" value="<?php echo $colAbonoColegiatura->cve_cuenta_colegiatura; ?>" hidden>
							<input type="text" name="precio_base" id="precio_base" class="validate" value="<?php echo $colCuentaColegiatura->monto_precio_colegiatura; ?>" hidden>
							<input type="text" name="precio_interes" id="precio_interes" class="validate" value="<?php echo $saldo; ?>" hidden>
						</div>
						<!-- 
						<div class="col m12 s12">
							<input type="checkbox" name="inter" id="inter" checked="checked" onclick="actualizarSaldo();" disabled />
							<label for="inter">Aplica interes 10%</label>
						</div>
						-->
						<!-- -->
						<label for="deposito_base">Deposito</label>
						<input type="text" name="deposito_base" id="deposito_base" class="validate" autocomplete="off" value="<?php echo $colAbonoColegiatura->deposito_abono_colegiatura; ?>" required onkeyup="calcularTotal()">
						<label for="interes_base">Interes</label>
						<input type="text" name="interes_base" id="interes_base" class="validate" autocomplete="off" value="<?php echo $colAbonoColegiatura->interes_abono_colegiatura; ?>" required onkeyup="calcularTotal()">
						<label for="monto_base">Monto Total</label>
						<input type="text" name="monto_base" id="monto_base" class="validate" autocomplete="off" value="<?php echo $saldo; ?>" required disabled>
						<!-- -->
					</div>
					<div class="col m12">
						<div class="input-field col m6 s12">
							<label>Metodo de Pago</label><br><br>
							<?php 
								foreach ($datosMetodoPago as $colMetodoPago) {
									echo '<input name="metodo_pago" type="radio" id="'.$colMetodoPago->cve_metodo_pago.'" value="'.$colMetodoPago->cve_metodo_pago.'" checked><label for="'.$colMetodoPago->cve_metodo_pago.'">'.$colMetodoPago->cve_metodo_pago.'</label>';
								}
							?>
						</div>
						<div class="input-field col m6 s12">
							<textarea id="detalle" name="detalle" class="materialize-textarea"><?php echo $colAbonoColegiatura->detalle_abono_colegiatura; ?></textarea>
							<label for="detalle">Detalle del pago</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col m12 s12 right-align">
						<a href="colegiaturaabono-ver.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn">
							<i class="material-icons left">replay</i>Regresar
						</a>
						<input type="submit" value="Modificar abono" class="waves-effect waves-light btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- -->
<script>

	function calcularTotal(){
		document.getElementById('monto_base').value = parseInt(document.getElementById('deposito_base').value) + parseInt(document.getElementById('interes_base').value);
	}
</script>