<?php

//----------------------------------------
	$abonoinscripcion = new AbonoInscripcion;
	$datosAbonoInscripcion = $abonoinscripcion->generarRecibo($key, $_GET['id']);

	foreach ($datosAbonoInscripcion as $colAbonoInscripcion) {}

	$cuentainscripcion = new CuentaInscripcion;
	$datosCuentaInscripcion = $cuentainscripcion->ver($key, $colAbonoInscripcion->cve_cuenta_inscripcion);
	foreach ($datosCuentaInscripcion as $colCuentaInscripcion) {}

	$cantidades = $abonoinscripcion->listarDetalle($key, $colAbonoInscripcion->cve_cuenta_inscripcion);
	$abono = 0;
	foreach ($cantidades as $colCantidad) {
		if($colCantidad->cve_abono_inscripcion < $_GET['id']){
			$abono = $abono + $colCantidad->deposito_abono_inscripcion;
		}
	}
	$descuento = $colAbonoInscripcion->monto_precio_inscripcion - $colAbonoInscripcion->monto_cuenta_inscripcion;
	$deuda = $colAbonoInscripcion->monto_cuenta_inscripcion - ($abono + $colAbonoInscripcion->deposito_abono_inscripcion);

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
			<p class="title-head">'.$colAbonoInscripcion->nombre_colegio.'</p>
		</td>
	</tr>
	<tr>
		<td class="info-factura">
			<strong>FOLIO: </strong>
			'.$colAbonoInscripcion->folio_cuenta_inscripcion.$colAbonoInscripcion->cve_cuenta_inscripcion.'/A-'.$colAbonoInscripcion->cve_abono_inscripcion.'
		</td>
		<td class="text-right info-factura">
			'.$colAbonoInscripcion->correo_campus.'<br>
			'.date('l, d F Y H:i:s').'
		</td>
	</tr>
</table>
<table>
	<tr>
		<td class="info-factura">
			<strong>NOMBRE DEL ALUMNO:</strong>
			'.$colAbonoInscripcion->nombre_completo.'<br>
			<strong>MATRICULA:</strong>
			'.$colAbonoInscripcion->curp_alumno.'<br>
			<strong>DETALLES:</strong>
			<small>'.$colAbonoInscripcion->cve_constructor_grupo.'</small><br>
			<strong>METODO DE PAGO:</strong>
			<small>'.$colAbonoInscripcion->cve_metodo_pago.'</small><br>
			<strong>FECHA DE PAGO:</strong>
			'.$colAbonoInscripcion->fecha_abono_inscripcion.'
		</td>
	</tr>
</table>
<table class="table table-hover">
    
        <tr>
            <th>CANTIDAD</th>
            <th>CONCEPTO</th>
            <th>COSTO</th>
        </tr>
        <tr>
            <td>1</td>
            <td>
            	'.$colAbonoInscripcion->titulo_precio_inscripcion.'<br>
            	'.$colAbonoInscripcion->detalle_precio_inscripcion.'<br>
            	'.$colAbonoInscripcion->detalle_abono_inscripcion.'<br>
            </td>
            <td  class="text-right">
            	$ '.number_format($colAbonoInscripcion->monto_precio_inscripcion).'
            </td>
        </tr>
</table>
<table class="table">
	<tr>
		<td width="200px" class="text-center">
			tutor
		</td>
		<td class="text-center">
			'.$colAbonoInscripcion->descripcion_usuario.'
		</td>
		<td>
			<table>
				<tr>
					<td>SUBTOTAL: </td>
					<td class="text-right">$ '.number_format($colAbonoInscripcion->monto_precio_inscripcion).'</td>
				</tr>
				<tr>
                    <td>DESCUENTO: </td>
                    <td class="text-right">
                    	$ '.number_format($descuento).'
                    </td>
                </tr>
                <tr>
                    <td>TOTAL A PAGAR: </td>
                    <td class="text-right">
                    	$ '.number_format($colAbonoInscripcion->monto_cuenta_inscripcion).'
                    </td>
                </tr>
                <tr>
                    <td>MONTO DE PAGO: </td>
                    <td class="text-right">
                    	$ '.number_format($colAbonoInscripcion->deposito_abono_inscripcion).'
                    </td>
                </tr>
                <tr>
                    <td>USTED ADEUDA: </td>
                    <td class="text-right">
                    	$ '.number_format($deuda).'
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

$dompdf->stream("factura-inscripcion.pdf", array("Attachment" => false));
//exit(0);
/**/

?>