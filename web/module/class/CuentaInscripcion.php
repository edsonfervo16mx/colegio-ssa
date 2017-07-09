<?php 
	class CuentaInscripcion{

		public function test(){
			echo 'Ok';
		}

		public function listar($key){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_inscripcion.cve_cuenta_inscripcion,cuenta_inscripcion.folio_cuenta_inscripcion,cuenta_inscripcion.fecha_cuenta_inscripcion,cuenta_inscripcion.monto_cuenta_inscripcion,cuenta_inscripcion.descripcion_cuenta_inscripcion,cuenta_inscripcion.cve_precio_inscripcion,precio_inscripcion.titulo_precio_inscripcion,cuenta_inscripcion.cve_constructor_grupo,constructor_grupo.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,cuenta_inscripcion.cve_estado_pago from cuenta_inscripcion inner join precio_inscripcion on (cuenta_inscripcion.cve_precio_inscripcion = precio_inscripcion.cve_precio_inscripcion) inner join constructor_grupo on (cuenta_inscripcion.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo) inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno) inner join cat_estado_pago on (cuenta_inscripcion.cve_estado_pago = cat_estado_pago.cve_estado_pago) where cuenta_inscripcion.status_cuenta_inscripcion = "active"';
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