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

		public function registrar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'INSERT INTO cuenta_inscripcion(folio_cuenta_inscripcion, fecha_cuenta_inscripcion,monto_cuenta_inscripcion,descripcion_cuenta_inscripcion,cve_precio_inscripcion,cve_constructor_grupo,cve_estado_pago) VALUES (upper("'.$atr['cve_grupo'].'"),upper("'.$atr['nombre_grupo'].'"),upper("'.$atr['cve_ciclo'].'"))';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function modificar($key, $atr){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_inscripcion SET fecha_cuenta_inscripcion = upper("'.$atr['fecha_cuenta_inscripcion'].'"), monto_cuenta_inscripcion = upper("'.$atr['monto_cuenta_inscripcion'].'"), descripcion_cuenta_inscripcion = upper("'.$atr['descripcion_cuenta_inscripcion'].'"),cve_precio_inscripcion = upper("'.$atr['cve_precio_inscripcion'].'"),cve_constructor_grupo = upper("'.$atr['cve_constructor_grupo'].'"),cve_estado_pago = upper("'.$atr['cve_estado_pago'].'") where cve_cuenta_inscripcion = "'.$atr['id'].'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function ver($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'SELECT cuenta_inscripcion.cve_cuenta_inscripcion,cuenta_inscripcion.folio_cuenta_inscripcion,cuenta_inscripcion.fecha_cuenta_inscripcion,cuenta_inscripcion.monto_cuenta_inscripcion,cuenta_inscripcion.descripcion_cuenta_inscripcion,cuenta_inscripcion.cve_precio_inscripcion,precio_inscripcion.titulo_precio_inscripcion,cuenta_inscripcion.cve_constructor_grupo,constructor_grupo.curp_alumno,concat(alumno.apellidop_alumno," ",alumno.apellidom_alumno," ",alumno.nombre_alumno)as nombre_completo,cuenta_inscripcion.cve_estado_pago from cuenta_inscripcion inner join precio_inscripcion on (cuenta_inscripcion.cve_precio_inscripcion = precio_inscripcion.cve_precio_inscripcion) inner join constructor_grupo on (cuenta_inscripcion.cve_constructor_grupo = constructor_grupo.cve_constructor_grupo) inner join alumno on (constructor_grupo.curp_alumno = alumno.curp_alumno) inner join cat_estado_pago on (cuenta_inscripcion.cve_estado_pago = cat_estado_pago.cve_estado_pago) where cuenta_inscripcion.status_cuenta_inscripcion = "active" and cuenta_inscripcion.cve_cuenta_inscripcion = "'.$id.'"';
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

		public function darBaja($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_inscripcion SET status_cuenta_inscripcion = "inactive" where cve_cuenta_inscripcion = "'.$id.'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

		public function darAlta($key, $id){
			$dataBase = new dbMysql;
			$dataBase->connectDB($key);
			$sql = 'UPDATE cuenta_inscripcion SET status_cuenta_inscripcion = "active" where cve_cuenta_inscripcion = "'.$id.'"';
			//$dataBase->triggerSimple($key,$sql);
			print $sql;
		}

	}
?>