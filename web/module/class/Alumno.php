<?php 
	class Alumno{

		/*
		curp_alumno
		nombre_alumno
		apellidop_alumno
		apellidom_alumno
		foto_alumno
		direccion_alumno
		nacimiento_alumno
		correo_alumno
		telefono_alumno
		observaciones_alumno
		cve_sexo
		cve_campus
		status_alumno
		/**/

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT alumno.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,alumno.nombre_alumno,alumno.apellidop_alumno,alumno.apellidom_alumno,alumno.foto_alumno,alumno.direccion_alumno,alumno.nacimiento_alumno,alumno.correo_alumno,alumno.telefono_alumno,alumno.observaciones_alumno,alumno.cve_sexo,alumno.cve_campus, campus.nombre_campus from alumno inner join campus on (alumno.cve_campus = campus.cve_campus) where alumno.status_alumno = "active"';
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