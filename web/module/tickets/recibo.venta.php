<?php 
//----------------------------------------

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

//----------------------------------------
$html = '
<style>
	img{
		width: 100px;
	}
	.title-head{
		font-size: 13px;
	}

	.info-factura{
		font-size: 11px;
	}
	.text-left {
	  text-align: left;
	}
	.text-right {
	  text-align: right;
	}
	.text-center {
	  text-align: center;
	}
	.text-justify {
	  text-align: justify;
	}

	.table {
	  width: 100%;
	  max-width: 100%;
	  font-size:11px;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
	  padding: 8px;
	  line-height: 1.42857143;
	  vertical-align: top;
	  border-top: 1px solid #ddd;
	}
	.table > thead > tr > th {
	  vertical-align: bottom;
	  border-bottom: 2px solid #ddd;
	}
	.table > caption + thead > tr:first-child > th,
	.table > colgroup + thead > tr:first-child > th,
	.table > thead:first-child > tr:first-child > th,
	.table > caption + thead > tr:first-child > td,
	.table > colgroup + thead > tr:first-child > td,
	.table > thead:first-child > tr:first-child > td {
	  border-top: 0;
	}
	.table > tbody + tbody {
	  border-top: 2px solid #ddd;
	}
	.table .table {
	  background-color: #fff;
	}
	.info-small{
		font-size: 11px;
	}
