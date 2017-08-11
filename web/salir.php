<?php
	session_start();
	session_destroy();
	//redireccion
	print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
?>