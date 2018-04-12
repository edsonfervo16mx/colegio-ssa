<?php 
	class Colegio{
		public function test(){
			echo 'Ok';
		}

		public function consulta($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT colegio.cve_colegio, colegio.nombre_colegio, colegio.status_colegio from colegio limit 1';
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