<?php
	class Campus{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT campus.cve_campus,campus.nombre_campus,campus.logo_campus,campus.telefono_campus,campus.correo_campus,campus.direccion_campus,campus.descripcion_campus,campus.cve_colegio from campus where campus.status_campus = "active"';
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