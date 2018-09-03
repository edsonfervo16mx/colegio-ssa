<?php

	$arregloInscripcion = unserialize($_GET['arrayInscripcion']);
	#print_r($arregloInscripcion);

	$arregloServicios = unserialize($_GET['arrayServicios']);
	#print_r($arregloServicios);

	$arregloColegiaturas = unserialize($_GET['arrayColegiaturas']);
	#print_r($arregloColegiaturas);

	$arregloVentas = unserialize($_GET['arrayVentas']);
	#print_r($arregloVentas);

	$arregloGastos = unserialize($_GET['arrayGastos']);
	#print_r($arregloGastos);

	$total_ingresos = $arregloInscripcion[6] + $arregloServicios[6] + $arregloColegiaturas[6] + $arregloVentas[6];

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
					<h2>REPORTE GENERAL</h2>
					<h4>COLEGIO JEAN PIAGET PARAÍSO</h4>
				</td>
			</tr>
			<tr>
				<td class="info-factura">
					<strong>BALANCE: </strong>
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
		<h3>INGRESOS DETALLES</h3>
		<table class="table table-hover">
			<tr>
				<th>INSCRIPCIONES</th>
				<th></th>
				<th>SERVICIOS</th>
				<th></th>
			</tr>
			<tr>
				<td>CHEQUE</td>
				<td class="text-right">'.number_format($arregloInscripcion[0]).'</td>
				<td>CHEQUE</td>
				<td class="text-right">'.number_format($arregloServicios[0]).'</td>
			</tr>
			<tr>
				<td>DEPOSITO CUENTA</td>
				<td class="text-right">'.number_format($arregloInscripcion[1]).'</td>
				<td>DEPOSITO CUENTA</td>
				<td class="text-right">'.number_format($arregloServicios[1]).'</td>
			</tr>
			<tr>
				<td>EFECTIVO</td>
				<td class="text-right">'.number_format($arregloInscripcion[2]).'</td>
				<td>EFECTIVO</td>
				<td class="text-right">'.number_format($arregloServicios[2]).'</td>
			</tr>
			<tr>
				<td>TARJETA DE CREDITO</td>
				<td class="text-right">'.number_format($arregloInscripcion[3]).'</td>
				<td>TARJETA DE CREDITO</td>
				<td class="text-right">'.number_format($arregloServicios[3]).'</td>
			</tr>
			<tr>
				<td>TARJETA DE DEBITO</td>
				<td class="text-right">'.number_format($arregloInscripcion[4]).'</td>
				<td>TARJETA DE DEBITO</td>
				<td class="text-right">'.number_format($arregloServicios[4]).'</td>
			</tr>
			<tr>
				<td>TRANSFERENCIA</td>
				<td class="text-right">'.number_format($arregloInscripcion[5]).'</td>
				<td>TRANSFERENCIA</td>
				<td class="text-right">'.number_format($arregloServicios[5]).'</td>
			</tr>
			<tr>
				<td><strong>TOTAL</strong></td>
				<td class="text-right">'.number_format($arregloInscripcion[6]).'</td>
				<td><strong>TOTAL</strong></td>
				<td class="text-right">'.number_format($arregloServicios[6]).'</td>
			</tr>
		</table>
		<table class="table table-hover">
			<tr>
				<th>COLEGIATURAS</th>
				<th></th>
				<th>VENTAS</th>
				<th></th>
			</tr>
			<tr>
				<td>CHEQUE</td>
				<td class="text-right">'.number_format($arregloColegiaturas[0]).'</td>
				<td>CHEQUE</td>
				<td class="text-right">'.number_format($arregloVentas[0]).'</td>
			</tr>
			<tr>
				<td>DEPOSITO CUENTA</td>
				<td class="text-right">'.number_format($arregloColegiaturas[1]).'</td>
				<td>DEPOSITO CUENTA</td>
				<td class="text-right">'.number_format($arregloVentas[1]).'</td>
			</tr>
			<tr>
				<td>EFECTIVO</td>
				<td class="text-right">'.number_format($arregloColegiaturas[2]).'</td>
				<td>EFECTIVO</td>
				<td class="text-right">'.number_format($arregloVentas[2]).'</td>
			</tr>
			<tr>
				<td>TARJETA DE CREDITO</td>
				<td class="text-right">'.number_format($arregloColegiaturas[3]).'</td>
				<td>TARJETA DE CREDITO</td>
				<td class="text-right">'.number_format($arregloVentas[3]).'</td>
			</tr>
			<tr>
				<td>TARJETA DE DEBITO</td>
				<td class="text-right">'.number_format($arregloColegiaturas[4]).'</td>
				<td>TARJETA DE DEBITO</td>
				<td class="text-right">'.number_format($arregloVentas[4]).'</td>
			</tr>
			<tr>
				<td>TRANSFERENCIA</td>
				<td class="text-right">'.number_format($arregloColegiaturas[5]).'</td>
				<td>TRANSFERENCIA</td>
				<td class="text-right">'.number_format($arregloVentas[5]).'</td>
			</tr>
			<tr>
				<td><strong>TOTAL</strong></td>
				<td class="text-right">'.number_format($arregloColegiaturas[6]).'</td>
				<td><strong>TOTAL</strong></td>
				<td class="text-right">'.number_format($arregloVentas[6]).'</td>
			</tr>
		</table>
		<h4>INGRESOS TOTALES</h4>
		<table class="table table-hover">
			<tr>
				<th>INSCRIPCIONES</th>
				<th>SERVICIOS</th>
				<th>COLEGIATURAS</th>
				<th>VENTAS</th>
				<th>TOTAL INGRESOS</th>
			</tr>
			<tr>
				<td class="text-center">'.number_format($arregloInscripcion[6]).'</td>
				<td class="text-center">'.number_format($arregloServicios[6]).'</td>
				<td class="text-center">'.number_format($arregloColegiaturas[6]).'</td>
				<td class="text-center">'.number_format($arregloVentas[6]).'</td>
				<td class="text-center">'.number_format($total_ingresos).'</td>
			</tr>
		</table>
		<h3>EGRESOS DETALLES</h3>
		<table class="table table-hover">
			<tr>
				<th>GASTOS</th>
				<th></th>
			</tr>
			<tr>
				<td>CHEQUE</td>
				<td class="text-right">'.number_format($arregloGastos[0]).'</td>
			</tr>
			<tr>
				<td>DEPOSITO CUENTA</td>
				<td class="text-right">'.number_format($arregloGastos[1]).'</td>
			</tr>
			<tr>
				<td>EFECTIVO</td>
				<td class="text-right">'.number_format($arregloGastos[2]).'</td>
			</tr>
			<tr>
				<td>TARJETA DE CREDITO</td>
				<td class="text-right">'.number_format($arregloGastos[3]).'</td>
			</tr>
			<tr>
				<td>TARJETA DE DEBITO</td>
				<td class="text-right">'.number_format($arregloGastos[4]).'</td>
			</tr>
			<tr>
				<td>TRANSFERENCIA</td>
				<td class="text-right">'.number_format($arregloGastos[5]).'</td>
			</tr>
			<tr>
				<td><strong>TOTAL</strong></td>
				<td class="text-right">'.number_format($arregloGastos[6]).'</td>
			</tr>
		</table>
	';
	//Creamos la instancia
	
	/**/
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

	$dompdf->stream("reporte-balance.pdf", array("Attachment" => false));
	//exit(0);
	/**/
?>