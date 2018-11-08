<?php 
	class Grupo{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT grupo.cve_grupo, grupo.nombre_grupo, grupo.cve_ciclo, grupo.status_grupo, ciclo.cve_ciclo, ciclo.nombre_ciclo, campus.cve_campus, campus.nombre_campus from grupo inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo) inner join campus on (ciclo.cve_campus = campus.cve_campus) where grupo.status_grupo = "active"';
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
			$sql = 'INSERT INTO grupo(cve_grupo, nombre_grupo,cve_ciclo) VALUES (upper("'.$atr['cve_grupo'].'"),upper("'.$atr['nombre_grupo'].'"),upper("'.$atr['cve_ciclo'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function ver($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT grupo.cve_grupo, grupo.nombre_grupo, grupo.cve_ciclo, grupo.status_grupo, ciclo.cve_ciclo, ciclo.nombre_ciclo, campus.cve_campus, campus.nombre_campus from grupo inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo) inner join campus on (ciclo.cve_campus = campus.cve_campus) where grupo.status_grupo = "active" and grupo.cve_grupo = "'.$id.'" Limit 1';
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
			$sql = 'UPDATE grupo SET cve_grupo = upper("'.$atr['cve_grupo'].'"), nombre_grupo = upper("'.$atr['nombre_grupo'].'"), cve_ciclo = upper("'.$atr['cve_ciclo'].'") where cve_grupo = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}
	}
?>