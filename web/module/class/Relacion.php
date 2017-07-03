<?php 
	class Relacion{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT relacion.cve_relacion, relacion.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno) as nombre_completo_alumno,  relacion.cve_tutor, concat(tutor.apellidop_tutor," ",tutor.apellidom_tutor," ",tutor.nombre_tutor) as nombre_completo_tutor from relacion inner join alumno on (relacion.curp_alumno = alumno.curp_alumno) inner join tutor on (relacion.cve_tutor = tutor.cve_tutor) where relacion.status_relacion = "active"';
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
			$sql = 'SELECT relacion.cve_relacion, relacion.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo_alumno,  relacion.cve_tutor, concat(tutor.apellidop_tutor," ",tutor.apellidom_tutor," ",tutor.nombre_tutor) as nombre_completo_tutor from relacion inner join alumno on (relacion.curp_alumno = alumno.curp_alumno) inner join tutor on (relacion.cve_tutor = tutor.cve_tutor) where relacion.status_relacion = "active" and relacion.cve_relacion ="'.$id.'"';
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
			$sql = 'INSERT INTO relacion(curp_alumno, cve_tutor) VALUES (upper("'.$atr['curp_alumno'].'"), upper("'.$atr['cve_tutor'].'"))';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE alumno SET curp_alumno = upper("'.$atr['curp_alumno'].'"), cve_tutor = upper("'.$atr['cve_tutor'].'") where cve_relacion = "'.$atr['id'].'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

	}
?>