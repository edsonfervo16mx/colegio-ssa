<?php
	require_once 'web/config/string.connection.php';
	require_once 'web/module/class/Autoload.php';

	if ($_POST['usuario']) {
		if (md5($_POST['pass'])) {
			$login = new Usuario;
			$dataUsers = $login->buscarPerfil($key,$_POST['usuario']);
			if ($dataUsers) {
				foreach ($dataUsers as $col) {
					if($col->password_usuario == md5($_POST['pass'])){
						//sesion valida
						$_SESSION['usuario']=$_POST['usuario'];
						$_SESSION['pass']=md5($_POST['pass']);
						$_SESSION['status']=true;
						print '<meta http-equiv="REFRESH" content="0; url=web/index.php">';
					}else{
						//invalido
						session_destroy();
						print '<meta http-equiv="REFRESH" content="0; url=index.php">';
					}
				}
			}else{
				//invalido
				session_destroy();
				print '<meta http-equiv="REFRESH" content="0; url=index.php">';
			}
		}else{
			//invalido
			session_destroy();
			print '<meta http-equiv="REFRESH" content="0; url=index.php">';
		}
	}else{
		//invalido
		session_destroy();
		print '<meta http-equiv="REFRESH" content="0; url=index.php">';
	}
?>