</style>
<table>
	<thead>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<img src="img/logos/bachiller.png" alt="">
						</td>
						<td class="text-center">
							<h5 class="title-head">RECIBO DE PAGO</h5>
							<p class="title-head">COLEGIO JEAN PIAGET PARAÍSO</p>
						</td>
					</tr>
					<tr>
						<td class="info-factura">
							<strong>FOLIO: </strong>
							'.$colAbonoVenta->folio_cuenta_venta.$colAbonoVenta->cve_cuenta_venta.'/A-'.$colAbonoVenta->cve_abono_venta.'
						</td>
						<td class="text-right info-factura">
							<strong>VENTA</strong><br>
							'.date('l, d F Y H:i:s').'
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td class="info-factura">
							<strong>NOMBRE DEL ALUMNO:</strong>
							'.$colAbonoVenta->nombre_cuenta_venta.'<br>
							<strong>METODO DE PAGO:</strong>
							<small>'.$colAbonoVenta->cve_metodo_pago.'</small><br>
							<strong>FECHA DE PAGO:</strong>
							'.$colAbonoVenta->fecha_abono_venta.'
						</td>
					</tr>
				</table>
				<table class="table table-hover">
				    <thead>
				       <tr>
				            <th>CANTIDAD</th>
				            <th>CONCEPTO</th>
				            <th>PRECIO</th>
				            <th>IMPORTE</th>
				        </tr>
				    </thead>
				    <tbody>';

				    	foreach ($datosRelProducto as $colRelProducto) {
				    		$html = $html.'
				    				<tr>
				    					<td>'.$colRelProducto->cantidad_rel_ventas_producto.'</td>
				    					<td class="">'.$colRelProducto->titulo_producto.'->'.$colRelProducto->cve_categoria.'</td>
				    					<td class="text-right">$ '.number_format($colRelProducto->precio_producto).'</td>
				    					<td class="text-right">$ '.number_format($colRelProducto->precio_producto * $colRelProducto->cantidad_rel_ventas_producto).'</td>
				    				</tr>
				    				';
						}

				    $html = $html.'
				    </tbody>
				</table>
				<table class="table">
					<tr>
						<td width="100px" class="text-center info-small">
							RECIBO
						</td>
						<td class="text-center info-small">
							'.$colAbonoVenta->descripcion_usuario.'
						</td>
						<td>
							<table class="info-small">
								<tr>
									<td>TOTAL A PAGAR: </td>
									<td class="text-right">$ '.number_format($colAbonoVenta->monto_cuenta_venta).'</td>
								</tr>
								<tr>
				                    <td>ABONADO: </td>
				                    <td class="text-right">
				                    	$ '.number_format($abono).'
				                    </td>
				                </tr>
				                <tr>
				                    <td>MONTO DE PAGO: </td>
				                    <td class="text-right">
				                    	$ '.number_format($colAbonoVenta->deposito_abono_venta).'
				                    </td>
				                </tr>
				                <tr>
				                    <td>TOTAL ABONADO: </td>
				                    <td class="text-right">
				                    	$ '.number_format($abonototal).'
				                    </td>
				                </tr>
				                <tr>
				                    <td>USTED ADEUDA: </td>
				                    <td class="text-right">
				                    	$ '.number_format($adeudo).'
				                    </td>
				                </tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td>
							<img src="img/logos/bachiller.png" alt="">
						</td>
						<td class="text-center">
							<h5 class="title-head">RECIBO DE PAGO</h5>
							<p class="title-head">COLEGIO JEAN PIAGET PARAÍSO</p>
						</td>
					</tr>
					<tr>
						<td class="info-factura">
							<strong>FOLIO: </strong>
							'.$colAbonoVenta->folio_cuenta_venta.$colAbonoVenta->cve_cuenta_venta.'/A-'.$colAbonoVenta->cve_abono_venta.'
						</td>
						<td class="text-right info-factura">
							<strong>VENTA</strong><br>
							'.date('l, d F Y H:i:s').'
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td class="info-factura">
							<strong>NOMBRE DEL ALUMNO:</strong>
							'.$colAbonoVenta->nombre_cuenta_venta.'<br>
							<strong>METODO DE PAGO:</strong>
							<small>'.$colAbonoVenta->cve_metodo_pago.'</small><br>
							<strong>FECHA DE PAGO:</strong>
							'.$colAbonoVenta->fecha_abono_venta.'
						</td>
					</tr>
				</table>
				<table class="table table-hover">
				    <thead>
				       <tr>
				            <th>CANTIDAD</th>
				            <th>CONCEPTO</th>
				            <th>PRECIO</th>
				            <th>IMPORTE</th>
				        </tr>
				    </thead>
				    <tbody>';
						    foreach ($datosRelProducto as $colRelProducto) {
					    		$html = $html.'
					    				<tr>
					    					<td>'.$colRelProducto->cantidad_rel_ventas_producto.'</td>
					    					<td class="">'.$colRelProducto->titulo_producto.'->'.$colRelProducto->cve_categoria.'</td>
					    					<td class="text-right">$ '.number_format($colRelProducto->precio_producto).'</td>
					    					<td class="text-right">$ '.number_format($colRelProducto->precio_producto * $colRelProducto->cantidad_rel_ventas_producto).'</td>
					    				</tr>
					    				';
							}
				    $html = $html.'
				    </tbody>
				</table>
				<table class="table">
					<tr>
						<td width="100px" class="text-center info-small">
							RECIBO
						</td>
						<td class="text-center info-small">
							'.$colAbonoVenta->descripcion_usuario.'
						</td>
						<td>
							<table class="info-small">
								<tr>
									<td>TOTAL A PAGAR: </td>
									<td class="text-right">$ '.number_format($colAbonoVenta->monto_cuenta_venta).'</td>
								</tr>
								<tr>
				                    <td>ABONADO: </td>
				                    <td class="text-right">
				                    	$ '.number_format($abono).'
				                    </td>
				                </tr>
				                <tr>
				                    <td>MONTO DE PAGO: </td>
				                    <td class="text-right">
				                    	$ '.number_format($colAbonoVenta->deposito_abono_venta).'
				                    </td>
				                </tr>
				                <tr>
				                    <td>TOTAL ABONADO: </td>
				                    <td class="text-right">
				                    	$ '.number_format($abonototal).'
				                    </td>
				                </tr>
				                <tr>
				                    <td>USTED ADEUDA: </td>
				                    <td class="text-right">
				                    	$ '.number_format($adeudo).'
				                    </td>
				                </tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</thead>
</table>
';

#echo $html;
#bloque generador----------------------------------------
/**/
$dompdf = new DOMPDF();

//Cargamos nuestro código HTML
$dompdf->load_html($html);

//carta=letter
//oficio=job
//landscape
$dompdf->set_paper('letter','landscape');

//Hacemos la conversion de HTML a PDF
$dompdf->render();

//El nombre con el que deseamos guardar el archivo generado
$dompdf->stream("factura-venta.pdf", array("Attachment" => false));
/**/
?>