<?php

	#echo base64_decode($_GET['campus']).'<br>';
	#echo base64_decode($_GET['fecha_inicio']).'<br>';
	#echo base64_decode($_GET['fecha_final']).'<br>';

//---------------------------------------------------

	$inscripcion = new AbonoInscripcion;
	$reporteInscripcion = $inscripcion->reporte($key,base64_decode($_GET['campus']), base64_decode($_GET['fecha_inicio']), base64_decode($_GET['fecha_final']));

	$servicio = new AbonoServicio;
	$reporteServicio = $servicio->reporte($key,base64_decode($_GET['campus']), base64_decode($_GET['fecha_inicio']), base64_decode($_GET['fecha_final']));

	$colegiatura = new AbonoColegiatura;
	$reporteColegiatura = $colegiatura->reporte($key,base64_decode($_GET['campus']), base64_decode($_GET['fecha_inicio']), base64_decode($_GET['fecha_final']));

	$venta = new AbonoVenta;
	$reporteVenta = $venta->reporte($key,base64_decode($_GET['campus']), base64_decode($_GET['fecha_inicio']), base64_decode($_GET['fecha_final']));

	$relproducto = new RelVentasProducto;


	$total_inscripcion = 0;
	$total_servicio = 0;
	$total_colegiatura = 0;
	$total_venta = 0;
	$total_ingreso = 0;
	$total_gasto = 0;

	//------------------------
	//metodo de pagos
	$ingreso_cheque = 0;
	$ingreso_deposito = 0;
	$ingreso_efectivo = 0;
	$ingreso_credito = 0;
	$ingreso_debito = 0;
	$ingreso_transferencia = 0;

	$egreso_cheque = 0;
	$egreso_deposito = 0;
	$egreso_efectivo = 0;
	$egreso_credito = 0;
	$egreso_debito = 0;
	$egreso_transferencia = 0;

	//------------------------

	foreach ($reporteInscripcion as $colInscripcion) {
		$total_inscripcion = $total_inscripcion + $colInscripcion->deposito_abono_inscripcion;
		//DETALLES METODO PAGO
		if ($colInscripcion->cve_metodo_pago == 'CHEQUE') {
			$ingreso_cheque = $ingreso_cheque + $colInscripcion->deposito_abono_inscripcion;
		}
		if ($colInscripcion->cve_metodo_pago == 'DEPOSITO CUENTA') {
			$ingreso_deposito = $ingreso_deposito + $colInscripcion->deposito_abono_inscripcion;
		}
		if ($colInscripcion->cve_metodo_pago == 'EFECTIVO') {
			$ingreso_efectivo = $ingreso_efectivo + $colInscripcion->deposito_abono_inscripcion;
		}
		if ($colInscripcion->cve_metodo_pago == 'TARJETA DE CREDITO') {
			$ingreso_credito = $ingreso_credito + $colInscripcion->deposito_abono_inscripcion;
		}
		if ($colInscripcion->cve_metodo_pago == 'TARJETA DE DEBITO') {
			$ingreso_debito = $ingreso_debito + $colInscripcion->deposito_abono_inscripcion;
		}
		if ($colInscripcion->cve_metodo_pago == 'TRANSFERENCIA') {
			$ingreso_transferencia = $ingreso_transferencia + $colInscripcion->deposito_abono_inscripcion;
		}
	}

	foreach ($reporteServicio as $colServicio) {
		$total_servicio = $total_servicio + $colServicio->deposito_abono_servicios;
		//DETALLES METODO PAGO
		if ($colServicio->cve_metodo_pago == 'CHEQUE') {
			$ingreso_cheque = $ingreso_cheque + $colServicio->deposito_abono_servicios;
		}
		if ($colServicio->cve_metodo_pago == 'DEPOSITO CUENTA') {
			$ingreso_deposito = $ingreso_deposito + $colServicio->deposito_abono_servicios;
		}
		if ($colServicio->cve_metodo_pago == 'EFECTIVO') {
			$ingreso_efectivo = $ingreso_efectivo + $colServicio->deposito_abono_servicios;
		}
		if ($colServicio->cve_metodo_pago == 'TARJETA DE CREDITO') {
			$ingreso_credito = $ingreso_credito + $colServicio->deposito_abono_servicios;
		}
		if ($colServicio->cve_metodo_pago == 'TARJETA DE DEBITO') {
			$ingreso_debito = $ingreso_debito + $colServicio->deposito_abono_servicios;
		}
		if ($colServicio->cve_metodo_pago == 'TRANSFERENCIA') {
			$ingreso_transferencia = $ingreso_transferencia + $colServicio->deposito_abono_servicios;
		}
	}

	foreach ($reporteColegiatura as $colColegiatura) {
		$total_colegiatura = $total_colegiatura + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		//DETALLES METODO PAGO
		if ($colColegiatura->cve_metodo_pago == 'CHEQUE') {
			$ingreso_cheque = $ingreso_cheque + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		}
		if ($colColegiatura->cve_metodo_pago == 'DEPOSITO CUENTA') {
			$ingreso_deposito = $ingreso_deposito + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		}
		if ($colColegiatura->cve_metodo_pago == 'EFECTIVO') {
			$ingreso_efectivo = $ingreso_efectivo + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		}
		if ($colColegiatura->cve_metodo_pago == 'TARJETA DE CREDITO') {
			$ingreso_credito = $ingreso_credito + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		}
		if ($colColegiatura->cve_metodo_pago == 'TARJETA DE DEBITO') {
			$ingreso_debito = $ingreso_debito + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		}
		if ($colColegiatura->cve_metodo_pago == 'TRANSFERENCIA') {
			$ingreso_transferencia = $ingreso_transferencia + ($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura);
		}
	}

	foreach ($reporteVenta as $colVenta) {
		$total_venta = $total_venta + $colVenta->deposito_abono_venta;
		//DETALLES METODO PAGO
		if ($colVenta->cve_metodo_pago == 'CHEQUE') {
			$ingreso_cheque = $ingreso_cheque + $colVenta->deposito_abono_venta;
		}
		if ($colVenta->cve_metodo_pago == 'DEPOSITO CUENTA') {
			$ingreso_deposito = $ingreso_deposito + $colVenta->deposito_abono_venta;
		}
		if ($colVenta->cve_metodo_pago == 'EFECTIVO') {
			$ingreso_efectivo = $ingreso_efectivo + $colVenta->deposito_abono_venta;
		}
		if ($colVenta->cve_metodo_pago == 'TARJETA DE CREDITO') {
			$ingreso_credito = $ingreso_credito + $colVenta->deposito_abono_venta;
		}
		if ($colVenta->cve_metodo_pago == 'TARJETA DE DEBITO') {
			$ingreso_debito = $ingreso_debito + $colVenta->deposito_abono_venta;
		}
		if ($colVenta->cve_metodo_pago == 'TRANSFERENCIA') {
			$ingreso_transferencia = $ingreso_transferencia + $colVenta->deposito_abono_venta;
		}
	}

	$total_ingreso = $total_inscripcion + $total_servicio + $total_colegiatura + $total_venta;

	//---------------------------------------------------
	$gasto = new Gasto;
	$datosGasto = $gasto->reporte($key,base64_decode($_GET['campus']), base64_decode($_GET['fecha_inicio']), base64_decode($_GET['fecha_final']));
	foreach ($datosGasto as $colGasto) {
		$total_gasto = $total_gasto + $colGasto->monto_gasto;

		//DETALLES METODO PAGO
		if ($colGasto->cve_metodo_pago == 'CHEQUE') {
			$egreso_cheque = $egreso_cheque + $colGasto->monto_gasto;
		}
		if ($colGasto->cve_metodo_pago == 'DEPOSITO CUENTA') {
			$egreso_deposito = $egreso_deposito + $colGasto->monto_gasto;
		}
		if ($colGasto->cve_metodo_pago == 'EFECTIVO') {
			$egreso_efectivo = $egreso_efectivo + $colGasto->monto_gasto;
		}
		if ($colGasto->cve_metodo_pago == 'TARJETA DE CREDITO') {
			$egreso_credito = $egreso_credito + $colGasto->monto_gasto;
		}
		if ($colGasto->cve_metodo_pago == 'TARJETA DE DEBITO') {
			$egreso_deposito = $egreso_deposito + $colGasto->monto_gasto;
		}
		if ($colGasto->cve_metodo_pago == 'TRANSFERENCIA') {
			$egreso_transferencia = $egreso_transferencia + $colGasto->monto_gasto;
		}
	}

	/**/
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
	<tr>
		<td>
			<img src="img/logos/bachiller.png" alt="">
		</td>
		<td class="space_head" width="190px">
		</td>
		<td class="text-center">
			<h2>REPORTE DE CORTE DE CAJA</h2>
			<h4>COLEGIO JEAN PIAGET PARAÍSO</h4>
		</td>
	</tr>
	<tr>
		<td class="info-factura">
			<strong>CORTE DE CAJA: </strong>
			<p>
				FECHA INICIO: <strong>'.base64_decode($_GET['fecha_inicio']).'</strong><br>
				FECHA FINAL: <strong>'.base64_decode($_GET['fecha_final']).'</strong>
			</p>
		</td>
		<td class="space_head" width="190px">
		</td>
		<td class="text-right info-factura">
			FECHA : '.date('l, d F Y H:i:s').'
		</td>
	</tr>
