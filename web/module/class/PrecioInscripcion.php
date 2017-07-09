<?php

	class PrecioInscripcion{
		
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT precio_inscripcion.cve_precio_inscripcion, precio_inscripcion.titulo_precio_inscripcion, precio_inscripcion.monto_precio_inscripcion, precio_inscripcion.detalle_precio_inscripcion, precio_inscripcion.cve_ciclo from precio_inscripcion where precio_inscripcion.status_precio_inscripcion = "active"';
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

		public function registrar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO precio_inscripcion(cve_precio_inscripcion,titulo_precio_inscripcion,monto_precio_inscripcion,detalle_precio_inscripcion,cve_ciclo) VALUES (upper("'.$atr['cve_precio_inscripcion'].'"),upper("'.$atr['titulo_precio_inscripcion'].'"),upper("'.$atr['monto_precio_inscripcion'].'"),upper("'.$atr['detalle_precio_inscripcion'].'"), upper("'.$atr['cve_ciclo'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function ver($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT precio_inscripcion.cve_precio_inscripcion, precio_inscripcion.titulo_precio_inscripcion, precio_inscripcion.monto_precio_inscripcion, precio_inscripcion.detalle_precio_inscripcion, precio_inscripcion.cve_ciclo from precio_inscripcion where precio_inscripcion.status_precio_inscripcion = "active" and precio_inscripcion.cve_precio_inscripcion = "'.$id.'"';
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

		//
		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE precio_inscripcion SET titulo_precio_inscripcion = upper("'.$atr['titulo_precio_inscripcion'].'"), monto_precio_inscripcion = upper("'.$atr['monto_precio_inscripcion'].'"), detalle_precio_inscripcion = upper("'.$atr['detalle_precio_inscripcion'].'"), cve_ciclo = upper("'.$atr['cve_ciclo'].'") where cve_precio_inscripcion = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

	}

?>