<?php 
	class Alumno{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT alumno.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,alumno.nombre_alumno,alumno.apellidop_alumno,alumno.apellidom_alumno,alumno.foto_alumno,alumno.direccion_alumno,alumno.nacimiento_alumno,alumno.correo_alumno,alumno.telefono_alumno,alumno.observaciones_alumno, alumno.status_alumno, alumno.cve_sexo,alumno.cve_campus, campus.nombre_campus from alumno inner join campus on (alumno.cve_campus = campus.cve_campus) where alumno.status_alumno = "active" order by(nombre_completo)';
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

		public function listarBajas($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT alumno.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,alumno.nombre_alumno,alumno.apellidop_alumno,alumno.apellidom_alumno,alumno.foto_alumno,alumno.direccion_alumno,alumno.nacimiento_alumno,alumno.correo_alumno,alumno.telefono_alumno,alumno.observaciones_alumno, alumno.status_alumno, alumno.cve_sexo,alumno.cve_campus, campus.nombre_campus from alumno inner join campus on (alumno.cve_campus = campus.cve_campus) where alumno.status_alumno = "inactive" order by(nombre_completo)';
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

		public function ver($key,$id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT alumno.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,alumno.nombre_alumno,alumno.apellidop_alumno,alumno.apellidom_alumno,alumno.foto_alumno,alumno.direccion_alumno,alumno.nacimiento_alumno,alumno.correo_alumno,alumno.telefono_alumno,alumno.observaciones_alumno,alumno.cve_sexo,alumno.cve_campus, campus.nombre_campus from alumno inner join campus on (alumno.cve_campus = campus.cve_campus) where alumno.status_alumno = "active" and alumno.curp_alumno = "'.$id.'" Limit 1';
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
			$sql = 'INSERT INTO alumno(curp_alumno,nombre_alumno,apellidop_alumno,apellidom_alumno,nacimiento_alumno,cve_sexo,correo_alumno,direccion_alumno,observaciones_alumno,cve_campus) VALUES (upper("'.$atr['curp_alumno'].'"),upper("'.$atr['nombre_alumno'].'"),upper("'.$atr['apellidop_alumno'].'"),upper("'.$atr['apellidom_alumno'].'"),"'.$atr['nacimiento_alumno'].'","'.$atr['cve_sexo'].'",upper("'.$atr['correo_alumno'].'"),upper("'.$atr['direccion_alumno'].'"),upper("'.$atr['observaciones_alumno'].'"),"'.$atr['cve_campus'].'")';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE alumno SET curp_alumno = upper("'.$atr['curp_alumno'].'"), nombre_alumno = upper("'.$atr['nombre_alumno'].'"), apellidop_alumno = upper("'.$atr['apellidop_alumno'].'"), apellidom_alumno = upper("'.$atr['apellidom_alumno'].'"), nacimiento_alumno = upper("'.$atr['nacimiento_alumno'].'"), cve_sexo = upper("'.$atr['cve_sexo'].'"), correo_alumno = upper("'.$atr['correo_alumno'].'"), direccion_alumno = upper("'.$atr['direccion_alumno'].'"), observaciones_alumno = upper("'.$atr['observaciones_alumno'].'"), cve_campus = upper("'.$atr['cve_campus'].'") where curp_alumno = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
		}

		public function darBaja($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE alumno SET status_alumno = "inactive" where curp_alumno = "'.$id.'"';
			$dataBase->triggerSimple($key,$sql);
		}

		public function darAlta($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE alumno SET status_alumno = "active" where curp_alumno = "'.$id.'"';
			$dataBase->triggerSimple($key,$sql);
		}
	}
?>