</table>
<h3>Ingresos</h3>
<table class="table table-hover">
	
		<tr>
			<th>FOLIO</th>
			<th>FECHA</th>
			<th>CONCEPTO</th>
			<th>NOMBRE COMPLETO</th>
			<th>METODO PAGO</th>
			<th>DEPOSITO</th>
		</tr>';
		foreach ($reporteInscripcion as $colInscripcion) {
			$html = $html.'	<tr>
			<td><small>'.$colInscripcion->folio_cuenta_inscripcion.$colInscripcion->cve_cuenta_inscripcion.'/A-'.$colInscripcion->cve_abono_inscripcion.'</small></td>
			<td><small>'.$colInscripcion->fecha_abono_inscripcion.'</small></td>
			<td><small>'.$colInscripcion->titulo_precio_inscripcion.'<br>'.$colInscripcion->detalle_precio_inscripcion.'</small></td>
			<td><small>'.$colInscripcion->nombre_completo.'</small></td>
			<td><small>'.$colInscripcion->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.$colInscripcion->deposito_abono_inscripcion.'</td>
			</tr>';
		}
		foreach ($reporteServicio as $colServicio) {
			$html = $html.' <tr>
			<td><small>'.$colServicio->folio_cuenta_servicios.$colServicio->cve_cuenta_servicios.'/A-'.$colServicio->cve_abono_servicios.'</small></td>
			<td><small>'.$colServicio->fecha_abono_servicios.'</small></td>
			<td><small>'.$colServicio->titulo_precio_servicios.'<br>'.$colServicio->detalle_precio_servicios.'</small></td>
			<td><small>'.$colServicio->nombre_completo.'</small></td>
			<td><small>'.$colServicio->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.$colServicio->deposito_abono_servicios.'</td>
			</tr>';
		}
		foreach ($reporteColegiatura as $colColegiatura) {
			$html = $html.'<tr>
			<td><small>'.$colColegiatura->folio_cuenta_colegiatura.$colColegiatura->cve_cuenta_colegiatura.'/A-'.$colColegiatura->cve_abono_colegiatura.'</small></td>
			<td><small>'.$colColegiatura->fecha_abono_colegiatura.'</small></td>
			<td><small>'.$colColegiatura->titulo_precio_colegiatura.'<br>'.$colColegiatura->detalle_precio_colegiatura.'</small></td>
			<td><small>'.$colColegiatura->nombre_completo.'</small></td>
			<td><small>'.$colColegiatura->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.($colColegiatura->deposito_abono_colegiatura + $colColegiatura->interes_abono_colegiatura).'</td>
			</tr>';
		}
		foreach ($reporteVenta as $colVenta) {
			$html = $html.'<tr>
			<td><small>'.$colVenta->folio_cuenta_venta.$colVenta->cve_cuenta_venta.'/A-'.$colVenta->cve_abono_venta.'</small></td>
			<td><small>'.$colVenta->fecha_abono_venta.'</small></td>
			<td>
				<strong>VENTA DE PRODUCTOS</strong><br>';
				$detalleventa = $relproducto->listarDetalles($key,$colVenta->cve_cuenta_venta);
				foreach ($detalleventa as $colProducto) {
					$html = $html.'
						<strong>'.$colProducto->cve_categoria.'</strong><br>
						<small>CANTIDAD: '.$colProducto->cantidad_rel_ventas_producto.'</small><br>
						<small>'.$colProducto->titulo_producto.'</small><br>
						<small>PRECIO UNITARIO: $ '.$colProducto->precio_producto.'</small><br>
						';
				}
				$html = $html.'
			</td>
			<td><small>'.$colVenta->nombre_cuenta_venta.'</small></td>
			<td><small>'.$colVenta->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.$colVenta->deposito_abono_venta.'</td>
			</tr>';
		}
	$html = $html.'	
