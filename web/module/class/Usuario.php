<?php

	class Usuario{

		public function test(){
			echo 'Ok';
		}

		public function buscarPerfil($key,$nickname){
			$dataBase = new dbMysql;
			$linkDB = $dataBase->connectDB($key);
			$nickname= mysqli_real_escape_string($linkDB, $nickname);
			$sql = 'SELECT usuario.nombre_usuario, usuario.password_usuario, usuario.descripcion_usuario, usuario.privilegio_usuario from usuario where usuario.nombre_usuario = "'.$nickname.'" and usuario.status_usuario = "active" limit 1';
			$res = $dataBase->triggerSimple($key,$sql);
			$i=0;
			$line = null;
			while ($row = mysqli_fetch_assoc($res)) {
				$line[$i] = array_map('utf8_encode', $row) ;
				$i++;
			}
			$data = json_encode($line);
			$data = json_decode($data);
			return ($data);
		}
	}
?>