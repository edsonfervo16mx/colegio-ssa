<?php

	class PrecioColegiatura{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT precio_colegiatura.cve_precio_colegiatura,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					ciclo.nombre_ciclo,
					campus.nombre_campus,
					colegio.cve_colegio,
					colegio.nombre_colegio
					from precio_colegiatura
					inner join ciclo on (precio_colegiatura.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where precio_colegiatura.status_precio_colegiatura = "active"';
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

		public function ver($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT precio_colegiatura.cve_precio_colegiatura,
					precio_colegiatura.titulo_precio_colegiatura,
					precio_colegiatura.monto_precio_colegiatura,
					precio_colegiatura.meses_precio_colegiatura,
					precio_colegiatura.detalle_precio_colegiatura,
					precio_colegiatura.cve_ciclo,
					ciclo.nombre_ciclo,
					campus.nombre_campus,
					colegio.cve_colegio,
					colegio.nombre_colegio
					from precio_colegiatura
					inner join ciclo on (precio_colegiatura.cve_ciclo = ciclo.cve_ciclo)
					inner join campus on (ciclo.cve_campus = campus.cve_campus)
					inner join colegio on (campus.cve_colegio = colegio.cve_colegio)
					where precio_colegiatura.status_precio_colegiatura = "active" and precio_colegiatura.cve_precio_colegiatura = "'.$id.'"';
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

		public function registrar($key,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO precio_colegiatura(cve_precio_colegiatura,titulo_precio_colegiatura,monto_precio_colegiatura,meses_precio_colegiatura,detalle_precio_colegiatura,cve_ciclo) VALUES (upper("'.$atr['cve_precio_colegiatura'].'"),upper("'.$atr['titulo_precio_colegiatura'].'"),upper("'.$atr['monto_precio_colegiatura'].'"),upper("'.$atr['meses_precio_colegiatura'].'"),upper("'.$atr['detalle_precio_colegiatura'].'"),upper("'.$atr['cve_ciclo'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE precio_colegiatura SET titulo_precio_colegiatura = upper("'.$atr['titulo_precio_colegiatura'].'"),monto_precio_colegiatura = upper("'.$atr['monto_precio_colegiatura'].'"),meses_precio_colegiatura = upper("'.$atr['meses_precio_colegiatura'].'"),detalle_precio_colegiatura = upper("'.$atr['detalle_precio_colegiatura'].'"),cve_ciclo = upper("'.$atr['cve_ciclo'].'") where cve_precio_colegiatura = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}
	}

?>