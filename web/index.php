<?php
	/**/
	$login = true;
	/**/
	if ($login) {
		/*Bloque antes de darle acceso
		/**/
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=home.php">';
	}else{
		/* Bloque antes de darle salida
		/**/
		//redireccion
		print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
	}
?>