</table><br>
<h3>Gastos</h3>
<table class="table table-hover">
	
		<tr>
			<th>FOLIO</th>
			<th>FECHA</th>
			<th>CONCEPTO</th>
			<th>DESCRIPCION</th>
			<th>METODO PAGO</th>
			<th>MONTO</th>
		</tr>';
		foreach ($datosGasto as $colGasto) {
			$html = $html.'
				<tr>
					<td>'.$colGasto->cve_gasto.'</td>
					<td>'.$colGasto->fecha_gasto.'</td>
					<td>'.$colGasto->titulo_gasto.'</td>
					<td>'.$colGasto->descripcion_gasto.'</td>
					<td>'.$colGasto->cve_metodo_pago.'</td>
					<td class="text-right">$ '.$colGasto->monto_gasto.'</td>
				</tr>
			';
		}
	$html = $html.'
</table><br><br>
<h3>Totales por concepto</h3>
<table class="table table-hover">
	
		<tr>
			<th>INSCRIPCION</th>
			<th>SERVICIOS</th>
			<th>COLEGIATURAS</th>
			<th>VENTAS</th>
			<th>GASTOS</th>
		</tr>
	
		<tr>
			<td class="text-right">$ '.$total_inscripcion.'</td>
			<td class="text-right">$ '.$total_servicio.'</td>
			<td class="text-right">$ '.$total_colegiatura.'</td>
			<td class="text-right">$ '.$total_venta.'</td>
			<td class="text-right">$ '.$total_gasto.'</td>
		</tr>
