<?php 
	class Tutor{
		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT tutor.cve_tutor, concat(tutor.apellidop_tutor," ",tutor.apellidom_tutor," ",tutor.nombre_tutor)as nombre_completo, tutor.nombre_tutor, tutor.apellidop_tutor, tutor.apellidom_tutor, tutor.correo_tutor, tutor.telefono_tutor, tutor.observaciones_tutor, tutor.status_tutor,tutor.cve_sexo from tutor where tutor.status_tutor = "active"';
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

		public function ver($key , $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT tutor.cve_tutor,concat(tutor.apellidop_tutor," ",tutor.apellidom_tutor," ",tutor.nombre_tutor)as nombre_completo, tutor.nombre_tutor, tutor.apellidop_tutor, tutor.apellidom_tutor, tutor.correo_tutor, tutor.telefono_tutor, tutor.observaciones_tutor, tutor.status_tutor,tutor.cve_sexo from tutor where tutor.status_tutor = "active" and tutor.cve_tutor = "'.$id.'" Limit 1';
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
			$sql = 'INSERT INTO tutor(nombre_tutor,apellidop_tutor,apellidom_tutor,correo_tutor,telefono_tutor,observaciones_tutor,cve_sexo) VALUES (upper("'.$atr['nombre_tutor'].'"),upper("'.$atr['apellidop_tutor'].'"),upper("'.$atr['apellidom_tutor'].'"),upper("'.$atr['correo_tutor'].'"),upper("'.$atr['telefono_tutor'].'"),upper("'.$atr['observaciones_tutor'].'"),upper("'.$atr['cve_sexo'].'"))';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}

		public function modificar($key,$atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE tutor SET nombre_tutor = upper("'.$atr['nombre_tutor'].'"), apellidop_tutor = upper("'.$atr['apellidop_tutor'].'"), apellidom_tutor = upper("'.$atr['apellidom_tutor'].'"), correo_tutor = upper("'.$atr['correo_tutor'].'"), telefono_tutor = upper("'.$atr['telefono_tutor'].'"), observaciones_tutor = upper("'.$atr['observaciones_tutor'].'"), cve_sexo = upper("'.$atr['cve_sexo'].'") where cve_tutor = "'.$atr['id'].'"';
			$dataBase->triggerSimple($key,$sql);
			//print $sql;
		}


		public function consultaId($key,$nombre){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT tutor.cve_tutor from tutor where tutor.status_tutor = "active" and concat(tutor.apellidop_tutor," ",tutor.apellidom_tutor," ",tutor.nombre_tutor) = "'.$nombre.'" Limit 1';
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