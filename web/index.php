<?php
	require_once 'config/string.connection.php';
	require_once 'module/class/Autoload.php';

	if (isset($_SESSION['status'])) {
		if (isset($_SESSION['usuario'])) {
			if (isset($_SESSION['pass'])) {
				print '<meta http-equiv="REFRESH" content="0; url=home.php">';
			}else{
				session_destroy();
				print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
			}
		}else{
			session_destroy();
			print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
		}
	}else{
		session_destroy();
		print '<meta http-equiv="REFRESH" content="0; url=../index.php">';
	}
?>