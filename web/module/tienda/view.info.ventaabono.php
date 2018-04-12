<?php
	$abonoventa = new AbonoVenta;
	$datosAbonoVenta = $abonoventa->generarRecibo($key, $_GET['id']);
	foreach ($datosAbonoVenta as $colAbonoVenta) {}

	$rel = new RelVentasProducto;
	$datosRelProducto = $rel->listarDetalles($key, $colAbonoVenta->cve_cuenta_venta);

	$cantidades = $abonoventa->listarDetalles($key, $colAbonoVenta->cve_cuenta_venta);

	$abono = 0;
	foreach ($cantidades as $colCantidad) {
		if ($colCantidad->cve_abono_venta < $_GET['id']) {
			$abono = $abono + $colCantidad->deposito_abono_venta;
		}
	}

	$abonototal = $abono + $colAbonoVenta->deposito_abono_venta;
	$adeudo = $colAbonoVenta->monto_cuenta_venta - $abonototal;

?>
<div class="row">
	<div class="col m12 s12">
		<h4 class="grey-text text-darken-1">Abono a cuenta ventas</h4>
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
					<h6>COLEGIO JEAN PIAGET PARAÍSO</h6>
					<h6>PARAÍSO TABASCO</h6>
				</div>
			</div>
			<div class="row">
				<div class="col m4">
					<p>
						<strong>FOLIO: </strong>
						<?php echo $colAbonoVenta->folio_cuenta_venta.$colAbonoVenta->cve_cuenta_venta.'/A-'.$colAbonoVenta->cve_abono_venta; ?><br>
					</p>
				</div>
				<div class="col m8 right-align">
					<p>
						<h6>ABONO POR VENTA</h6>
						<strong><?php echo date('l, d F Y H:i:s'); ?></strong>
					</p>
				</div>
				<div class="col m12">
					<strong>NOMBRE DEL ALUMNO: </strong>
					<?php echo $colAbonoVenta->nombre_cuenta_venta; ?><br>
					<strong>METODO PAGO: </strong>
					<?php echo $colAbonoVenta->cve_metodo_pago; ?><br>
					<strong>FECHA PAGO: </strong>
					<?php echo $colAbonoVenta->fecha_abono_venta; ?><br>
				</div>
				<div class="col m12">
					<table>
						<thead>
							<tr>
								<th class="center-align">CANTIDAD</th>
								<th class="center-align">CONCEPTO</th>
								<th class="center-align">COSTO</th>
								<th class="center-align">IMPORTE</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($datosRelProducto as $colRelProducto) {
									echo '<tr>';
									echo '<td class="center-align">'.$colRelProducto->cantidad_rel_ventas_producto.'</td>';
									echo '<td class="">'.$colRelProducto->titulo_producto.'<br>'.$colRelProducto->cve_categoria.'</td>';
									echo '<td class="right-align">$ '.number_format($colRelProducto->precio_producto).'</td>';
									echo '<td class="right-align">$ '.number_format($colRelProducto->precio_producto * $colRelProducto->cantidad_rel_ventas_producto).'</td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="col m3 center-align">
					<p>TUTOR</p>
				</div>
				<div class="col m4 center-align">
					<p>
						<?php echo $colAbonoVenta->descripcion_usuario; ?>
					</p>
				</div>
				<div class="col m5">
					<div class="col m8">
						<p>
							<strong>TOTAL A PAGAR: </strong><br>
							<strong>ABONADO: </strong><br>
							<strong>MONTO DE PAGO: </strong><br>
							<strong>TOTAL ABONADO: </strong><br>
							<strong>USTED ADEUDA: </strong><br>
						</p>
					</div>
					<div class="col m4 right-align">
						<p>
							<?php echo '$ '.number_format($colAbonoVenta->monto_cuenta_venta); ?><br>
							<?php echo '$ '.number_format($abono); ?><br>
							<?php echo '$ '.number_format($colAbonoVenta->deposito_abono_venta); ?><br>
							<?php echo '$ '.number_format($abonototal); ?><br>
							<?php echo '$ '.number_format($adeudo); ?><br>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Recibo-->
<div class="row">
	<div class="col m12 right-align">
		<a href="ventacuenta-ver.php?id=<?php echo $colAbonoVenta->cve_cuenta_venta; ?>" class="waves-effect waves-light btn grey darken-1">
			<i class="material-icons right">replay</i>Regresar
		</a>
		<a href="recibo-venta.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-blue darken-2" target="_blank">
			<i class="material-icons right">receipt</i>Imprimir ticket
		</a>
		<a href="ventaabono-modificar.php?id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn light-green darken-1" disabled>
			<i class="material-icons right">payment</i>Modificar Abono
		</a>
		<!-- -->
		<?php 
			if (date('Y-m-d')==$colAbonoVenta->fecha_abono_venta) {
				echo '
					<a href="procs/ventaabono.drop.php?folio='.$colAbonoVenta->cve_abono_venta.'&fecha_folio='.$colAbonoVenta->fecha_abono_venta.'&cuenta='.$colAbonoVenta->cve_cuenta_venta.'" class="waves-effect waves-light btn deep-orange darken-4">
						<i class="material-icons right">close</i>Cancelar
					</a>';
			}else{
				echo '
					<button class="waves-effect waves-light btn deep-orange darken-4" disabled>
						<i class="material-icons right">close</i>NO DISPONIBLE
					</button>';
			}
		?>
		<!-- -->
	</div>
</div>