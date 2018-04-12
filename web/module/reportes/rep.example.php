<?php
	/**/
$html = '<p>Hola mundo</p>';

#echo $html;
#bloque generador----------------------------------------

$html=$html;
#$html=$html;
/*
ini_set("memory_limit", "999M"); 
ini_set("max_execution_time", "999");
/**/

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

$dompdf->stream("example-teste.pdf", array("Attachment" => false));
//exit(0);
/**/

?>