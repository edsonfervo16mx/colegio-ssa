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

	$total_inscripcion = 0;
	$total_servicio = 0;
	$total_colegiatura = 0;
	$total_venta = 0;
	$total_ingreso = 0;

	foreach ($reporteInscripcion as $colInscripcion) {
		$total_inscripcion = $total_inscripcion + $colInscripcion->deposito_abono_inscripcion;
	}

	foreach ($reporteServicio as $colServicio) {
		$total_servicio = $total_servicio + $colServicio->deposito_abono_servicios;
	}

	foreach ($reporteColegiatura as $colColegiatura) {
		$total_colegiatura = $total_colegiatura + $colColegiatura->deposito_abono_colegiatura;
	}

	foreach ($reporteVenta as $colVenta) {
		$total_venta = $total_venta + $colVenta->deposito_abono_venta;
	}

	$total_ingreso = $total_inscripcion + $total_servicio + $total_colegiatura + $total_venta;

	//---------------------------------------------------
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
<table class="table table-hover">
	<thead>
		<tr>
			<th>FOLIO</th>
			<th>FECHA</th>
			<th>CONCEPTO</th>
			<th>NOMBRE COMPLETO</th>
			<th>METODO PAGO</th>
			<th>DEPOSITO</th>
		</tr>
	</thead>
	<tbody>';
		foreach ($reporteInscripcion as $colInscripcion) {
			$html = $html.'	<tr>
			<td><small>'.$colInscripcion->folio_cuenta_inscripcion.$colInscripcion->cve_cuenta_inscripcion.'/A-'.$colInscripcion->cve_abono_inscripcion.'</small></td>
			<td><small>'.$colInscripcion->fecha_abono_inscripcion.'</small></td>
			<td><small>'.$colInscripcion->titulo_precio_inscripcion.'</small></td>
			<td><small>'.$colInscripcion->nombre_completo.'</small></td>
			<td><small>'.$colInscripcion->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.number_format($colInscripcion->deposito_abono_inscripcion).'</td>
			</tr>';
		}
		foreach ($reporteServicio as $colServicio) {
			$html = $html.' <tr>
			<td><small>'.$colServicio->folio_cuenta_servicios.$colServicio->cve_cuenta_servicios.'/A-'.$colServicio->cve_abono_servicios.'</small></td>
			<td><small>'.$colServicio->fecha_abono_servicios.'</small></td>
			<td><small>'.$colServicio->titulo_precio_servicios.'</small></td>
			<td><small>'.$colServicio->nombre_completo.'</small></td>
			<td><small>'.$colServicio->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.number_format($colServicio->deposito_abono_servicios).'</td>
			</tr>';
		}
		foreach ($reporteColegiatura as $colColegiatura) {
			$html = $html.'<tr>
			<td><small>'.$colColegiatura->folio_cuenta_colegiatura.$colColegiatura->cve_cuenta_colegiatura.'/A-'.$colColegiatura->cve_abono_colegiatura.'</small></td>
			<td><small>'.$colColegiatura->fecha_abono_colegiatura.'</small></td>
			<td><small>'.$colColegiatura->titulo_precio_colegiatura.'</small></td>
			<td><small>'.$colColegiatura->nombre_completo.'</small></td>
			<td><small>'.$colColegiatura->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.number_format($colColegiatura->deposito_abono_colegiatura).'</td>
			</tr>';
		}
		foreach ($reporteVenta as $colVenta) {
			$html = $html.'<tr>
			<td><small>'.$colVenta->folio_cuenta_venta.$colVenta->cve_cuenta_venta.'/A-'.$colVenta->cve_abono_venta.'</small></td>
			<td><small>'.$colVenta->fecha_abono_venta.'</small></td>
			<td><small>VENTA DE PRODUCTOS</small></td>
			<td><small>'.$colVenta->nombre_cuenta_venta.'</small></td>
			<td><small>'.$colVenta->cve_metodo_pago.'</small></td>
			<td class="text-right">$ '.number_format($colVenta->deposito_abono_venta).'</td>
			</tr>';
		}
	$html = $html.'	
	</tbody>
</table>
<h3>Totales</h3>
<table class="table table-hover">
	<thead>
		<tr>
			<th>INSCRIPCION</th>
			<th>SERVICIOS</th>
			<th>COLEGIATURAS</th>
			<th>VENTAS</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="text-right">$ '.number_format($total_inscripcion).'</td>
			<td class="text-right">$ '.number_format($total_servicio).'</td>
			<td class="text-right">$ '.number_format($total_colegiatura).'</td>
			<td class="text-right">$ '.number_format($total_venta).'</td>
		</tr>
	</tbody>
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
$dompdf->set_paper('letter','landscape');
//Hacemos la conversion de HTML a PDF
$dompdf->render();

//El nombre con el que deseamos guardar el archivo generado

$dompdf->stream("reporte-ingresos.pdf", array("Attachment" => false));
//exit(0);
/**/

?>