</table>
<h3>Detalles</h3>
<table>
	<tr>
		<td>
			<table class="table table-hover">
				<caption>DETALLES EGRESOS</caption>
				<tr>
					<td>CHEQUE</td>
					<td>$ '.$egreso_cheque.'</td>
					<td>DEPOSITO</td>
					<td>$ '.$egreso_deposito.'</td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td>$ '.$egreso_efectivo.'</td>
					<td>TARJETA DE CREDITO</td>
					<td>$ '.$egreso_credito.'</td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td>$ '.$egreso_debito.'</td>
					<td>TRANSFERENCIA</td>
					<td>$ '.$egreso_transferencia.'</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="table table-hover">
				<caption>DETALLES INGRESOS</caption>
				<tr>
					<td>CHEQUE</td>
					<td>$ '.$ingreso_cheque.'</td>
					<td>DEPOSITO</td>
					<td>$ '.$ingreso_deposito.'</td>
				</tr>
				<tr>
					<td>EFECTIVO</td>
					<td>$ '.$ingreso_efectivo.'</td>
					<td>TARJETA DE CREDITO</td>
					<td>$ '.$ingreso_credito.'</td>
				</tr>
				<tr>
					<td>TARJETA DE DEBITO</td>
					<td>$ '.$ingreso_debito.'</td>
					<td>TRANSFERENCIA</td>
					<td>$ '.$ingreso_transferencia.'</td>
				</tr>
			</table>
		</td>
	</tr>
</table><br>
<h3>Total general</h3>
<table class="table table-hover">
	<caption>MONTOS TOTALES</caption>
	<tr>
		<td class="text-left"><strong>TOTAL GASTOS (EGRESO)</strong></td>
		<td class="text-right">$ '.$total_gasto.'</td>
		<td class="text-left"><strong>TOTAL GENERAL INGRESO</strong></td>
		<td class="text-right">$ '.($total_inscripcion+$total_servicio+$total_colegiatura+$total_venta).'</td>
	</tr>
</table>
';

#echo $html;
#bloque generador----------------------------------------

$html=$html;
#$html=$html;


//Creamos la instancia
$dompdf = new DOMPDF();

//Cargamos nuestro código HTML
$dompdf->load_html($html);

//carta=letter
//oficio=job
//horizontal = landscape
//vertical = portrait
$dompdf->set_paper('letter','portrait');
//Hacemos la conversion de HTML a PDF
$dompdf->render();

//El nombre con el que deseamos guardar el archivo generado

$dompdf->stream("reporte-ingresos.pdf", array("Attachment" => false));
//exit(0);
/**/

?>