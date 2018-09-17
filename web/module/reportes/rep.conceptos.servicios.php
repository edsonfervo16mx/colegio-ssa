<?php
	$servicio = new AbonoServicio;
	$reporteServicio = $servicio->reporte($key,base64_decode($_GET['campus']), base64_decode($_GET['fecha_inicio']), base64_decode($_GET['fecha_final']));

	$total_concepto = 0;

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
			<h2>REPORTE DE SERVICIOS</h2>
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
	foreach ($reporteServicio as $colServicio) {
			if (base64_decode($_GET['cve_servicio']) == $colServicio->cve_precio_servicios){
				$total_concepto = $total_concepto + $colServicio->deposito_abono_servicios;
				$html = $html.' <tr>
				<td><small>'.$colServicio->folio_cuenta_servicios.$colServicio->cve_cuenta_servicios.'/A-'.$colServicio->cve_abono_servicios.'</small></td>
				<td><small>'.$colServicio->fecha_abono_servicios.'</small></td>
				<td><small>'.$colServicio->titulo_precio_servicios.'<br>'.$colServicio->detalle_precio_servicios.'</small></td>
				<td><small>'.$colServicio->nombre_completo.'</small></td>
				<td><small>'.$colServicio->cve_metodo_pago.'</small></td>
				<td class="text-right">$ '.$colServicio->deposito_abono_servicios.'</td>
				</tr>';
			}
		}
	$html = $html.'	
</table>
<h3>Total por concepto de servicios: $ '.$total_concepto.'</h3>
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

$dompdf->stream("reporte-conceptos-servicios.pdf", array("Attachment" => false));
//exit(0);
/**/
?>