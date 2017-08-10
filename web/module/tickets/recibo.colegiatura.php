<?php

//----------------------------------------
	$abonocole = new AbonoColegiatura;
	$datosAbonoColegiatura = $abonocole->generarRecibo($key, $_GET['id']);
	foreach ($datosAbonoColegiatura as $colAbonoColegiatura) {}

	//
	$cantidades = $abonocole->listarDetalle($key, $colAbonoColegiatura->cve_cuenta_colegiatura);
	$abono = 0;
	foreach ($cantidades as $colCantidad) {
		if ($colCantidad->cve_abono_colegiatura < $_GET['id']) {
			$abono = $abono + $colCantidad->deposito_abono_colegiatura;
		}
	}

	//MESES ABONADOS
	$abonomes = new AbonoMes;
	$datosAbonoMes = $abonomes->listarMes($key, $_GET['id']);


//----------------------------------------

$html = $html = '
<style>	
	img{
		width: 105px;
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
	  margin-bottom: 20px;
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
</style>
<table>
	<tr>
		<td>
			<img src="img/logos/bachiller.png" alt="">
		</td>
		<td class="text-center">
			<p class="title-head">RECIBO DE PAGO</p>
			<p class="title-head">'.$colAbonoColegiatura->nombre_colegio.'</p>
		</td>
	</tr>
	<tr>
		<td class="info-factura">
			<strong>FOLIO: </strong>
			'.$colAbonoColegiatura->folio_cuenta_colegiatura.$colAbonoColegiatura->cve_cuenta_colegiatura.'/A-'.$colAbonoColegiatura->cve_abono_colegiatura.'
		</td>
		<td class="text-right info-factura">
			'.$colAbonoColegiatura->correo_campus.'<br>
			'.date('l, d F Y H:i:s').'
		</td>
	</tr>
</table>
<table>
	<tr>
		<td class="info-factura">
			<strong>NOMBRE DEL ALUMNO:</strong>
			'.$colAbonoColegiatura->nombre_completo.'<br>
			<strong>MATRICULA:</strong>
			'.$colAbonoColegiatura->curp_alumno.'<br>
			<strong>DETALLES:</strong>
			<small>'.$colAbonoColegiatura->cve_constructor_grupo.'</small><br>
			<strong>METODO DE PAGO:</strong>
			<small>'.$colAbonoColegiatura->cve_metodo_pago.'</small><br>
			<strong>FECHA DE PAGO:</strong>
			'.$colAbonoColegiatura->fecha_abono_colegiatura.'
		</td>
	</tr>
</table>
<table class="table table-hover">
    <thead>
        <tr>
            <th>CANTIDAD</th>
            <th>CONCEPTO</th>
            <th>COSTO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>
            	'.$colAbonoColegiatura->titulo_precio_colegiatura.'<br>
            	'.$colAbonoColegiatura->detalle_precio_colegiatura.'<br>
            	'.$colAbonoColegiatura->detalle_abono_colegiatura.'<br>
            	';
            	foreach ($datosAbonoMes as $colAbonoMes) {
					$html= $html.'<strong>'.$colAbonoMes->cve_mes.'</strong><br>';
				}
            	$html = $html.'
            </td>
            <td  class="text-right">
            	$ '.number_format($colAbonoColegiatura->monto_precio_colegiatura).'
            </td>
        </tr>
    </tbody>
</table>
<table class="table">
	<tr>
		<td width="200px" class="text-center">
			tutor
		</td>
		<td class="text-center">
			'.$colAbonoColegiatura->descripcion_usuario.'
		</td>
		<td>
			<table>
				<tr>
					<td>DEPOSITO: </td>
					<td class="text-right">$ '.number_format($colAbonoColegiatura->deposito_abono_colegiatura).'</td>
				</tr>
				<tr>
                    <td>INTERES (10%): </td>
                    <td class="text-right">
                    	$ '.number_format($colAbonoColegiatura->interes_abono_colegiatura).'
                    </td>
                </tr>
                <tr>
                    <td>DEPOSITO TOTAL: </td>
                    <td class="text-right">
                    	$ '.number_format($colAbonoColegiatura->deposito_abono_colegiatura + $colAbonoColegiatura->interes_abono_colegiatura).'
                    </td>
                </tr>
			</table>
		</td>
	</tr>
</table>
';

#echo $html;

#bloque generador----------------------------------------
/**/
$html=$html.$html;
#$html=$html;

//Creamos la instancia
$dompdf = new DOMPDF();

//Cargamos nuestro código HTML
$dompdf->load_html($html);

//carta=letter
//oficio=job
$dompdf->set_paper('letter','portrait');
//Hacemos la conversion de HTML a PDF
$dompdf->render();

//El nombre con el que deseamos guardar el archivo generado

$dompdf->stream("factura-colegiatura.pdf", array("Attachment" => false));
//exit(0);
/**/

?>