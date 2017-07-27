<?php 
	
	class PrecioServicio{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT precio_servicios.cve_precio_servicios,
					precio_servicios.titulo_precio_servicios,
					precio_servicios.monto_precio_servicios,
					precio_servicios.detalle_precio_servicios,
					precio_servicios.cve_ciclo
					from precio_servicios where precio_servicios.status_precio_servicios = "active"';
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
			$sql = 'INSERT INTO precio_servicios(cve_precio_servicios,titulo_precio_servicios,monto_precio_servicios,detalle_precio_servicios,cve_ciclo) VALUES (upper("'.$atr['cve_precio_servicios'].'"),upper("'.$atr['titulo_precio_servicios'].'"),upper("'.$atr['monto_precio_servicios'].'"),upper("'.$atr['detalle_precio_servicios'].'"), upper("'.$atr['cve_ciclo'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function ver($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT precio_servicios.cve_precio_servicios,
					precio_servicios.titulo_precio_servicios,
					precio_servicios.monto_precio_servicios,
					precio_servicios.detalle_precio_servicios,
					precio_servicios.cve_ciclo
					from precio_servicios where precio_servicios.status_precio_servicios = "active" and precio_servicios.cve_precio_servicios = "'.$id.'"';
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

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE precio_servicios SET titulo_precio_servicios = upper("'.$atr['titulo_precio_servicios'].'"), monto_precio_servicios = upper("'.$atr['monto_precio_servicios'].'"), detalle_precio_servicios = upper("'.$atr['detalle_precio_servicios'].'"), cve_ciclo = upper("'.$atr['cve_ciclo'].'") where cve_precio_servicios = "'.$atr['cve_precio_servicios'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

	}

?>