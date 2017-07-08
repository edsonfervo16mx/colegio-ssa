<?php 
	
	class ConstructorGrupo{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT constructor_grupo.cve_constructor_grupo,constructor_grupo.cve_grupo,constructor_grupo.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo, grupo.nombre_grupo,grupo.cve_ciclo,ciclo.nombre_ciclo,ciclo.cve_campus,campus.nombre_campus from constructor_grupo inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno) inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo) inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo) inner join campus on (ciclo.cve_campus = campus.cve_campus) where constructor_grupo.status_constructor_grupo = "active"';
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
			$sql = 'SELECT constructor_grupo.cve_constructor_grupo,constructor_grupo.cve_grupo,constructor_grupo.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo, grupo.nombre_grupo,grupo.cve_ciclo,ciclo.nombre_ciclo,ciclo.cve_campus,campus.nombre_campus from constructor_grupo inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno) inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo) inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo) inner join campus on (ciclo.cve_campus = campus.cve_campus) where constructor_grupo.status_constructor_grupo = "active" and constructor_grupo.cve_constructor_grupo = "'.$id.'"';
			$res = $dataBase->triggerSimple($key,$sql);
			$i=0;
			$line = null;
			while ($row = mysqli_fetch_assoc($res)) {
				$line[$i] = array_map('utf8_encode', $row) ;
				$i++;
			}
			//echo $sql;
			$data = json_encode($line);
			$data = json_decode($data);
			return ($data);
		}

		public function registrar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO constructor_grupo(cve_constructor_grupo, cve_grupo,curp_alumno) VALUES (upper("'.$atr['cve_constructor_grupo'].'"), upper("'.$atr['cve_grupo'].'"), upper("'.$atr['curp_alumno'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE constructor_grupo SET cve_constructor_grupo = upper("'.$atr['cve_constructor_grupo'].'"), cve_grupo = upper("'.$atr['cve_grupo'].'"), curp_alumno = upper("'.$atr['curp_alumno'].'") where cve_constructor_grupo = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function listarGrupo($key,$id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT constructor_grupo.cve_constructor_grupo,constructor_grupo.cve_grupo,constructor_grupo.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo, grupo.nombre_grupo,grupo.cve_ciclo,ciclo.nombre_ciclo,ciclo.cve_campus,campus.nombre_campus from constructor_grupo inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno) inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo) inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo) inner join campus on (ciclo.cve_campus = campus.cve_campus) where constructor_grupo.status_constructor_grupo = "active" and constructor_grupo.cve_grupo = "'.$id.'" order by(nombre_completo)';
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

		public function contarGrupo($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT constructor_grupo.cve_grupo ,count(constructor_grupo.curp_alumno) as cantidad from constructor_grupo inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno) inner join grupo on (constructor_grupo.cve_grupo = grupo.cve_grupo) inner join ciclo on (grupo.cve_ciclo = ciclo.cve_ciclo) inner join campus on (ciclo.cve_campus = campus.cve_campus) where constructor_grupo.status_constructor_grupo = "active" and constructor_grupo.cve_grupo = "'.$id.'" group by(constructor_grupo.cve_grupo)';
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